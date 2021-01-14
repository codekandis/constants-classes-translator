<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\UnitTests;

use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest\ConstantsClassesTranslatorClassNamesWithInvalidValuesAndExpectedExceptionsDataProvider;
use CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest\ConstantsClassesTranslatorClassNamesWithValidConstantsClassesNamesDataProvider;
use Iterator;
use PHPUnit\Framework\TestCase;

/**
 * Represents the test case to test objects against the `ConstantsClassesTranslator`.
 * @package codekandis/codes-message-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorTest extends TestCase
{
	/**
	 * Provides constants classes translator class names with valid input and output constants classes class names and expected constants classes translator class names.
	 * @return Iterator The constants classes translator class names with valid input and output constants classes class names and expected constants classes translator class names.
	 */
	public function ConstantsClassesTranslatorClassNamesWithValidCodesAndMessagesDataProvider(): Iterator
	{
		return new ConstantsClassesTranslatorClassNamesWithValidConstantsClassesNamesDataProvider();
	}

	/**
	 * Tests if the instantiation of the constants classes translator passes.
	 * @param string $constantsClassesTranslatorClassName The class name of the constants classes translator to instantiate.
	 * @param string $inputConstantsClassClassName The class name of the input constants class.
	 * @param string $outputConstantsClassClassName The class name of the output constants class.
	 * @param string $expectedConstantsClassesTranslatorClassName The expected class name the constants classes translator is an instance of.
	 * @dataProvider ConstantsClassesTranslatorClassNamesWithValidCodesAndMessagesDataProvider
	 */
	public function testIfInstantiationReturnsCorrectly( string $constantsClassesTranslatorClassName, string $inputConstantsClassClassName, string $outputConstantsClassClassName, string $expectedConstantsClassesTranslatorClassName ): void
	{
		$codeMessageTranslator = new $constantsClassesTranslatorClassName( $inputConstantsClassClassName, $outputConstantsClassClassName );

		static::assertInstanceOf( $expectedConstantsClassesTranslatorClassName, $codeMessageTranslator );
	}

	/**
	 * Provides constants classes translator class names with invalid input and output values, epxected exception class names, expected exception codes and expected exception messages.
	 * @return Iterator The constants classes translator class names with invalid input and output values, epxected exception class names, expected exception codes and expected exception messages.
	 */
	public function codeMessageTranslatorClassNamesWithInvalidCodesAndMessagesDataProvider(): Iterator
	{
		return new ConstantsClassesTranslatorClassNamesWithInvalidValuesAndExpectedExceptionsDataProvider();
	}

	/**
	 * Tests if the instantiation of the code message translator throws exceptions on invalid constants classes class names.
	 * @param string $constantsClassesTranslatorClassName The class name of the constants classes translator to instantiate.
	 * @param string $inputConstantsClassClassName The class name of the input constants class.
	 * @param string $outputConstantsClassClassName The class name of the output constants class.
	 * @param string $expectedExceptionClassName The class name of the expected exception.
	 * @param int $expectedExceptionCode The code of the expected exception.
	 * @param string $expectedExceptionMessage The message of the expected exception.
	 * @dataProvider codeMessageTranslatorClassNamesWithInvalidCodesAndMessagesDataProvider
	 */
	public function testIfInstantiationThrowsExceptionsOnInvalidCodesOrMessagesClassName( string $constantsClassesTranslatorClassName, string $inputConstantsClassClassName, string $outputConstantsClassClassName, string $expectedExceptionClassName, int $expectedExceptionCode, string $expectedExceptionMessage ): void
	{
		$this->expectException( $expectedExceptionClassName );
		$this->expectExceptionCode( $expectedExceptionCode );
		$this->expectExceptionMessage( $expectedExceptionMessage );

		new $constantsClassesTranslatorClassName( $inputConstantsClassClassName, $outputConstantsClassClassName );
	}
}
