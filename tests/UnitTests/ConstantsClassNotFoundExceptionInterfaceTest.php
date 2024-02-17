<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundExceptionInterface;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassNotFoundExceptionInterfaceTest\ThrowableClassNamesWithUnknownConstantsClassClassNameInnerThrowableExpectedThrowableClassNameExpectedThrowableMessageAndExpectedInnerThrowableDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Throwable;

/**
 * Represents the test case of `CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundExceptionInterface`.
 * @package codekandis/codes-message-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassNotFoundExceptionInterfaceTest extends TestCase
{
	/**
	 * Tests if the method `ConstantsClassNotFoundExceptionInterface::with_constantsClassNameAndInnerThrowable()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $unknownConstantsClassClassName The unknown constants class class name to pass.
	 * @param Throwable $innerThrowable The inner throwable to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 * @param Throwable $expectedInnerThrowable The expected inner throwable.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithUnknownConstantsClassClassNameInnerThrowableExpectedThrowableClassNameExpectedThrowableMessageAndExpectedInnerThrowableDataProvider::class, 'provideData' )]
	public function testIfMethodWithConstantsClassClassNameAndInnerThrowableInstantiatesThrowableCorrectly( string $throwableClassName, string $unknownConstantsClassClassName, Throwable $innerThrowable, string $expectedThrowableClassName, string $expectedThrowableMessage, Throwable $expectedInnerThrowable ): void
	{
		$resultedThrowable          = $throwableClassName::{'with_constantsClassClassNameAndInnerThrowable'}( $unknownConstantsClassClassName, $innerThrowable );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();
		$resultedInnerThrowable     = $resultedThrowable->getPrevious();

		static::assertInstanceOf( ConstantsClassNotFoundExceptionInterface::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		static::assertSame( $expectedInnerThrowable, $resultedInnerThrowable );
	}
}
