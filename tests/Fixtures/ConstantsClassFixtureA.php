<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\Fixtures;

/**
 * Represents a fixture of a constants class.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class ConstantsClassFixtureA
{
	/**
	 * Represents the first constant.
	 * @var int
	 */
	public const int FIRST = 0;

	/**
	 * Represents the second constant.
	 * @var int
	 */
	public const int SECOND = 1;

	/**
	 * Represents the third constant.
	 * @var int
	 */
	public const int THIRD = 2;

	/**
	 * Represents the fourth constant.
	 * @var array
	 */
	public const array FOURTH = [
		24,
		[
			42
		]
	];

	/**
	 * Represents the fifth constant.
	 * @var int
	 */
	public const int FIFTH = 5;
}
