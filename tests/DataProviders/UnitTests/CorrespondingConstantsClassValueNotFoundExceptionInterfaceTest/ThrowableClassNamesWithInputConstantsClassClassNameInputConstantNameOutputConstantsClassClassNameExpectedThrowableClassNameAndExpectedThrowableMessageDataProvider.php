<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\CorrespondingConstantsClassValueNotFoundExceptionInterfaceTest;

use CodeKandis\ConstantsClassesTranslator\CorrespondingConstantsClassValueNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\MessagesFixture;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;
use function sprintf;

/**
 * Represents a data provider providing throwable class names with input constants class class name, input constant name, output constants class class name, expected throwable class name and expected throwable message.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class ThrowableClassNamesWithInputConstantsClassClassNameInputConstantNameOutputConstantsClassClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'throwableClassName'            => $throwableClassName = CorrespondingConstantsClassValueNotFoundException::class,
				'inputConstantsClassClassName'  => $inputConstantsClassClassName = CodesFixture::class,
				'inputConstantName'             => $inputConstantName = 'FOURTH',
				'outputConstantsClassClassName' => $outputConstantsClassClassName = MessagesFixture::class,
				'expectedThrowableClassName'    => $throwableClassName,
				'expectedThrowableMessage'      => sprintf( CorrespondingConstantsClassValueNotFoundException::EXCEPTION_MESSAGE_CORRESPONDING_CONSTANTS_CLASS_VALUE_NOT_FOUND, $inputConstantsClassClassName, $inputConstantName, $outputConstantsClassClassName )
			]
		];
	}
}
