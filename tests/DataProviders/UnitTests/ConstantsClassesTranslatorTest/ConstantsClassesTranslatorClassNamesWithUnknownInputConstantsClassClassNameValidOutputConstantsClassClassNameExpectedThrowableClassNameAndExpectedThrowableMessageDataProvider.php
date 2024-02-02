<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\InvalidValues;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;
use function sprintf;

/**
 * Represents a data provider providing constants classes translator class names with unknown input constants class class name, valid output constants class class name, expected throwable class name and expected throwable message.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorClassNamesWithUnknownInputConstantsClassClassNameValidOutputConstantsClassClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslatorClassName' => ConstantsClassesTranslator::class,
				'unknownInputConstantsClassClassName' => $unkownInputConstantsClassClassName = InvalidValues::UNKNOWN_CONSTANTS_CLASS_CLASS_NAME,
				'validOutputConstantsClassClassName'  => CodesFixture::class,
				'expectedThrowableClassName'          => ConstantsClassNotFoundException::class,
				'expectedThrowableMessage'            => sprintf( ConstantsClassNotFoundException::EXCEPTION_MESSAGE_CONSTANTS_CLASS_NOT_FOUND, $unkownInputConstantsClassClassName )
			]
		];
	}
}
