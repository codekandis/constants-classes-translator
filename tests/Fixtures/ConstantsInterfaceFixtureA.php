<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\Fixtures;

/**
 * Represents a fixture of a constants interface.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConstantsInterfaceFixtureA
{
	/**
	 * Represents the sixth constant.
	 * @var int
	 */
	public const int SIXTH = 6;

	/**
	 * Represents the seventh constant.
	 * @var int
	 */
	public const int SEVENTH = 7;

	/**
	 * Represents the eighth constant.
	 * @var int
	 */
	public const int EIGHTH = 8;

	/**
	 * Represents the ninth constant.
	 * @var array
	 */
	public const array NINTH = [
		42,
		[
			24
		]
	];

	/**
	 * Represents the tenth constant.
	 * @var int
	 */
	public const int TENTH = 10;
}
