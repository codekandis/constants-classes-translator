<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use ReflectionClass;
use ReflectionException;
use function sprintf;

/**
 * Represents a constant classes translator.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslator implements ConstantsClassesTranslatorInterface
{
	/**
	 * Represents an error message if a constants class does not exist.
	 * @var string
	 */
	protected const ERROR_CONSTANTS_CLASS_NOT_FOUND = 'The constants class `%s` does not exist.';

	/**
	 * Represents an error message if a constants class value has no corresponding constants class value.
	 * @var string
	 */
	protected const ERROR_CORRESPONDING_CONSTANTS_CLASS_VALUE_NOT_FOUND = 'The constants class value `%s::%s` has no corresponding constants class value in constants class `%s`.';

	/**
	 * Represents an error message if a constants class value does not exist.
	 * @var string
	 */
	protected const ERROR_CONSTANTS_CLASS_VALUE_NOT_FOUND = 'The constants class value `%s` does not exist.';

	/**
	 * Stores the reflected input constants class.
	 * @var ReflectionClass
	 */
	private ReflectionClass $reflectedInputConstantsClass;

	/**
	 * Stores the reflected output constants class.
	 * @var ReflectionClass
	 */
	private ReflectionClass $reflectedOutputConstantsClass;

	/**
	 * Constructor method.
	 * @param string $inputConstantsClassClassName The input constants class class name.
	 * @param string $outputConstantsClassClassName The output constants class class name.
	 * @throws ConstantsClassNotFoundException The input constants class does not exist.
	 * @throws ConstantsClassNotFoundException The output constants class does not exist.
	 */
	public function __construct( string $inputConstantsClassClassName, string $outputConstantsClassClassName )
	{
		$this->initReflectedClasses( $inputConstantsClassClassName, $outputConstantsClassClassName );
	}

	/**
	 * Initializes the reflected input and output constants classes.
	 * @param string $inputConstantsClassClassName The input constants class class name.
	 * @param string $outputConstantsClassClassName The output constants class class name.
	 * @throws ConstantsClassNotFoundException The input constants class does not exist.
	 * @throws ConstantsClassNotFoundException The output constants class does not exist.
	 */
	private function initReflectedClasses( string $inputConstantsClassClassName, string $outputConstantsClassClassName ): void
	{
		try
		{
			$this->reflectedInputConstantsClass = new ReflectionClass( $inputConstantsClassClassName );
		}
		catch ( ReflectionException $exception )
		{
			$exceptionMessage = sprintf(
				static::ERROR_CONSTANTS_CLASS_NOT_FOUND,
				$inputConstantsClassClassName
			);
			throw new ConstantsClassNotFoundException( $exceptionMessage, 1 );
		}
		try
		{
			$this->reflectedOutputConstantsClass = new ReflectionClass( $outputConstantsClassClassName );
		}
		catch ( ReflectionException $exception )
		{
			$exceptionMessage = sprintf(
				static::ERROR_CONSTANTS_CLASS_NOT_FOUND,
				$outputConstantsClassClassName
			);
			throw new ConstantsClassNotFoundException( $exceptionMessage, 2 );
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function translate( $value )
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
					$exceptionMessage = sprintf(
						static::ERROR_CORRESPONDING_CONSTANTS_CLASS_VALUE_NOT_FOUND,
						$this->reflectedInputConstantsClass->getName(),
						$reflectedInputConstantName,
						$this->reflectedOutputConstantsClass->getName()
					);
					throw new CorrespondingConstantsClassValueNotFoundException( $exceptionMessage, 3 );
				}
				break;
			}
		}

		if ( '' === $outputValue )
		{
			$exceptionMessage = sprintf(
				static::ERROR_CONSTANTS_CLASS_VALUE_NOT_FOUND,
				$value
			);
			throw new ConstantsClassValueNotFoundException( $exceptionMessage, 4 );
		}

		return $outputValue;
	}
}
