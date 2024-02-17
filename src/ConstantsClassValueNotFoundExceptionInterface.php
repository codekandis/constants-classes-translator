<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

/**
 * Represents the interface of any exception if a constants class value does not exist.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConstantsClassValueNotFoundExceptionInterface extends ConstantsClassesTranslatorExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param string $constantsClassClassName The class name of the constants class.
	 * @param null|bool|int|float|string|array $unknownValue The unknown constants class value.
	 * @return static
	 */
	public static function with_constantsClassClassNameAndUnknownValue( string $constantsClassClassName, null|bool|int|float|string|array $unknownValue ): static;
}
