<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest;

use ArrayIterator;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\MessagesFixture;

/**
 * Represents a data provider providing instantiated constants classes translators with valid input values and expected output values.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorsWithValidInputValuesAndExpectedOutputValuesDataProvider extends ArrayIterator
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		parent::__construct(
			[
				0 => [
					'constantsClassesTranslator' => new ConstantsClassesTranslator( CodesFixture::class, MessagesFixture::class ),
					'inputValue'                 => CodesFixture::FIRST,
					'expectedOutputValue'        => MessagesFixture::FIRST
				],
				1 => [
					'constantsClassesTranslator' => new ConstantsClassesTranslator( CodesFixture::class, MessagesFixture::class ),
					'inputValue'                 => CodesFixture::SECOND,
					'expectedOutputValue'        => MessagesFixture::SECOND
				],
				2 => [
					'constantsClassesTranslator' => new ConstantsClassesTranslator( CodesFixture::class, MessagesFixture::class ),
					'inputValue'                 => CodesFixture::THIRD,
					'expectedOutputValue'        => MessagesFixture::THIRD
				],
				3 => [
					'constantsClassesTranslator' => new ConstantsClassesTranslator( MessagesFixture::class, CodesFixture::class ),
					'inputValue'                 => MessagesFixture::FIRST,
					'expectedOutputValue'        => CodesFixture::FIRST
				],
				4 => [
					'constantsClassesTranslator' => new ConstantsClassesTranslator( MessagesFixture::class, CodesFixture::class ),
					'inputValue'                 => MessagesFixture::SECOND,
					'expectedOutputValue'        => CodesFixture::SECOND
				],
				5 => [
					'constantsClassesTranslator' => new ConstantsClassesTranslator( MessagesFixture::class, CodesFixture::class ),
					'inputValue'                 => MessagesFixture::THIRD,
					'expectedOutputValue'        => CodesFixture::THIRD
				]
			]
		);
	}
}
