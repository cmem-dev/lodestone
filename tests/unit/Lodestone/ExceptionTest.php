<?php
namespace Lodestone;

use Codeception\TestCase\Test;
use Lodestone\Exception;
use Lodestone\Exception\BadFunctionCallException;
use Lodestone\Exception\BadMethodCallException;
use Lodestone\Exception\DomainException;
use Lodestone\Exception\InvalidArgumentException;
use Lodestone\Exception\InvalidCallException;
use Lodestone\Exception\InvalidConfigException;
use Lodestone\Exception\InvalidParamException;
use Lodestone\Exception\JSONParseException;
use Lodestone\Exception\LengthException;
use Lodestone\Exception\LogicException;
use Lodestone\Exception\NotSupportedException;
use Lodestone\Exception\OutOfBoundsException;
use Lodestone\Exception\OutOfRangeException;
use Lodestone\Exception\OverflowException;
use Lodestone\Exception\RangeException;
use Lodestone\Exception\RuntimeException;
use Lodestone\Exception\UnderflowException;
use Lodestone\Exception\UnexpectedValueException;
use Lodestone\Exception\UnknownMethodException;
use Lodestone\Exception\UnknownPropertyException;

class ExceptionTest extends Test
{

    /**
     * @var \UnitTester
     */
    protected $tester;
    /**
     * @var array
     */
    protected $_arrName = [
        TestException::THROW_BAD_FUNCTION_CALL => 'Lodestone\Exception\BadFunctionCallException',
        TestException::THROW_BAD_METHOD_CALL => 'Lodestone\Exception\BadMethodCallException',
        TestException::THROW_DOMAIN => 'Lodestone\Exception\DomainException',
        TestException::THROW_INVALID_ARGUMENT => 'Lodestone\Exception\InvalidArgumentException',
        TestException::THROW_INVALID_CALL => 'Lodestone\Exception\InvalidCallException',
        TestException::THROW_INVALID_CONFIG => 'Lodestone\Exception\InvalidConfigException',
        TestException::THROW_INVALID_PARAM => 'Lodestone\Exception\InvalidParamException',
        TestException::THROW_LENGTH => 'Lodestone\Exception\LengthException',
        TestException::THROW_LOGIC => 'Lodestone\Exception\LogicException',
        TestException::THROW_NOT_SUPPORTED => 'Lodestone\Exception\NotSupportedException',
        TestException::THROW_OUT_OF_BOUNDS => 'Lodestone\Exception\OutOfBoundsException',
        TestException::THROW_OUT_OF_RANGE => 'Lodestone\Exception\OutOfRangeException',
        TestException::THROW_OVERFLOW => 'Lodestone\Exception\OverflowException',
        TestException::THROW_RANGE => 'Lodestone\Exception\RangeException',
        TestException::THROW_RUNTIME => 'Lodestone\Exception\RuntimeException',
        TestException::THROW_UNDERFLOW => 'Lodestone\Exception\UnderflowException',
        TestException::THROW_UNEXPECTED_VALUE => 'Lodestone\Exception\UnexpectedValueException',
        TestException::THROW_UNKNOWN_METHOD => 'Lodestone\Exception\UnknownMethodException',
        TestException::THROW_UNKNOWN_PROPERTY => 'Lodestone\Exception\UnknownPropertyException',
        TestException::THROW_JSON_PARSE_EXCEPTION => 'Lodestone\Exception\JSONParseException',
        TestException::THROW_ERROR_EXCEPTION => 'Lodestone\ErrorException',
        TestException::THROW_EXCEPTION => 'Lodestone\Exception',
        TestException::THROW_DEFAULT => '\Exception',
    ];

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @expectedException \Lodestone\Exception\BadFunctionCallException
     */
    public function testThrow_例外スロー_BadFunctionCallExceptionが返る()
    {
        $o = new TestException(TestException::THROW_BAD_FUNCTION_CALL);
        unset($o);
    }

    /**
     * @expectedException \Lodestone\Exception\BadFunctionCallException
     * @expectedExceptionMessage 1 is an invalid parameter
     */
    public function testThrow_例外スロー_BadFunctionCallExceptionに渡したメッセージが返る()
    {
        $o = new TestException(TestException::THROW_BAD_FUNCTION_CALL);
        unset($o);
    }

    /**
     * @expectedException \Lodestone\Exception\BadFunctionCallException
     * @expectedExceptionMessage 1 is an invalid parameter
     * @expectedExceptionCode 1
     */
    public function testThrow_例外スロー_BadFunctionCallExceptionに設定したコードが返る()
    {
        $o = new TestException(TestException::THROW_BAD_FUNCTION_CALL);
        unset($o);
    }

    /**
     * @cover BadMethodCallException
     */
    public function testException_例外名_getNameの戻り値に設定した文字列が返る()
    {
        $e = new BadMethodCallException('BadMethodCallException');
        $this->assertEquals(
            "Bad Method Call Exception.",
            $e->getName()
        );
    }


    /**
     * getName()戻り値テスト
     */
    public function testThrow_BadFunctionCallException_getNameに設定したメッセージが返る()
    {
        try {
            $o = new TestException(TestException::THROW_BAD_FUNCTION_CALL);
        } Catch (BadFunctionCallException $e) {
            $this->assertEquals(
                "Bad Function Call Exception.",
                $e->getName()
            );
        }
        unset($o);
    }

    public function testException_lException_例外名が返る()
    {
        $e = new Exception('test');

        $this->assertEquals(
            "Exception.",
            $e->getName()
        );
    }

    public function testException_BadMethodCallException_例外名が返る()
    {
        $e = new BadMethodCallException('test');

        $this->assertEquals(
            "Bad Method Call Exception.",
            $e->getName()
        );
    }

    public function testException_DomainException_例外名が返る()
    {
        $e = new DomainException('test');

        $this->assertEquals(
            "Domain Exception.",
            $e->getName()
        );
    }

    public function testException_ArgumentException_例外名が返る()
    {
        $e = new InvalidArgumentException('test');

        $this->assertEquals(
            "Invalid Argument Exception.",
            $e->getName()
        );
    }

    public function testException_InvalidCallException_例外名が返る()
    {
        $e = new InvalidCallException('test');

        $this->assertEquals(
            "Invalid Call Exception.",
            $e->getName()
        );
    }

    public function testException_InvalidConfigException_例外名が返る()
    {
        $e = new InvalidConfigException('test');

        $this->assertEquals(
            "Invalid Config Exception.",
            $e->getName()
        );
    }

    public function testException_InvalidParamException_例外名が返る()
    {
        $e = new InvalidParamException('test');

        $this->assertEquals(
            "Invalid Param Exception.",
            $e->getName()
        );
    }

    public function testException_JSONParseException_例外名が返る()
    {
        $e = new JSONParseException('test');

        $this->assertEquals(
            "JSON Parse Exception.",
            $e->getName()
        );
    }

    public function testException_LengthException_例外名が返る()
    {
        $e = new LengthException('test');

        $this->assertEquals(
            "Length Exception.",
            $e->getName()
        );
    }

    public function testException_LogicException_例外名が返る()
    {
        $e = new LogicException('test');

        $this->assertEquals(
            "Logic Exception.",
            $e->getName()
        );
    }

    public function testException_NotSupportedException_例外名が返る()
    {
        $e = new NotSupportedException('test');

        $this->assertEquals(
            "Not Supported Exception.",
            $e->getName()
        );
    }

    public function testException_OutOfBoundsException_例外名が返る()
    {
        $e = new OutOfBoundsException('test');

        $this->assertEquals(
            "Out Of Bounds Exception.",
            $e->getName()
        );
    }

    public function testException_OutOfRangeException_例外名が返る()
    {
        $e = new OutOfRangeException('test');

        $this->assertEquals(
            "Out Of Range Exception.",
            $e->getName()
        );
    }

    public function testException_OverflowException_例外名が返る()
    {
        $e = new OverflowException('test');

        $this->assertEquals(
            "Overflow Exception.",
            $e->getName()
        );
    }

    public function testException_RangeException_例外名が返る()
    {
        $e = new RangeException('test');

        $this->assertEquals(
            "Range Exception.",
            $e->getName()
        );
    }

    public function testException_RuntimeException_例外名が返る()
    {
        $e = new RuntimeException('test');

        $this->assertEquals(
            "Runtime Exception.",
            $e->getName()
        );
    }

    public function testException_UnderflowException_例外名が返る()
    {
        $e = new UnderflowException('test');

        $this->assertEquals(
            "Underflow Exception.",
            $e->getName()
        );
    }

    public function testException_UnexpectedValueException_例外名が返る()
    {
        $e = new UnexpectedValueException('test');

        $this->assertEquals(
            "Unexpected Value Exception.",
            $e->getName()
        );
    }

    public function testException_UnknownMethodException_例外名が返る()
    {
        $e = new UnknownMethodException('test');

        $this->assertEquals(
            "Unknown Method Exception.",
            $e->getName()
        );
    }

    public function testException_UnknownPropertyException_例外名が返る()
    {
        $e = new UnknownPropertyException('test');

        $this->assertEquals(
            "Unknown Property Exception.",
            $e->getName()
        );
    }
    public function testException_ErrorException_例外名が返る()
    {
        $e = new ErrorException('test');

        $this->assertEquals(
            "Error Exception.",
            $e->getName()
        );
    }

    /**
     * まとめてテスト
     */
    public function testException_例外生成_期待通りの例外が返る()
    {
        foreach ($this->_arrName as $key => $value) {
            $this->setExpectedException(
                $value,
                "{$key} is an invalid parameter",
                $key
            );
            $o = new TestException($key);
            unset($o);
        }
    }

    /**
     * まとめてテスト
     */
    public function testException_例外生成_getName期待通りの文字列が返る()
    {
        foreach ($this->_arrName as $key => $value) {
            $o = new $value("{$key} is an invalid parameter");
            $this->assertEquals(
                "{$key} is an invalid parameter",
                $o->getMessage()
            );
        }
    }

    /**
     * まとめてテスト
     */
    public function testException_例外生成_期待通りの文字列が返る()
    {
        foreach ($this->_arrName as $key => $value) {
            $o = new $value("{$key} is an invalid parameter");
            echo $o;
            $actual = ob_get_contents();
            $this->assertEquals(
                1,
                preg_match("/{$key} is an invalid parameter/", $actual)
            );
        }
    }

    /**
     * __toString()戻り値テスト
     */
    public function testException_toString_クラスにセットしたメッセージが返る()
    {
        try {
            $o = new TestException(TestException::THROW_EXCEPTION);
        } Catch (Exception $e) {
            ob_start();
            echo $e;
            $actual = ob_get_clean();
        }
        unset($o);
        $this->assertEquals(
            1,
            preg_match('/Additional Information:/', $actual)
        );
    }
}

class TestException
{
    public $var;

    const THROW_NONE = 0;
    const THROW_BAD_FUNCTION_CALL = 1;
    const THROW_BAD_METHOD_CALL = 2;
    const THROW_DOMAIN = 3;
    const THROW_INVALID_ARGUMENT = 4;
    const THROW_INVALID_CALL = 5;
    const THROW_INVALID_CONFIG = 6;
    const THROW_INVALID_PARAM = 7;
    const THROW_LENGTH = 8;
    const THROW_LOGIC = 9;
    const THROW_NOT_SUPPORTED = 10;
    const THROW_OUT_OF_BOUNDS = 11;
    const THROW_OUT_OF_RANGE = 12;
    const THROW_OVERFLOW = 13;
    const THROW_RANGE = 14;
    const THROW_RUNTIME = 15;
    const THROW_UNDERFLOW = 16;
    const THROW_UNEXPECTED_VALUE = 17;
    const THROW_UNKNOWN_METHOD = 18;
    const THROW_UNKNOWN_PROPERTY = 19;
    const THROW_EXCEPTION = 20;
    const THROW_JSON_PARSE_EXCEPTION = 21;
    const THROW_ERROR_EXCEPTION = 21;
    const THROW_DEFAULT = 99;

    function __construct($value = self::THROW_NONE)
    {

        switch ($value) {
            case self::THROW_BAD_FUNCTION_CALL:
                throw new BadFunctionCallException('1 is an invalid parameter', ['custom'], 1);
                break;

            case self::THROW_BAD_METHOD_CALL:
                throw new DomainException('2 is an invalid parameter', ['custom'], 2);
                break;

            case self::THROW_DOMAIN:
                throw new BadMethodCallException('3 is an invalid parameter', ['custom'], 3);
                break;

            case self::THROW_INVALID_ARGUMENT:
                throw new InvalidArgumentException('4 is an invalid parameter', ['custom'], 4);
                break;

            case self::THROW_INVALID_CALL:
                throw new InvalidCallException('5 is an invalid parameter', ['custom'], 5);
                break;

            case self::THROW_INVALID_CONFIG:
                throw new InvalidConfigException('6 is an invalid parameter', ['custom'], 6);
                break;

            case self::THROW_INVALID_PARAM:
                throw new InvalidParamException('7 is an invalid parameter', ['custom'], 7);
                break;

            case self::THROW_LENGTH:
                throw new LengthException('8 is an invalid parameter', ['custom'], 8);
                break;

            case self::THROW_LOGIC:
                throw new LogicException('9 is an invalid parameter', ['custom'], 9);
                break;

            case self::THROW_NOT_SUPPORTED:
                throw new NotSupportedException('10 is an invalid parameter', ['custom'], 10);
                break;

            case self::THROW_OUT_OF_BOUNDS:
                throw new OutOfBoundsException('11 is an invalid parameter', ['custom'], 11);
                break;

            case self::THROW_OUT_OF_RANGE:
                throw new OutOfRangeException('12 is an invalid parameter', ['custom'], 12);
                break;

            case self::THROW_OVERFLOW:
                throw new OverflowException('13 is an invalid parameter', ['custom'], 13);
                break;

            case self::THROW_RANGE:
                throw new RangeException('14 is an invalid parameter', ['custom'], 14);
                break;

            case self::THROW_RUNTIME:
                throw new RuntimeException('15 is an invalid parameter', ['custom'], 15);
                break;

            case self::THROW_UNDERFLOW:
                throw new UnderflowException('16 is an invalid parameter', ['custom'], 16);
                break;

            case self::THROW_UNEXPECTED_VALUE:
                throw new UnexpectedValueException('17 is an invalid parameter', ['custom'], 17);
                break;

            case self::THROW_UNKNOWN_METHOD:
                throw new UnknownMethodException('18 is an invalid parameter', ['custom'], 18);
                break;

            case self::THROW_UNKNOWN_PROPERTY:
                throw new UnknownPropertyException('19 is an invalid parameter', ['custom'], 19);
                break;

            case self::THROW_EXCEPTION:
                throw new Exception('20 is an invalid parameter', ['custom'], 20);
                break;

            case self::THROW_JSON_PARSE_EXCEPTION:
                throw new JSONParseException('21 is an invalid parameter', ['custom'], 21);
                break;

            case self::THROW_ERROR_EXCEPTION:
                throw new ErrorException('22 is not allowed as a parameter', 22);
                break;

            case self::THROW_DEFAULT:
                throw new \Exception('99 is not allowed as a parameter', 99);
                break;

            default:
                $this->var = $value;
                break;
        }
    }
}