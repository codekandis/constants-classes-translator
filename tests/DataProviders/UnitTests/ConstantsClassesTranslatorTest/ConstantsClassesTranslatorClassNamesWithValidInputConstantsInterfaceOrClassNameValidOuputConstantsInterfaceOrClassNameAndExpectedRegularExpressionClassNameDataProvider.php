<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureB;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureB;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;

/**
 * Represents a data provider providing regular expression class names with valid input constants interface or class name, valid output constants interface or class name and expected regular expression class name.
 * @package codekandis/toolkit
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorClassNamesWithValidInputConstantsInterfaceOrClassNameValidOuputConstantsInterfaceOrClassNameAndExpectedRegularExpressionClassNameDataProvider implements DataProviderInterface
{
	/**
	 * @inheritdoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslatorClassName'         => $constantsClassesTranslatorClassName = ConstantsClassesTranslator::class,
				'validInputConstantsInterfaceOrClassName'     => ConstantsInterfaceFixtureA::class,
				'validOutputConstantsInterfaceOrClassName'    => ConstantsInterfaceFixtureB::class,
				'expectedConstantsClassesTranslatorClassName' => $constantsClassesTranslatorClassName
			],
			1 => [
				'constantsClassesTranslatorClassName'         => $constantsClassesTranslatorClassName = ConstantsClassesTranslator::class,
				'validInputConstantsInterfaceOrClassName'     => ConstantsClassFixtureA::class,
				'validOutputConstantsInterfaceOrClassName'    => ConstantsClassFixtureB::class,
				'expectedConstantsClassesTranslatorClassName' => $constantsClassesTranslatorClassName
			]
		];
	}
}
