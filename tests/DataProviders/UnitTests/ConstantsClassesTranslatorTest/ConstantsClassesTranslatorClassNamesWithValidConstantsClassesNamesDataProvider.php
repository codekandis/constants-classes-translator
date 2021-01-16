<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator\Tests\DataProviders\UnitTests\ConstantsClassesTranslatorTest;

use ArrayIterator;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\CodesFixture;
use CodeKandis\ConstantsClassesTranslator\Tests\Fixtures\MessagesFixture;

/**
 * Represents a data provider providing constants classes translator class names with valid input and output constants classes class names and expected constants classes translator class names.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslatorClassNamesWithValidConstantsClassesNamesDataProvider extends ArrayIterator
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		parent::__construct(
			[
				0 => [
					'constantsClassesTranslatorClassName'         => ConstantsClassesTranslator::class,
					'inputConstantsClassClassName'                => CodesFixture::class,
					'outputConstantsClassClassName'               => MessagesFixture::class,
					'expectedConstantsClassesTranslatorClassName' => ConstantsClassesTranslator::class
				],
				1 => [
					'constantsClassesTranslatorClassName'         => ConstantsClassesTranslator::class,
					'inputConstantsClassClassName'                => MessagesFixture::class,
					'outputConstantsClassClassName'               => CodesFixture::class,
					'expectedConstantsClassesTranslatorClassName' => ConstantsClassesTranslator::class
				]
			]
		);
	}
}
