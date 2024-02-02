<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundExceptionInterface;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassValueNotFoundExceptionInterfaceTest\ThrowableClassNamesWithConstantsClassClassNameUnknownValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundExceptionInterface`.
 * @package codekandis/codes-message-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassValueNotFoundExceptionInterfaceTest extends TestCase
{
	/**
	 * Tests if the method `ConstantsClassValueNotFoundExceptionInterface::with_constantsClassNameAndInnerThrowable()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $constantsClassClassName The constants class class name to pass.
	 * @param null|bool|int|float|string|array $unknownValue The unknown value to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithConstantsClassClassNameUnknownValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithConstantsClassClassNameAndUnknownValueInstantiatesThrowableCorrectly( string $throwableClassName, string $constantsClassClassName, null|bool|int|float|string|array $unknownValue, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		$resultedThrowable          = $throwableClassName::{'with_constantsClassClassNameAndUnknownValue'}( $constantsClassClassName, $unknownValue );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( ConstantsClassValueNotFoundExceptionInterface::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
