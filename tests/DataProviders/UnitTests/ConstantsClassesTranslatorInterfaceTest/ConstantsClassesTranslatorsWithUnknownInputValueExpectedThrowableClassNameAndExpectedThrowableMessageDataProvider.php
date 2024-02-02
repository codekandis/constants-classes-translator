<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\InvalidValues;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\MessagesFixture;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;
use function sprintf;

/**
 * Represents a data provider providing constants classes translators with unknown input value, expected throwable class name and expected throwable message.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorsWithUnknownInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslator' => new ConstantsClassesTranslator( $inputConstantsClassClassName = CodesFixture::class, MessagesFixture::class ),
				'unknownInputValue'          => $unknownInputValue = InvalidValues::UNKNOWN_INPUT_VALUE,
				'expectedThrowableClassName' => ConstantsClassValueNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( ConstantsClassValueNotFoundException::EXCEPTION_MESSAGE_CONSTANTS_CLASS_VALUE_NOT_FOUND, $inputConstantsClassClassName, $unknownInputValue )
			]
		];
	}
}
