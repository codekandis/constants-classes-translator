<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use CodeKandis\Types\ClassNotFoundExceptionInterface;

/**
 * Represents the interface of any exception if a constants class does not exist.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConstantsClassNotFoundExceptionInterface extends ClassNotFoundExceptionInterface
{
}
