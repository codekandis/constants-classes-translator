<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\Fixtures;

/**
 * Represents an enumeration of invalid values.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class InvalidValues
{
	/**
	 * Represents an unknown constants class class name.
	 * @var string
	 */
	public const string UNKNOWN_CONSTANTS_CLASS_CLASS_NAME = 'foobar';

	/**
	 * Represents an unknown input value.
	 * @var string
	 */
	public const string UNKNOWN_INPUT_VALUE = 'foobar';
}
