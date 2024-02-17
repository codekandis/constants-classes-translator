<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use Override;
use function sprintf;

/**
 * Represents an exception if a constants class value does not exist.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassValueNotFoundException extends ConstantsClassesTranslatorException implements ConstantsClassValueNotFoundExceptionInterface
{
	/**
	 * Represents the exception message if a constants class value does not exist.
	 * @var string
	 */
	public const string EXCEPTION_MESSAGE_CONSTANTS_CLASS_VALUE_NOT_FOUND = 'The constants class value `%s::%s` does not exist.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_constantsClassClassNameAndUnknownValue( string $constantsClassClassName, null|bool|int|float|string|array $unknownValue ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_CONSTANTS_CLASS_VALUE_NOT_FOUND, $constantsClassClassName, $unknownValue )
		);
	}
}
