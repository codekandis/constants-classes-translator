<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use CodeKandis\Types\ClassNotFoundException;
use Throwable;
use function sprintf;

/**
 * Represents an exception if a constants class does not exist.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassNotFoundException extends ClassNotFoundException implements ConstantsClassNotFoundExceptionInterface
{
	/**
	 * Represents the exception message if a constants class does not exist.
	 * @var string
	 */
	public const string EXCEPTION_MESSAGE_CONSTANTS_CLASS_NOT_FOUND = 'The constants class `%s` does not exist.';

	/**
	 * Static constructor method.
	 * @param string $className The class name of the constants class which does not exist.
	 * @param Throwable $innerThrowable The inner throwable.
	 * @return static
	 */
	public static function with_classNameAndInnerThrowable( string $className, Throwable $innerThrowable ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_CONSTANTS_CLASS_NOT_FOUND, $className ),
			0,
			$innerThrowable
		);
	}
}
