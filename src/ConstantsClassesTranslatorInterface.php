<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use CodeKandis\Types\InterfaceOrClassConstantNotFoundExceptionInterface;
use CodeKandis\Types\InterfaceOrClassConstantValueNotFoundExceptionInterface;
use CodeKandis\Types\InvalidTypeExceptionInterface;

/**
 * Represents the interface of any constant interfaces and classes translator.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConstantsClassesTranslatorInterface
{
	/**
	 * Translates a constants class value into the corresponding constants class value.
	 * @param null|bool|int|float|string|array $value The constants class value to translate.
	 * @return null|bool|int|float|string|array The translated corresponding constants class value.
	 * @throws InvalidTypeExceptionInterface The type of the value is invalid.
	 * @throws InterfaceOrClassConstantNotFoundExceptionInterface An interface or class constant does not exist.
	 * @throws InterfaceOrClassConstantValueNotFoundExceptionInterface An interface or class constant value does not exist.
	 */
	public function translate( null | bool | int | float | string | array $value ): null | bool | int | float | string | array;
}
