<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\CorrespondingConstantsClassValueNotFoundExceptionInterface;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\CorrespondingConstantsClassValueNotFoundExceptionInterfaceTest\ThrowableClassNamesWithInputConstantsClassClassNameInputConstantNameOutputConstantsClassClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\ConstantsClassesTranslator\CorrespondingConstantsClassValueNotFoundExceptionInterface`.
 * @package codekandis/codes-message-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class CorrespondingConstantsClassValueNotFoundExceptionInterfaceTest extends TestCase
{
	/**
	 * Tests if the method `CorrespondingConstantsClassValueNotFoundExceptionInterface::with_inputConstantsClassClassNameInputConstantNameAndOutputConstantsClassClassName()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $inputConstantsClassClassName The class name of the input constants class to pass.
	 * @param string $inputConstantName The name of the input constant to pass.
	 * @param string $outputConstantsClassClassName The class name of the output constants class to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithInputConstantsClassClassNameInputConstantNameOutputConstantsClassClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithConstantsClassClassNameAndUnknownValueInstantiatesThrowableCorrectly( string $throwableClassName, string $inputConstantsClassClassName, string $inputConstantName, string $outputConstantsClassClassName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		$resultedThrowable          = $throwableClassName::{'with_inputConstantsClassClassNameInputConstantNameAndOutputConstantsClassClassName'}( $inputConstantsClassClassName, $inputConstantName, $outputConstantsClassClassName );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( CorrespondingConstantsClassValueNotFoundExceptionInterface::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
