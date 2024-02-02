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
 * Represents a data provider providing constants classes translator class names with unknown input constants interface or class name, valid output constants interface or class name, expected throwable class name and expected throwable message.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorClassNamesWithUnknownInputConstantsInterfaceOrClassNameValidOutputConstantsInterfaceOrClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritdoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslatorClassName'       => ConstantsClassesTranslator::class,
				'unknownInputConstantsInterfaceOrClassName' => $unkownInputConstantsInterfaceOrClassName = InvalidValues::UNKNOWN_CONSTANTS_CLASS_CLASS_NAME,
				'validOutputConstantsInterfaceOrClassName'  => ConstantsClassFixtureA::class,
				'expectedThrowableClassName'                => InterfaceOrClassNotFoundException::class,
				'expectedThrowableMessage'                  => sprintf( InterfaceOrClassNotFoundException::EXCEPTION_MESSAGE_WITH_NONEXISTENT_INTERFACE_OR_CLASS_NAME, $unkownInputConstantsInterfaceOrClassName )
			]
		];
	}
}
