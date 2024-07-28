<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundExceptionInterface;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest\ConstantsClassesTranslatorClassNamesWithUnknownInputConstantsClassClassNameValidOutputConstantsClassClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest\ConstantsClassesTranslatorClassNamesWithValidInputConstantsClassClassNameUnknownOutputConstantsClassClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\PhpUnit\TestCase;
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
	 * Tests if the instantiation of the constants classes translator throws `CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundException` on unknown input constants class class name.
	 * @param string $constantsClassesTranslatorClassName The class name of the constants classes translator to instantiate and test.
	 * @param string $unknownInputConstantsClassClassName The class name of the unknown input constants class to pass.
	 * @param string $validOutputConstantsClassClassName The class name of the valid output constants class to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorClassNamesWithUnknownInputConstantsClassClassNameValidOutputConstantsClassClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfInstantiationThrowsConstantsClassNotFoundExceptionInterfaceOnInvalidInputConstantsClassClassName( string $constantsClassesTranslatorClassName, string $unknownInputConstantsClassClassName, string $validOutputConstantsClassClassName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			new $constantsClassesTranslatorClassName( $unknownInputConstantsClassClassName, $validOutputConstantsClassClassName );
		}
		catch ( Throwable $throwable )
		{
			static::assertInstanceOf( ConstantsClassNotFoundExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame(
				$expectedThrowableMessage,
				$throwable->getMessage()
			);
		}
	}

	/**
	 * Tests if the instantiation of the constants classes translator throws `CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundException` on unknown output constants class class name.
	 * @param string $constantsClassesTranslatorClassName The class name of the constants classes translator to instantiate and test.
	 * @param string $validInputConstantsClassClassName The class name of the valid input constants class to pass.
	 * @param string $unknownOutputConstantsClassClassName The class name of the unknown output constants class to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorClassNamesWithValidInputConstantsClassClassNameUnknownOutputConstantsClassClassNameExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfInstantiationThrowsConstantsClassNotFoundExceptionInterfaceOnInvalidOutputConstantsClassClassName( string $constantsClassesTranslatorClassName, string $validInputConstantsClassClassName, string $unknownOutputConstantsClassClassName, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			new $constantsClassesTranslatorClassName( $validInputConstantsClassClassName, $unknownOutputConstantsClassClassName );
		}
		catch ( Throwable $throwable )
		{
			static::assertInstanceOf( ConstantsClassNotFoundExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame(
				$expectedThrowableMessage,
				$throwable->getMessage()
			);
		}
	}
}
