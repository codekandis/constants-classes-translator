<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest;

use ArrayIterator;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassNotFoundException;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\MessagesFixture;

/**
 * Represents a data provider providing constants classes translator class names with invalid input and output values, epxected exception class names, expected exception codes and expected exception messages.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorClassNamesWithInvalidValuesAndExpectedExceptionsDataProvider extends ArrayIterator
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		parent::__construct(
			[
				0 => [
					'codeMessageTranslatorClassName' => ConstantsClassesTranslator::class,
					'inputConstantsClassClassName'   => 'foobar',
					'outputConstantsClassClassName'  => MessagesFixture::class,
					'expectedExceptionClassName'     => ConstantsClassNotFoundException::class,
					'expectedExceptionCode'          => 1,
					'expectedExceptionMessage'       => 'The constants class `foobar` does not exist.'
				],
				1 => [
					'codeMessageTranslatorClassName' => ConstantsClassesTranslator::class,
					'inputConstantsClassClassName'   => CodesFixture::class,
					'outputConstantsClassClassName'  => 'barfoo',
					'expectedExceptionClassName'     => ConstantsClassNotFoundException::class,
					'expectedExceptionCode'          => 2,
					'expectedExceptionMessage'       => 'The constants class `barfoo` does not exist.'
				],
				2 => [
					'codeMessageTranslatorClassName' => ConstantsClassesTranslator::class,
					'inputConstantsClassClassName'   => 'foobar',
					'outputConstantsClassClassName'  => 'barfoo',
					'expectedExceptionClassName'     => ConstantsClassNotFoundException::class,
					'expectedExceptionCode'          => 1,
					'expectedExceptionMessage'       => 'The constants class `foobar` does not exist.'
				]
			]
		);
	}
}
