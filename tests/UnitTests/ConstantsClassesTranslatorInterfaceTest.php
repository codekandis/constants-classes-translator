<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslatorInterface;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest\ConstantsClassesTranslatorsWithUnknownInputValuesAndExpectedExceptionsDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorInterfaceTest\ConstantsClassesTranslatorsWithValidInputValuesAndExpectedOutputValuesDataProvider;
use Iterator;
use PHPUnit\Framework\TestCase;

/**
 * Represents the test case to test objects against the `ConstantsClassesTranslatorInterface`.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorInterfaceTest extends TestCase
{
	/**
	 * instantiated constants classes translators with valid input values and expected output values.
	 * @return Iterator The instantiated constants classes translators with valid input values and expected output values.
	 */
	public function constantsClassesTranslatorsWithValidInputValuesAndExpectedOutputValuesDataProvider(): Iterator
	{
		return new ConstantsClassesTranslatorsWithValidInputValuesAndExpectedOutputValuesDataProvider();
	}

	/**
	 * Tests if `ConstantsClassesTranslatorInterface::translate()` translates correctly.
	 * @param ConstantsClassesTranslatorInterface $constantsClassesTranslator The constants classes translator to test.
	 * @param mixed $inputValue The input value to translate.
	 * @param mixed $expectedOutputValue The expected translated output value.
	 * @dataProvider constantsClassesTranslatorsWithValidInputValuesAndExpectedOutputValuesDataProvider
	 */
	public function testsIfMethodInterpretReturnsMessagesCorrectly( ConstantsClassesTranslatorInterface $constantsClassesTranslator, $inputValue, $expectedOutputValue ): void
	{
		$resultedMessage = $constantsClassesTranslator->translate( $inputValue );

		static::assertSame( $expectedOutputValue, $resultedMessage );
	}

	/**
	 * Provides instantiated constants classes translators with unknown input values, expected exception class names, expected exception codes and expected exception messages.
	 * @return Iterator The instantiated constants classes translators with unknown input values, expected exception class names, expected exception codes and expected exception messages.
	 */
	public function constantsClassesTranslatorsWithUnknownInputValuesAndExpectedExceptionsDataProvider(): Iterator
	{
		return new ConstantsClassesTranslatorsWithUnknownInputValuesAndExpectedExceptionsDataProvider();
	}

	/**
	 * Tests if `ConstantsClassesTranslatorInterface::translate()` throws an exception if an error occurred during translation.
	 * @param ConstantsClassesTranslatorInterface $constantsClassesTranslator The constants classes translator to test.
	 * @param mixed $inputValue The input value to translate.
	 * @param string $expectedExceptionClassName The class name of the expected exception.
	 * @param int $expectedExceptionCode The code of the expected exception.
	 * @param string $expectedExceptionMessage The message of the expected exception.
	 * @dataProvider constantsClassesTranslatorsWithUnknownInputValuesAndExpectedExceptionsDataProvider
	 */
	public function testsIfMethodInterpretThrowsExceptionOnUnknownCode( ConstantsClassesTranslatorInterface $constantsClassesTranslator, $inputValue, string $expectedExceptionClassName, int $expectedExceptionCode, string $expectedExceptionMessage ): void
	{
		$this->expectException( $expectedExceptionClassName );
		$this->expectExceptionCode( $expectedExceptionCode );
		$this->expectExceptionMessage( $expectedExceptionMessage );

		$constantsClassesTranslator->translate( $inputValue );
	}
}
