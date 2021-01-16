<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest;

use ArrayIterator;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundException;
use CodeKandis\ConstantsClassesTranslator\CorrespondingConstantsClassValueNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\MessagesFixture;
use function sprintf;

/**
 * Represents a data provider providing instantiated constants classes translators with unknown input values, expected exception class names, expected exception codes and expected exception messages.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorsWithUnknownInputValuesAndExpectedExceptionsDataProvider extends ArrayIterator
{
	public function __construct()
	{
		parent::__construct(
			[
				0 => [
					'constantsClassesTranslator' => new ConstantsClassesTranslator( CodesFixture::class, MessagesFixture::class ),
					'inputValue'                 => CodesFixture::FOURTH,
					'expectedExceptionClassName' => CorrespondingConstantsClassValueNotFoundException::class,
					'expectedExceptionCode'      => 3,
					'expectedExceptionMessage'   => sprintf(
						'The constants class value `%s::%s` has no corresponding constants class value in constants class `%s`.',
						CodesFixture::class,
						'FOURTH',
						MessagesFixture::class
					)
				],
				1 => [
					'constantsClassesTranslator' => new ConstantsClassesTranslator( CodesFixture::class, MessagesFixture::class ),
					'inputValue'                 => 'foobar',
					'expectedExceptionClassName' => ConstantsClassValueNotFoundException::class,
					'expectedExceptionCode'      => 4,
					'expectedExceptionMessage'   => sprintf(
						'The constants class value `%s` does not exist.',
						'foobar'
					)
				]
			]
		);
	}
}
