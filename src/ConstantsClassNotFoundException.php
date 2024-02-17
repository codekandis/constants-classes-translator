<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use Override;
use Throwable;
use function sprintf;

/**
 * Represents an exception if a constants class does not exist.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassNotFoundException extends ConstantsClassesTranslatorException implements ConstantsClassNotFoundExceptionInterface
{
	/**
	 * Represents the exception message if a constants class does not exist.
	 * @var string
	 */
	public const string EXCEPTION_MESSAGE_CONSTANTS_CLASS_NOT_FOUND = 'The constants class `%s` does not exist.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_constantsClassClassNameAndInnerThrowable( string $constantsClassClassName, Throwable $innerThrowable ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_CONSTANTS_CLASS_NOT_FOUND, $constantsClassClassName ),
			0,
			$innerThrowable
		);
	}
}
