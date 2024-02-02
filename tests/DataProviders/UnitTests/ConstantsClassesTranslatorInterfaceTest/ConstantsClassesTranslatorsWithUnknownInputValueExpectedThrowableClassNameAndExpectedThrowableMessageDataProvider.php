<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureB;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureB;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\InvalidValues;
use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\Types\InterfaceOrClassConstantValueNotFoundException;
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
	 * @inheritdoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslator' => new ConstantsClassesTranslator( $inputConstantsInterfaceOrClassName = ConstantsClassFixtureA::class, ConstantsClassFixtureB::class ),
				'unknownInputValue'          => $unknownInputValue = InvalidValues::UNKNOWN_INPUT_VALUE,
				'expectedThrowableClassName' => InterfaceOrClassConstantValueNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( InterfaceOrClassConstantValueNotFoundException::EXCEPTION_MESSAGE_WITH_INTERFACE_OR_CLASS_NAME_AND_NONEXISTENT_CONSTANT_VALUE, $inputConstantsInterfaceOrClassName, $unknownInputValue )
			],
			1 => [
				'constantsClassesTranslator' => new ConstantsClassesTranslator( $inputConstantsInterfaceOrClassName = ConstantsInterfaceFixtureA::class, ConstantsInterfaceFixtureB::class ),
				'unknownInputValue'          => $unknownInputValue = InvalidValues::UNKNOWN_INPUT_VALUE,
				'expectedThrowableClassName' => InterfaceOrClassConstantValueNotFoundException::class,
				'expectedThrowableMessage'   => sprintf( InterfaceOrClassConstantValueNotFoundException::EXCEPTION_MESSAGE_WITH_INTERFACE_OR_CLASS_NAME_AND_NONEXISTENT_CONSTANT_VALUE, $inputConstantsInterfaceOrClassName, $unknownInputValue )
			]
		];
	}
}
