<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\CorrespondingConstantsClassValueNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\CorrespondingConstantsClassValueNotFoundExceptionTest\ThrowableClassNamesWithInputClassNameInputConstantNameOutputClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\PhpUnit\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\ConstantsClassesTranslator\CorrespondingConstantsClassValueNotFoundException`.
 * @package codekandis/codes-message-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class CorrespondingConstantsClassValueNotFoundExceptionTest extends TestCase
{
	/**
	 * Tests if the method `CorrespondingConstantsClassValueNotFoundException::with_inputClassNameInputConstantNameAndOutputClassName()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $inputClassName The class name of the input class to pass.
	 * @param string $inputConstantName The name of the input constant to pass.
	 * @param string $outputClassName The class name of the output class to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithInputClassNameInputConstantNameOutputClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithInputClassNameInputConstantNameAndOutputClassNameInstantiatesThrowableCorrectly( string $throwableClassName, string $inputClassName, string $inputConstantName, string $outputClassName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		/**
		 * @var CorrespondingConstantsClassValueNotFoundException $throwableClassName
		 */
		$resultedThrowable          = $throwableClassName::with_inputClassNameInputConstantNameAndOutputClassName( $inputClassName, $inputConstantName, $outputClassName );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( CorrespondingConstantsClassValueNotFoundException::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
