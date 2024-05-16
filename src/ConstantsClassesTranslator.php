<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use Override;
use ReflectionClass;
use ReflectionException;

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
	 * {@inheritDoc}
	 */
	#[Override]
	public function translate( null|bool|int|float|string|array $value ): null|bool|int|float|string|array
	{
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
