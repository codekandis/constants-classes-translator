<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use CodeKandis\Types\ConstantNotFoundException;
use function sprintf;

/**
 * Represents an exception if a constants class value does not exist.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassValueNotFoundException extends ConstantNotFoundException implements ConstantsClassValueNotFoundExceptionInterface
{
	/**
	 * Represents the exception message if a constants class value does not exist.
	 */
	public const string EXCEPTION_MESSAGE_CONSTANTS_CLASS_VALUE_NOT_FOUND = 'The constants class value `%s::%s` does not exist.';

	/**
	 * Static constructor method.
	 * @param string $className The class name of the constants class.
	 * @param null|bool|int|float|string|array $unknownValue The unknown constants class value.
	 * @return static
	 */
	public static function with_classNameAndUnknownValue( string $className, null|bool|int|float|string|array $unknownValue ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_CONSTANTS_CLASS_VALUE_NOT_FOUND, $className, $unknownValue )
		);
	}
}
