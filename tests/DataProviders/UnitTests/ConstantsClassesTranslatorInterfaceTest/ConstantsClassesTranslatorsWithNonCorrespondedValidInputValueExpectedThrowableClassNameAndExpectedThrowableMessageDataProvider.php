<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsClassFixtureB;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureA;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\ConstantsInterfaceFixtureB;
use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\Types\InterfaceOrClassConstantNotFoundException;
use Override;
use function sprintf;

/**
 * Represents a data provider providing constants classes translators with noncorresponded input value, expected throwable class name and expected throwable message.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorsWithNonCorrespondedValidInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritdoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'constantsClassesTranslator'     => new ConstantsClassesTranslator( ConstantsClassFixtureA::class, $outputConstantsInterfaceOrClassName = ConstantsClassFixtureB::class ),
				'nonCorrespondedValidInputValue' => 5,
				'expectedThrowableClassName'     => InterfaceOrClassConstantNotFoundException::class,
				'expectedThrowableMessage'       => sprintf( InterfaceOrClassConstantNotFoundException::EXCEPTION_MESSAGE_WITH_INTERFACE_OR_CLASS_NAME_AND_NONEXISTENT_CONSTANT_NAME, $outputConstantsInterfaceOrClassName, 'FIFTH' )
			],
			1 => [
				'constantsClassesTranslator'     => new ConstantsClassesTranslator( ConstantsClassFixtureA::class, $outputConstantsInterfaceOrClassName = ConstantsClassFixtureB::class ),
				'nonCorrespondedValidInputValue' => ConstantsClassFixtureA::FIFTH,
				'expectedThrowableClassName'     => InterfaceOrClassConstantNotFoundException::class,
				'expectedThrowableMessage'       => sprintf( InterfaceOrClassConstantNotFoundException::EXCEPTION_MESSAGE_WITH_INTERFACE_OR_CLASS_NAME_AND_NONEXISTENT_CONSTANT_NAME, $outputConstantsInterfaceOrClassName, 'FIFTH' )
			],
			2 => [
				'constantsClassesTranslator'     => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, $outputConstantsInterfaceOrClassName = ConstantsInterfaceFixtureB::class ),
				'nonCorrespondedValidInputValue' => 10,
				'expectedThrowableClassName'     => InterfaceOrClassConstantNotFoundException::class,
				'expectedThrowableMessage'       => sprintf( InterfaceOrClassConstantNotFoundException::EXCEPTION_MESSAGE_WITH_INTERFACE_OR_CLASS_NAME_AND_NONEXISTENT_CONSTANT_NAME, $outputConstantsInterfaceOrClassName, 'TENTH' )
			],
			3 => [
				'constantsClassesTranslator'     => new ConstantsClassesTranslator( ConstantsInterfaceFixtureA::class, $outputConstantsInterfaceOrClassName = ConstantsInterfaceFixtureB::class ),
				'nonCorrespondedValidInputValue' => ConstantsInterfaceFixtureA::TENTH,
				'expectedThrowableClassName'     => InterfaceOrClassConstantNotFoundException::class,
				'expectedThrowableMessage'       => sprintf( InterfaceOrClassConstantNotFoundException::EXCEPTION_MESSAGE_WITH_INTERFACE_OR_CLASS_NAME_AND_NONEXISTENT_CONSTANT_NAME, $outputConstantsInterfaceOrClassName, 'TENTH' )
			]
		];
	}
}
