<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\InvalidValues;
use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\Types\InterfaceOrClassNotFoundException;
use Override;
use function sprintf;

/**
 * Represents a data provider providing constants classes translator class names with valid input constants interface or class name, unknown output constants interface or class name, expected throwable class name and expected throwable message.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorClassNamesWithValidInputConstantsInterfaceOrClassNameUnknownOutputConstantsInterfaceOrClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritdoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslatorClassName'        => ConstantsClassesTranslator::class,
				'validInputConstantsInterfaceOrClassName'    => ConstantsClassFixtureA::class,
				'unknownOutputConstantsInterfaceOrClassName' => $unknownOutputConstantsInterfaceOrClassName = InvalidValues::UNKNOWN_CONSTANTS_CLASS_CLASS_NAME,
				'expectedThrowableClassName'                 => InterfaceOrClassNotFoundException::class,
				'expectedThrowableMessage'                   => sprintf( InterfaceOrClassNotFoundException::EXCEPTION_MESSAGE_WITH_NONEXISTENT_INTERFACE_OR_CLASS_NAME, $unknownOutputConstantsInterfaceOrClassName )
			]
		];
	}
}
