<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureB;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureB;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing constants classes translators with valid input value and expected translated output value.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorsWithValidInputValueAndExpectedTranslatedOutputValueDataProvider implements DataProviderInterface
{
	/**
	 * @inheritdoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsClassFixtureA::class, ConstantsClassFixtureB::class ),
				'validInputValue'               => ConstantsClassFixtureA::FIRST,
				'expectedTranslatedOutputValue' => ConstantsClassFixtureB::FIRST
			],
			1  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsClassFixtureA::class, ConstantsClassFixtureB::class ),
				'validInputValue'               => ConstantsClassFixtureA::SECOND,
				'expectedTranslatedOutputValue' => ConstantsClassFixtureB::SECOND
			],
			2  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsClassFixtureA::class, ConstantsClassFixtureB::class ),
				'validInputValue'               => ConstantsClassFixtureA::THIRD,
				'expectedTranslatedOutputValue' => ConstantsClassFixtureB::THIRD
			],
			3  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsClassFixtureA::class, ConstantsClassFixtureB::class ),
				'validInputValue'               => ConstantsClassFixtureA::FOURTH,
				'expectedTranslatedOutputValue' => ConstantsClassFixtureB::FOURTH
			],
			4  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsClassFixtureB::class, ConstantsClassFixtureA::class ),
				'validInputValue'               => ConstantsClassFixtureB::FIRST,
				'expectedTranslatedOutputValue' => ConstantsClassFixtureA::FIRST
			],
			5  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsClassFixtureB::class, ConstantsClassFixtureA::class ),
				'validInputValue'               => ConstantsClassFixtureB::SECOND,
				'expectedTranslatedOutputValue' => ConstantsClassFixtureA::SECOND
			],
			6  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsClassFixtureB::class, ConstantsClassFixtureA::class ),
				'validInputValue'               => ConstantsClassFixtureB::THIRD,
				'expectedTranslatedOutputValue' => ConstantsClassFixtureA::THIRD
			],
			7  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsClassFixtureB::class, ConstantsClassFixtureA::class ),
				'validInputValue'               => ConstantsClassFixtureB::FOURTH,
				'expectedTranslatedOutputValue' => ConstantsClassFixtureA::FOURTH
			],
			8  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::SIXTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::SIXTH
			],
			9  => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::SEVENTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::SEVENTH
			],
			10 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::EIGHTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::EIGHTH
			],
			11 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::NINTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::NINTH
			],
			12 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::SIXTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::SIXTH
			],
			13 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::SEVENTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::SEVENTH
			],
			14 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::EIGHTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::EIGHTH
			],
			15 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::NINTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::NINTH
			],
			16 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::SIXTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::SIXTH
			],
			17 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::SEVENTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::SEVENTH
			],
			18 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::EIGHTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::EIGHTH
			],
			19 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::NINTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::NINTH
			],
			20 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::SIXTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::SIXTH
			],
			21 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::SEVENTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::SEVENTH
			],
			22 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::EIGHTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::EIGHTH
			],
			23 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::NINTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::NINTH
			],
			24 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::SIXTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::SIXTH
			],
			25 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::SEVENTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::SEVENTH
			],
			26 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::EIGHTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::EIGHTH
			],
			27 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'validInputValue'               => ConstantsInterfaceFixtureA::NINTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureB::NINTH
			],
			28 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::SIXTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::SIXTH
			],
			29 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::SEVENTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::SEVENTH
			],
			30 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::EIGHTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::EIGHTH
			],
			31 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( ConstantsInterfaceFixtureB::class, ConstantsInterfaceFixtureA::class ),
				'validInputValue'               => ConstantsInterfaceFixtureB::NINTH,
				'expectedTranslatedOutputValue' => ConstantsInterfaceFixtureA::NINTH
			]
		];
	}
}
