<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use CodeKandis\Types\ConstantNotFoundException;
use function sprintf;

/**
 * Represents an exception if an input constants class value has no corresponding output constants class value.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class CorrespondingConstantsClassValueNotFoundException extends ConstantNotFoundException implements CorrespondingConstantsClassValueNotFoundExceptionInterface
{
	/**
	 * Represents the exception message if a corresponding constants class value does not exist.
	 * @var string
	 */
	public const string EXCEPTION_MESSAGE_CORRESPONDING_CONSTANTS_CLASS_VALUE_NOT_FOUND = 'The input constants class value `%s::%s` has no corresponding output constants class value in constants class `%s`.';

	/**
	 * Static constructor method.
	 * @param string $inputClassName The class name of the input constants class.
	 * @param string $inputConstantName The name of the input constant.
	 * @param string $outputClassName The class name of the output constants class.
	 * @return static
	 */
	public static function with_inputClassNameInputConstantNameAndOutputClassName( string $inputClassName, string $inputConstantName, string $outputClassName ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_CORRESPONDING_CONSTANTS_CLASS_VALUE_NOT_FOUND, $inputClassName, $inputConstantName, $outputClassName )
		);
	}
}
