<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundException;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassNotFoundExceptionTest\ThrowableClassNamesWithClassNameInnerThrowableExpectedThrowableClassNameExpectedThrowableMessageAndExpectedInnerThrowableDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Throwable;

/**
 * Represents the test case of `CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundException`.
 * @package codekandis/codes-message-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassNotFoundExceptionTest extends TestCase
{
	/**
	 * Tests if the method `ConstantsClassNotFoundException::with_classNameAndInnerThrowable()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $className The unknown constants class class name to pass.
	 * @param Throwable $innerThrowable The inner throwable to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 * @param Throwable $expectedInnerThrowable The expected inner throwable.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithClassNameInnerThrowableExpectedThrowableClassNameExpectedThrowableMessageAndExpectedInnerThrowableDataProvider::class, 'provideData' )]
	public function testIfMethodWithClassNameAndInnerThrowableInstantiatesThrowableCorrectly( string $throwableClassName, string $className, Throwable $innerThrowable, string $expectedThrowableClassName, string $expectedThrowableMessage, Throwable $expectedInnerThrowable ): void
	{
		/**
		 * @var ConstantsClassValueNotFoundException $throwableClassName
		 */
		$resultedThrowable          = $throwableClassName::{'with_classNameAndInnerThrowable'}( $className, $innerThrowable );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();
		$resultedInnerThrowable     = $resultedThrowable->getPrevious();

		static::assertInstanceOf( ConstantsClassNotFoundException::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		static::assertSame( $expectedInnerThrowable, $resultedInnerThrowable );
	}
}
