<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\Fixtures;

/**
 * Represents an enumeration of types.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class Types
{
	/**
	 * Represents an invalid type.
	 * @var string
	 */
	public const string INVALID_TYPE = 'array<mixed>';

	/**
	 * Represents a set of expected types.
	 * @var string[]
	 */
	public const array EXPECTED_TYPES = [
		'null',
		'scalar',
		'nested-array<null|scalar>'
	];
}
