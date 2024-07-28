<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\CorrespondingConstantsClassValueNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\MessagesFixture;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;
use function sprintf;

/**
 * Represents a data provider providing constants classes translators with non-corresponding valid input value, expected throwable class name and expected throwable message.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorsWithNonCorrespondingValidInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslator'      => new ConstantsClassesTranslator( $inputConstantsClassClassName = CodesFixture::class, $outputConstantsClassClassName = MessagesFixture::class ),
				'nonCorrespondingValidInputValue' => 3,
				'expectedThrowableClassName'      => CorrespondingConstantsClassValueNotFoundException::class,
				'expectedThrowableMessage'        => sprintf( CorrespondingConstantsClassValueNotFoundException::EXCEPTION_MESSAGE_CORRESPONDING_CONSTANTS_CLASS_VALUE_NOT_FOUND, $inputConstantsClassClassName, 'FOURTH', $outputConstantsClassClassName )
			],
			1 => [
				'constantsClassesTranslator'      => new ConstantsClassesTranslator( $inputConstantsClassClassName = CodesFixture::class, $outputConstantsClassClassName = MessagesFixture::class ),
				'nonCorrespondingValidInputValue' => CodesFixture::FOURTH,
				'expectedThrowableClassName'      => CorrespondingConstantsClassValueNotFoundException::class,
				'expectedThrowableMessage'        => sprintf( CorrespondingConstantsClassValueNotFoundException::EXCEPTION_MESSAGE_CORRESPONDING_CONSTANTS_CLASS_VALUE_NOT_FOUND, $inputConstantsClassClassName, 'FOURTH', $outputConstantsClassClassName )
			]
		];
	}
}
