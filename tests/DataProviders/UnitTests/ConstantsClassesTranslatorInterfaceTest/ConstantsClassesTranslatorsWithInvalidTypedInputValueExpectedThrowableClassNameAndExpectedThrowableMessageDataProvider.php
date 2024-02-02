<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureB;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureB;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\InvalidValues;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\Types;
use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\Types\InvalidTypeException;
use Override;
use function implode;
use function sprintf;

/**
 * Represents a data provider providing constants classes translators with unknown input value, expected throwable class name and expected throwable message.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorsWithInvalidTypedInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritdoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslator' => new ConstantsClassesTranslator( ConstantsClassFixtureA::class, ConstantsClassFixtureB::class ),
				'invalidTypedInputValue'     => InvalidValues::createInvalidArrayInputValue(),
				'expectedThrowableClassName' => InvalidTypeException::class,
				'expectedThrowableMessage'   => sprintf(
					InvalidTypeException::EXCEPTION_MESSAGE_WITH_INVALID_TYPE_AND_EXPECTED_TYPES, Types::INVALID_TYPE,
					implode( ' | ', Types::EXPECTED_TYPES )
				)
			],
			1 => [
				'constantsClassesTranslator' => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'invalidTypedInputValue'     => InvalidValues::createInvalidArrayInputValue(),
				'expectedThrowableClassName' => InvalidTypeException::class,
				'expectedThrowableMessage'   => sprintf(
					InvalidTypeException::EXCEPTION_MESSAGE_WITH_INVALID_TYPE_AND_EXPECTED_TYPES, Types::INVALID_TYPE,
					implode( ' | ', Types::EXPECTED_TYPES )
				)
			]
		];
	}
}
