<?php declare( strict_types = 1 );
namespace CodeKandis\ConstantsClassesTranslator;

use CodeKandis\ToolKit\Validators\IsInterfaceOrClassNameValidator;
use CodeKandis\Types\BaseObject;
use CodeKandis\Types\InterfaceOrClassConstantNotFoundException;
use CodeKandis\Types\InterfaceOrClassConstantValueNotFoundException;
use CodeKandis\Types\InterfaceOrClassNotFoundException;
use CodeKandis\Types\InterfaceOrClassNotFoundExceptionInterface;
use CodeKandis\Types\InvalidTypeException;
use Override;
use ReflectionClass;
use function is_array;
use function is_scalar;

/**
 * Represents a constant interfaces and classes translator.
 * @package codekandis/constants-classes-translator
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConstantsClassesTranslator extends BaseObject implements ConstantsClassesTranslatorInterface
{
	/**
	 * Stores the reflected input constants interface or class.
	 */
	private readonly ReflectionClass $reflectedInputConstantsInterfaceOrClass;

	/**
	 * Stores the reflected output constants interface or class.
	 */
	private readonly ReflectionClass $reflectedOutputConstantsInterfaceOrClass;

	/**
	 * Constructor method.
	 * @param string $inputConstantsInterfaceOrClassName The input constants interface or class name.
	 * @param string $outputConstantsInterfaceOrClassName The output constants interface or class name.
	 * @throws InterfaceOrClassNotFoundExceptionInterface The input constants interface or class does not exist.
	 * @throws InterfaceOrClassNotFoundExceptionInterface The output constants interface or class does not exist.
	 */
	public function __construct(
		private readonly string $inputConstantsInterfaceOrClassName,
		private readonly string $outputConstantsInterfaceOrClassName
	)
	{
		if (
			false === new IsInterfaceOrClassNameValidator()->validate( $this->inputConstantsInterfaceOrClassName )
		)
		{
			throw InterfaceOrClassNotFoundException::withNonExistentInterfaceOrClassName( $this->inputConstantsInterfaceOrClassName );
		}

		if (
			false === new IsInterfaceOrClassNameValidator()->validate( $this->outputConstantsInterfaceOrClassName )
		)
		{
			throw InterfaceOrClassNotFoundException::withNonExistentInterfaceOrClassName( $this->outputConstantsInterfaceOrClassName );
		}

		/** @noinspection PhpUnhandledExceptionInspection */
		$this->reflectedInputConstantsInterfaceOrClass = new ReflectionClass( $this->inputConstantsInterfaceOrClassName );
		/** @noinspection PhpUnhandledExceptionInspection */
		$this->reflectedOutputConstantsInterfaceOrClass = new ReflectionClass( $this->outputConstantsInterfaceOrClassName );
	}

	/**
	 * Determines if a specific value is `null`, a scalar or a (nested) array of scalars.
	 * @param mixed $value The value to check.
	 * @return bool `true` if the value is `null`, a scalar or a (nested) array of scalars, otherwise `false`.
	 */
	private function isValueTypeValid( mixed $value ): bool
	{
		if ( null === $value || true === is_scalar( $value ) )
		{
			return true;
		}

		if ( false === is_array( $value ) )
		{
			return false;
		}

		foreach ( $value as $element )
		{
			if ( false === $this->isValueTypeValid( $element ) )
			{
				return false;
			}
		}

		return true;
	}

	/**
	 * @inheritdoc
	 */
	#[Override]
	public function translate( null | bool | int | float | string | array $value ): null | bool | int | float | string | array
	{
		if ( false === $this->isValueTypeValid( $value ) )
		{
			throw InvalidTypeException::withInvalidTypeAndExpectedTypes( 'array<mixed>', 'null', 'scalar', 'nested-array<null|scalar>' );
		}

		$inputInterfaceOrClassConstantName = null;

		$reflectedInputInterfaceOrClassConstants = $this->reflectedInputConstantsInterfaceOrClass->getConstants();
		foreach ( $reflectedInputInterfaceOrClassConstants as $fetchedReflectedInputClassConstantName => $fetchedReflectedInputInterfaceOrClassConstantValue )
		{
			if ( $fetchedReflectedInputInterfaceOrClassConstantValue === $value )
			{
				$inputInterfaceOrClassConstantName = $fetchedReflectedInputClassConstantName;

				break;
			}
		}

		if ( null === $inputInterfaceOrClassConstantName )
		{
			throw InterfaceOrClassConstantValueNotFoundException::withInterfaceOrClassNameAndNonExistentConstantValue( $this->inputConstantsInterfaceOrClassName, $value );
		}

		if (
			false === $this->reflectedOutputConstantsInterfaceOrClass->hasConstant( $inputInterfaceOrClassConstantName )
		)
		{
			throw InterfaceOrClassConstantNotFoundException::withInterfaceOrClassNameAndNonExistentConstantName( $this->outputConstantsInterfaceOrClassName, $inputInterfaceOrClassConstantName );
		}

		return $this->reflectedOutputConstantsInterfaceOrClass->getConstant( $inputInterfaceOrClassConstantName );
	}
}
