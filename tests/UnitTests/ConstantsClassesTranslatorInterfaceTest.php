<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslatorInterface;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundExceptionInterface;
use CodeKandis\ConstantsClassesTranslator\CorrespondingConstantsClassValueNotFoundExceptionInterface;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest\ConstantsClassesTranslatorsWithNonCorrespondingValidInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest\ConstantsClassesTranslatorsWithUnknownInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest\ConstantsClassesTranslatorsWithValidInputValueAndExpectedTranslatedOutputValueDataProvider;
use CodeKandis\PhpUnit\TestCase;
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
	 * Tests if the method `ConstantsClassesTranslatorInterface::translate()` throws an `CodeKandis\ConstantsClassesTranslator\ConstantsClassValueNotFoundExceptionInterface` if an input value does not exist.
	 * @param ConstantsClassesTranslatorInterface $constantsClassesTranslator The constants classes translator to test.
	 * @param null|bool|int|float|string|array $unknownInputValue The unknown input value to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorsWithUnknownInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodInterpretThrowsConstantsClassValueNotFoundExceptionInterfaceOnNonExistingInputValue( ConstantsClassesTranslatorInterface $constantsClassesTranslator, null|bool|int|float|string|array $unknownInputValue, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$constantsClassesTranslator->translate( $unknownInputValue );
		}
		catch ( Throwable $throwable )
		{
			static::assertInstanceOf( ConstantsClassValueNotFoundExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame(
				$expectedThrowableMessage,
				$throwable->getMessage()
			);
		}
	}

	/**
	 * Tests if the method `ConstantsClassesTranslatorInterface::translate()` throws an `CodeKandis\ConstantsClassesTranslator\CorrespondingConstantsClassValueNotFoundExceptionInterface` if an input value has no corresponding output value.
	 * @param ConstantsClassesTranslatorInterface $constantsClassesTranslator The constants classes translator to test.
	 * @param null|bool|int|float|string|array $nonCorrespondingValidInputValue The non-corresponding valid input value to pass.
	 * @param string $expectedThrowableClassName The class name of the expected throwable.
	 * @param string $expectedThrowableMessage The message of the expected throwable.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorsWithNonCorrespondingValidInputValueExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodInterpretThrowsCorrespondingConstantsClassValueNotFoundExceptionInterfaceNonCorrespondingOutputValue( ConstantsClassesTranslatorInterface $constantsClassesTranslator, null|bool|int|float|string|array $nonCorrespondingValidInputValue, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$constantsClassesTranslator->translate( $nonCorrespondingValidInputValue );
		}
		catch ( Throwable $throwable )
		{
			static::assertInstanceOf( CorrespondingConstantsClassValueNotFoundExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame(
				$expectedThrowableMessage,
				$throwable->getMessage()
			);
		}
	}

	/**
	 * Tests if the method `ConstantsClassesTranslatorInterface::translate()` translates correctly.
	 * @param ConstantsClassesTranslatorInterface $constantsClassesTranslator The constants classes translator to test.
	 * @param null|bool|int|float|string|array $validInputValue The valid input value to translate to pass.
	 * @param null|bool|int|float|string|array $expectedTranslatedOutputValue The expected translated output value.
	 */
	#[DataProviderExternal( ConstantsClassesTranslatorsWithValidInputValueAndExpectedTranslatedOutputValueDataProvider::class, 'provideData' )]
	public function testIfMethodInterpretReturnsMessagesCorrectly( ConstantsClassesTranslatorInterface $constantsClassesTranslator, null|bool|int|float|string|array $validInputValue, null|bool|int|float|string|array $expectedTranslatedOutputValue ): void
	{
		$resultedTranslatedOutputValue = $constantsClassesTranslator->translate( $validInputValue );

		static::assertSame( $expectedTranslatedOutputValue, $resultedTranslatedOutputValue );
	}
}
