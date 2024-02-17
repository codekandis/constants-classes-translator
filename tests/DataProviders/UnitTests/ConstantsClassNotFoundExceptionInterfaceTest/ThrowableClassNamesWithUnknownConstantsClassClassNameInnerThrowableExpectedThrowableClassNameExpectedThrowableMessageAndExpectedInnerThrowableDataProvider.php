<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassNotFoundExceptionInterfaceTest;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\InvalidValues;
use CodeKandis\PhpUnit\DataProviderInterface;
use Exception;
use Override;
use function sprintf;

/**
 * Represents a data provider providing throwable class names with unknown constants class class name, inner throwable, expected throwable class name, expected throwable message and expected inner throwable.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class ThrowableClassNamesWithUnknownConstantsClassClassNameInnerThrowableExpectedThrowableClassNameExpectedThrowableMessageAndExpectedInnerThrowableDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'throwableClassName'             => $throwableClassName = ConstantsClassNotFoundException::class,
				'unknownConstantsClassClassName' => $unknownConstantsClassClassName = InvalidValues::UNKNOWN_CONSTANTS_CLASS_CLASS_NAME,
				'innerThrowable'                 => $innerThrowable = new Exception(),
				'expectedThrowableClassName'     => $throwableClassName,
				'expectedThrowableMessage'       => sprintf( ConstantsClassNotFoundException::EXCEPTION_MESSAGE_CONSTANTS_CLASS_NOT_FOUND, $unknownConstantsClassClassName ),
				'expectedInnerThrowable'         => $innerThrowable
			]
		];
	}
}
