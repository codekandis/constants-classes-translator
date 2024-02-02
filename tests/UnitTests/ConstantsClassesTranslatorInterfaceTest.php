<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslatorInterface;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest\ConstantsClassesTranslatorsWithInvalidTypedInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest\ConstantsClassesTranslatorsWithNonCorrespondedValidInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest\ConstantsClassesTranslatorsWithUnknownInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest\ConstantsClassesTranslatorsWithValidInputValueAndExpectedTranslatedOutputValueDataProvider;
use CodeKandis\PhpUnit\TestCase;
use CodeKandis\Types\InterfaceOrClassConstantNotFoundExceptionInterface;
use CodeKandis\Types\InterfaceOrClassConstantValueNotFoundExceptionInterface;
use CodeKandis\Types\InvalidTypeExceptionInterface;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Throwable;

/**
 * Represents the test case of `CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslatorInterface`.
 * @package codekandis/codes-message-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorInterfaceTest extends TestCase
{
	/**
	 * Tests {@link ConstantsClassesTranslatorInterface::translate()} throws an {@link InvalidTypeExceptionInterface} if an input value is not of expected type.
	 * @param ConstantsClassesTranslatorInterface $constantsClassesTranslator The constants classes translator to test.
	 * @param null|scalar|array<null|scalar> $invalidTypedInputValue The invalid typed input value to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorsWithInvalidTypedInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodInterpretThrowsInvalidTypeExceptionInterfaceOnInvalidTypedInputValue( ConstantsClassesTranslatorInterface $constantsClassesTranslator, null | bool | int | float | string | array $invalidTypedInputValue, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$constantsClassesTranslator->translate( $invalidTypedInputValue );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( InvalidTypeExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if {@link ConstantsClassesTranslatorInterface::translate()} throws an {@link InterfaceOrClassConstantValueNotFoundExceptionInterface} if an input value does not exist.
	 * @param ConstantsClassesTranslatorInterface $constantsClassesTranslator The constants classes translator to test.
	 * @param null|scalar|array<null|scalar> $unknownInputValue The unknown input value to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorsWithUnknownInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodInterpretThrowsConstantsClassValueNotFoundExceptionInterfaceOnUnknownInputValue( ConstantsClassesTranslatorInterface $constantsClassesTranslator, null | bool | int | float | string | array $unknownInputValue, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$constantsClassesTranslator->translate( $unknownInputValue );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( InterfaceOrClassConstantValueNotFoundExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if {@link ConstantsClassesTranslatorInterface::translate()} throws an {@link InterfaceOrClassConstantNotFoundExceptionInterface} if an input value has no corresponding output value.
	 * @param ConstantsClassesTranslatorInterface $constantsClassesTranslator The constants classes translator to test.
	 * @param null|scalar|array<null|scalar> $nonCorrespondedValidInputValue The noncorresponded valid input value to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorsWithNonCorrespondedValidInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodInterpretThrowsCorrespondingConstantsClassValueNotFoundExceptionInterfaceOnNonCorrespondingInputValue( ConstantsClassesTranslatorInterface $constantsClassesTranslator, null | bool | int | float | string | array $nonCorrespondedValidInputValue, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$constantsClassesTranslator->translate( $nonCorrespondedValidInputValue );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( InterfaceOrClassConstantNotFoundExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if {@link ConstantsClassesTranslatorInterface::translate()} translates correctly.
	 * @param ConstantsClassesTranslatorInterface $constantsClassesTranslator The constants classes translator to test.
	 * @param null|scalar|array<null|scalar> $validInputValue The valid input value to translate to pass.
	 * @param null|scalar|array<null|scalar> $expectedTranslatedOutputValue The expected translated output value.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorsWithValidInputValueAndExpectedTranslatedOutputValueDataProvider::class, 'provideData' )]
	public function testIfMethodInterpretReturnsMessagesCorrectly( ConstantsClassesTranslatorInterface $constantsClassesTranslator, null | bool | int | float | string | array $validInputValue, null | bool | int | float | string | array $expectedTranslatedOutputValue ): void
	{
		$resultedTranslatedOutputValue = $constantsClassesTranslator->translate( $validInputValue );

		static::assertSame( $expectedTranslatedOutputValue, $resultedTranslatedOutputValue );
	}
}
