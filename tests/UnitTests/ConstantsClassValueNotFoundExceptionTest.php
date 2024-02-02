<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassValueNotFoundExceptionTest\ThrowableClassNamesWithClassNameUnknownValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundException`.
 * @package codekandis/codes-message-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassValueNotFoundExceptionTest extends TestCase
{
	/**
	 * Tests if the method `ConstantsClassValueNotFoundException::withClassNameAndUnknownValue()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $className The class name to pass.
	 * @param null|bool|int|float|string|array $unknownValue The unknown value to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithClassNameUnknownValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithClassNameAndUnknownValueInstantiatesThrowableCorrectly( string $throwableClassName, string $className, null|bool|int|float|string|array $unknownValue, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		/**
		 * @var ConstantsClassValueNotFoundException $throwableClassName
		 */
		$resultedThrowable          = $throwableClassName::with_classNameAndUnknownValue( $className, $unknownValue );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( ConstantsClassValueNotFoundException::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
