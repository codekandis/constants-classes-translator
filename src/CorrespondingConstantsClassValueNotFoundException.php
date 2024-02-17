<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use Override;
use function sprintf;

/**
 * Represents an exception if an input constants class value has no corresponding output constants class value.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class CorrespondingConstantsClassValueNotFoundException extends ConstantsClassesTranslatorException implements CorrespondingConstantsClassValueNotFoundExceptionInterface
{
	/**
	 * Represents the exception message if a corresponding constants class value does not exist.
	 * @var string
	 */
	public const string EXCEPTION_MESSAGE_CORRESPONDING_CONSTANTS_CLASS_VALUE_NOT_FOUND = 'The input constants class value `%s::%s` has no corresponding output constants class value in constants class `%s`.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_inputConstantsClassClassNameInputConstantNameAndOutputConstantsClassClassName( string $inputConstantsClassClassName, string $inputConstantName, string $outputConstantsClassClassName ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_CORRESPONDING_CONSTANTS_CLASS_VALUE_NOT_FOUND, $inputConstantsClassClassName, $inputConstantName, $outputConstantsClassClassName )
		);
	}
}
