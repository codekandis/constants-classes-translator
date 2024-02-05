<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use CodeKandis\Types\InvalidTypeException;
use Override;
use ReflectionClass;
use ReflectionException;
use function is_array;
use function is_scalar;

/**
 * Represents a constant classes translator.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslator implements ConstantsClassesTranslatorInterface
{
	/**
	 * Stores the reflected input constants class.
	 * @var ReflectionClass
	 */
	private readonly ReflectionClass $reflectedInputConstantsClass;

	/**
	 * Stores the reflected output constants class.
	 * @var ReflectionClass
	 */
	private readonly ReflectionClass $reflectedOutputConstantsClass;

	/**
	 * Constructor method.
	 * @param string $inputConstantsClassClassName The input constants class class name.
	 * @param string $outputConstantsClassClassName The output constants class class name.
	 * @throws ConstantsClassNotFoundExceptionInterface The input constants class does not exist.
	 * @throws ConstantsClassNotFoundExceptionInterface The output constants class does not exist.
	 */
	public function __construct( string $inputConstantsClassClassName, string $outputConstantsClassClassName )
	{
		$this->initializeReflectedClasses( $inputConstantsClassClassName, $outputConstantsClassClassName );
	}

	/**
	 * Initializes the reflected input and output constants classes.
	 * @param string $inputConstantsClassClassName The input constants class class name.
	 * @param string $outputConstantsClassClassName The output constants class class name.
	 * @throws ConstantsClassNotFoundExceptionInterface The input constants class does not exist.
	 * @throws ConstantsClassNotFoundExceptionInterface The output constants class does not exist.
	 */
	private function initializeReflectedClasses( string $inputConstantsClassClassName, string $outputConstantsClassClassName ): void
	{
		try
		{
			$this->reflectedInputConstantsClass = new ReflectionClass( $inputConstantsClassClassName );
		}
		catch ( ReflectionException $throwable )
		{
			throw ConstantsClassNotFoundException::with_classNameAndInnerThrowable( $inputConstantsClassClassName, $throwable );
		}
		try
		{
			$this->reflectedOutputConstantsClass = new ReflectionClass( $outputConstantsClassClassName );
		}
		catch ( ReflectionException $throwable )
		{
			throw ConstantsClassNotFoundException::with_classNameAndInnerThrowable( $outputConstantsClassClassName, $throwable );
		}
	}

	/**
	 * Determines if a specific value is `null`, a scalar or a (nested) array of scalars.
	 * @param mixed $value The value to check.
	 * @return bool `true` if the value is `null`, a scalar or a (nested) array of scalars, otherwise `false`.
	 */
	private function isValueTypeValid( mixed $value ): bool
	{
		if ( null === $value || true === is_scalar( $value ) )
		{
			return true;
		}

		if ( false === is_array( $value ) )
		{
			return false;
		}

		foreach ( $value as $element )
		{
			if ( false === $this->isValueTypeValid( $element ) )
			{
				return false;
			}
		}

		return true;
	}

	/**
	 * {@inheritDoc}
	 */
	#[Override]
	public function translate( null | bool | int | float | string | array $value ): null | bool | int | float | string | array
	{
		if ( false === $this->isValueTypeValid( $value ) )
		{
			throw InvalidTypeException::with_invalidTypeAndExpectedTypes( 'array<mixed>', 'null', 'scalar', 'nested-array<null|scalar>' );
		}

		$outputValue             = '';
		$reflectedInputConstants = $this->reflectedInputConstantsClass->getConstants();
		foreach ( $reflectedInputConstants as $reflectedInputConstantName => $reflectedInputConstantValue )
		{
			if ( $reflectedInputConstantValue === $value )
			{
				$outputValue = $this->reflectedOutputConstantsClass->getConstant( $reflectedInputConstantName );
				if ( false === $outputValue )
				{
					throw CorrespondingConstantsClassValueNotFoundException::with_inputClassNameInputConstantNameAndOutputClassName(
						$this->reflectedInputConstantsClass->getName(),
						$reflectedInputConstantName,
						$this->reflectedOutputConstantsClass->getName()
					);
				}
				break;
			}
		}

		if ( '' === $outputValue )
		{
			throw ConstantsClassValueNotFoundException::with_classNameAndUnknownValue( $this->reflectedInputConstantsClass->getName(), $value );
		}

		return $outputValue;
	}
}
