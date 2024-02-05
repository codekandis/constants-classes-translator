<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use CodeKandis\Types\ConstantNotFoundExceptionInterface;

/**
 * Represents the interface of any exception if a constants class value has no corresponding constants class value.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
interface CorrespondingConstantsClassValueNotFoundExceptionInterface extends ConstantNotFoundExceptionInterface
{
}
