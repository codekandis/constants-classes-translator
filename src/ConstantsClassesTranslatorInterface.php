<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use CodeKandis\Types\ObjectInterface;

/**
 * Represents the interface of all constant classes translators.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConstantsClassesTranslatorInterface extends ObjectInterface
{
	/**
	 * Translates a constants class value into the corresponding constants class value.
	 * @param null|bool|int|float|string|array $value The constants class value to translate.
	 * @return null|bool|int|float|string|array The translated corresponding constants class value.
	 * @throws ConstantsClassValueNotFoundExceptionInterface The constants class value does not exist.
	 * @throws CorrespondingConstantsClassValueNotFoundExceptionInterface The constants class value has no corresponding constants class value.
	 */
	public function translate( null|bool|int|float|string|array $value ): null|bool|int|float|string|array;
}
