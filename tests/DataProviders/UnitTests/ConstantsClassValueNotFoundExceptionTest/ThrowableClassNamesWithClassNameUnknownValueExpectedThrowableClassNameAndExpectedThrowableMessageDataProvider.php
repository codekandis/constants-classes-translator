<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassValueNotFoundExceptionTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\InvalidValues;
use CodeKandis\PhpUnit\DataProviderInterface;
use Override;
use function sprintf;

/**
 * Represents a data provider providing throwable class names with class name, unknown value, expected throwable class name and expected throwable message.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class ThrowableClassNamesWithClassNameUnknownValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'throwableClassName'         => $throwableClassName = ConstantsClassValueNotFoundException::class,
				'className'                  => $className = CodesFixture::class,
				'unknownValue'               => $unknownValue = InvalidValues::UNKNOWN_INPUT_VALUE,
				'expectedThrowableClassName' => $throwableClassName,
				'expectedThrowableMessage'   => sprintf( ConstantsClassValueNotFoundException::EXCEPTION_MESSAGE_CONSTANTS_CLASS_VALUE_NOT_FOUND, $className, $unknownValue )
			]
		];
	}
}
