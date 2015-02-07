<?php
namespace Lodestone;


class UtilsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $this->tester = new Utils();
    }

    protected function _after()
    {
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_0バイト文字列の場合_trueが返る()
    {
        $input = '';
        $this->assertTrue(Utils::isBlank($input), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_全角スペースの場合_trueが返る()
    {
        $input = '　';
        $this->assertTrue(Utils::isBlank($input), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_greedy指定なしで全角スペースの場合_falseが返る()
    {
        $input = '　';
        $this->assertFalse(Utils::isBlank($input, false), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_空の配列の場合_trueが返る()
    {
        $input = array();
        $this->assertTrue(Utils::isBlank($input), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_ネストした配列の場合_trueが返る()
    {
        $input = array(array(array()));
        $this->assertTrue(Utils::isBlank($input), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_greedy指定なしでネストした配列の場合_falseが返る()
    {
        $input = array(array(array()));
        $this->assertFalse(Utils::isBlank($input, false), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_空でない配列の場合_falseが返る()
    {
        $input = array(array(array('1')));
        $this->assertFalse(Utils::isBlank($input), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_greedy指定なしで空でない配列の場合_falseが返る()
    {
        $input = array(array(array('1')));
        $this->assertFalse(Utils::isBlank($input, false), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_全角スペースと空白の組み合わせの場合_trueが返る()
    {
        $input = "　\n　";
        $this->assertTrue(Utils::isBlank($input), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_greedy指定なしで全角スペースと空白の組み合わせの場合_falseが返る()
    {
        $input = "　\n　";
        $this->assertFalse(Utils::isBlank($input, false), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_全角スペースと非空白の組み合わせの場合_falseが返る()
    {
        $input = '　A　';
        $this->assertFalse(Utils::isBlank($input), $input);
    }

    /**
     * @cover Lodestone\Utils::isBlank
     */
    public function testUtilsIsBlank_greedy指定なしで全角スペースと非空白の組み合わせの場合_falseが返る()
    {
        $input = '　A　';
        $this->assertFalse(Utils::isBlank($input, false), $input);
    }

    /**
     * @cover Lodestone\Utils::getParamName
     */
    public function testUtilsGetParamName_CamelCaseの場合_camel_caseが返る()
    {
        $this->assertEquals(
            'camel_case',
            Utils::getParamName('CamelCase')
        );
    }

    /**
     * @cover Lodestone\Utils::getParamName
     */
    public function testUtilsGetParamName_クラス名ErrorExceptionの場合_error_exceptionが返る()
    {
        $this->assertEquals(
            'error_exception',
            Utils::getParamName(new ErrorException('te'))
        );
    }

    /**
     * @cover Lodestone\Utils::toSnakeCase
     */
    public function testUtilsToSnakeCase_CamelCaseの場合_camel_caseが返る()
    {
        $this->assertEquals(
            'camel_case',
            Utils::toSnakeCase('CamelCase')
        );
    }

}