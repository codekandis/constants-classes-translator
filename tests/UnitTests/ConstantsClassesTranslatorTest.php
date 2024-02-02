<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest\ConstantsClassesTranslatorClassNamesWithUnknownInputConstantsInterfaceOrClassNameValidOutputConstantsInterfaceOrClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest\ConstantsClassesTranslatorClassNamesWithValidInputConstantsInterfaceOrClassNameUnknownOutputConstantsInterfaceOrClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest\ConstantsClassesTranslatorClassNamesWithValidInputConstantsInterfaceOrClassNameValidOuputConstantsInterfaceOrClassNameAndExpectedRegularExpressionClassNameDataProvider;
use CodeKandis\PhpUnit\TestCase;
use CodeKandis\Types\InterfaceOrClassNotFoundExceptionInterface;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Throwable;

/**
 * Represents the test case of `CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator`.
 * @package codekandis/codes-message-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorTest extends TestCase
{
	/**
	 * Tests if {@link ConstantsClassesTranslator::__construct()} throws an {@link InterfaceOrClassConstantNotFoundExceptionInterface} on an unknown input constants interface or class name.
	 * @param string $constantsClassesTranslatorClassName The class name of the constants classes translator to instantiate and test.
	 * @param string $unknownInputConstantsInterfaceOrClassName The name of the unknown input constants interface or class to pass.
	 * @param string $validOutputConstantsInterfaceOrClassName The name of the valid output constants interface or class to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorClassNamesWithUnknownInputConstantsInterfaceOrClassNameValidOutputConstantsInterfaceOrClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfInstantiationThrowsConstantsClassNotFoundExceptionInterfaceOnInvalidInputConstantsInterfaceOrClassName( string $constantsClassesTranslatorClassName, string $unknownInputConstantsInterfaceOrClassName, string $validOutputConstantsInterfaceOrClassName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			new $constantsClassesTranslatorClassName( $unknownInputConstantsInterfaceOrClassName, $validOutputConstantsInterfaceOrClassName );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( InterfaceOrClassNotFoundExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if {@link ConstantsClassesTranslator::__construct()} throws an {@link InterfaceOrClassConstantNotFoundExceptionInterface} on an unknown output constants interface or class name.
	 * @param string $constantsClassesTranslatorClassName The class name of the constants classes translator to instantiate and test.
	 * @param string $validInputConstantsInterfaceOrClassName The name of the valid input constants interface or class to pass.
	 * @param string $unknownOutputConstantsInterfaceOrClassName The name of the unknown output constants interface or class to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorClassNamesWithValidInputConstantsInterfaceOrClassNameUnknownOutputConstantsInterfaceOrClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfInstantiationThrowsConstantsClassNotFoundExceptionInterfaceOnInvalidOutputConstantsInterfaceOrClassName( string $constantsClassesTranslatorClassName, string $validInputConstantsInterfaceOrClassName, string $unknownOutputConstantsInterfaceOrClassName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			new $constantsClassesTranslatorClassName( $validInputConstantsInterfaceOrClassName, $unknownOutputConstantsInterfaceOrClassName );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( InterfaceOrClassNotFoundExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if {@link ConstantsClassesTranslator::__construct()} instantiates correctly on valid input and output constants interface or class name.
	 * @param string $constantsClassesTranslatorClassName The class name of the regular expression to test.
	 * @param string $validInputConstantsInterfaceOrClassName The name of the valid input constants interface or class to pass.
	 * @param string $validOutputConstantsInterfaceOrClassName The name of the valid output constants interface or class to pass.
	 * @param string $expectedConstantsClassesTranslatorClassName The expected class name of the instantiated constants classes translator.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorClassNamesWithValidInputConstantsInterfaceOrClassNameValidOuputConstantsInterfaceOrClassNameAndExpectedRegularExpressionClassNameDataProvider::class, 'provideData' )]
	public function testIfConstructorInstantiatesCorrectlyOnValidRegularExpression( string $constantsClassesTranslatorClassName, string $validInputConstantsInterfaceOrClassName, string $validOutputConstantsInterfaceOrClassName, string $expectedConstantsClassesTranslatorClassName ): void
	{
		$returnedInstance = new $constantsClassesTranslatorClassName( $validInputConstantsInterfaceOrClassName, $validOutputConstantsInterfaceOrClassName );

		static::assertSame( $returnedInstance::class, $expectedConstantsClassesTranslatorClassName );
	}
}
