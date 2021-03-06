<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

/**
 * Represents the interface of all constant classes translators.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConstantsClassesTranslatorInterface
{
	/**
	 * Translates a constants class value into the corresponding constants class value.
	 * @param mixed $value The constants class value to translate.
	 * @return mixed The translated corresponding constants class value.
	 * @throws CorrespondingConstantsClassValueNotFoundException The constants class value has no corresponding constants class value.
	 * @throws ConstantsClassValueNotFoundException The constants class value does not exist.
	 */
	public function translate( $value );
}
