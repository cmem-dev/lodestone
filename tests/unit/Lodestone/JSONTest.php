<?php
namespace Lodestone;


use Lodestone\Exception\JSONParseException;

class JSONTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testJSON_JSONParseException_JSON例外が返る()
    {
        try {
            $json = JSON::parse('{not formatted JSON}');
        } Catch (JSONParseException $e) {
            $this->assertEquals(
                "JSON Parse Exception.",
                $e->getName()
            );
        }
        unset($json);
    }

    public function testJSON_JSONデコード_配列が返る()
    {
        $json = JSON::parse('{"formatted JSON" : 1}');
        $this->assertEquals(
            ["formatted JSON" => 1],
            $json
        );
    }

    public function testJSON_JSONエンコード_文字列が返る()
    {
        $json = JSON::stringify(["formatted JSON" => 1]);
        $this->assertEquals(
            '{"formatted JSON":1}',
            $json
        );
    }

    public function testJSON_JSONエンコード引数ありの場合_文字列が返る()
    {
        $json = JSON::stringify(["formatted JSON" => 1],5);
        $this->assertEquals(
            '{"formatted JSON":1}',
            $json
        );
    }}