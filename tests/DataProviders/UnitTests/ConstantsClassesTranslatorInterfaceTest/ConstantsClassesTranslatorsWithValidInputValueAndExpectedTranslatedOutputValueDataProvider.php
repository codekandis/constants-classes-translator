<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\MessagesFixture;
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
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( CodesFixture::class, MessagesFixture::class ),
				'validInputValue'               => CodesFixture::FIRST,
				'expectedTranslatedOutputValue' => MessagesFixture::FIRST
			],
			1 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( CodesFixture::class, MessagesFixture::class ),
				'validInputValue'               => CodesFixture::SECOND,
				'expectedTranslatedOutputValue' => MessagesFixture::SECOND
			],
			2 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( CodesFixture::class, MessagesFixture::class ),
				'validInputValue'               => CodesFixture::THIRD,
				'expectedTranslatedOutputValue' => MessagesFixture::THIRD
			],
			3 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( MessagesFixture::class, CodesFixture::class ),
				'validInputValue'               => MessagesFixture::FIRST,
				'expectedTranslatedOutputValue' => CodesFixture::FIRST
			],
			4 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( MessagesFixture::class, CodesFixture::class ),
				'validInputValue'               => MessagesFixture::SECOND,
				'expectedTranslatedOutputValue' => CodesFixture::SECOND
			],
			5 => [
				'constantsClassesTranslator'    => new ConstantsClassesTranslator( MessagesFixture::class, CodesFixture::class ),
				'validInputValue'               => MessagesFixture::THIRD,
				'expectedTranslatedOutputValue' => CodesFixture::THIRD
			]
		];
	}
}
