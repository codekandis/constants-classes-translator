<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\Fixtures;

use stdClass;

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

	/**
	 * Creates an invalid array input value.
	 * @return array The created invalid array input value.
	 */
	public static function createInvalidArrayInputValue(): array
	{
		return [
			null,
			true,
			42,
			42.24,
			'foobar',
			new stdClass()
		];
	}
}
