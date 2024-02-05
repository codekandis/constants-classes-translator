<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

/**
 * Represents the interface of any exception if a constants class value has no corresponding constants class value.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
interface CorrespondingConstantsClassValueNotFoundExceptionInterface extends ConstantsClassesTranslatorExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param string $inputConstantsClassClassName The class name of the input constants class.
	 * @param string $inputConstantName The name of the input constant.
	 * @param string $outputConstantsClassClassName The class name of the output constants class.
	 * @return static
	 */
	public static function with_inputConstantsClassClassNameInputConstantNameAndOutputConstantsClassClassName( string $inputConstantsClassClassName, string $inputConstantName, string $outputConstantsClassClassName ): static;
}
