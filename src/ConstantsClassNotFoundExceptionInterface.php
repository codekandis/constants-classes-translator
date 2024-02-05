<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use Throwable;

/**
 * Represents the interface of any exception if a constants class does not exist.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConstantsClassNotFoundExceptionInterface extends ConstantsClassesTranslatorExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param string $constantsClassClassName The class name of the constants class which does not exist.
	 * @param Throwable $innerThrowable The inner throwable.
	 * @return static
	 */
	public static function with_constantsClassClassNameAndInnerThrowable( string $constantsClassClassName, Throwable $innerThrowable ): static;
}
