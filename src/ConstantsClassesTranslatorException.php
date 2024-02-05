<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use LogicException;

/**
 * Represents the base class of any exception if an error occurres during the value translation.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class ConstantsClassesTranslatorException extends LogicException implements ConstantsClassesTranslatorExceptionInterface
{
}
