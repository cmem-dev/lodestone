<?php
namespace Lodestone\Api;


use Codeception\TestCase\Test;
use Lodestone\Cache;
use Lodestone\JSON;
use Lodestone\Utils;
use Symfony\Component\DomCrawler\Crawler;

class ApiAbstractTest extends Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $id;
    protected $url;
    protected $mappingFilePath;

    protected function _before()
    {
        $this->id = '4804370';
        $this->url = "http://jp.finalfantasyxiv.com/lodestone/character/";
        $vendorDir = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
        $this->mappingFilePath = $vendorDir . '/Lodestone/Mapping/Mock.json';

        $mapping = [
            "name" => [
                "selector" => "//*[@id='character']/div[1]/div/div/div/div/div/div/h2/a",
                "filter" => "filterXPath",
                "attr" => "",
                "subset" => "",
                "trim" => ""
            ],
            "race" => [
                "selector" => "#character > div.base_footer > div > div > div:nth-child(2) > div.clearfix > div.chara_profile_left > div.chara_profile_box > div > section > div",
                "filter" => "filter",
                "attr" => "",
                "subset" => "",
                "trim" => ""
            ],
            "mount" => [
                "selector" => '//*[@id="character"]/div[3]/div/div/div[5]/div[1]/div/div/div/a',
                "filter" => "filterXPath",
                "attr" => "title",
                "subset" => 1,
                "trim" => ""
            ],
            "level" => [
                "selector" => '//*[@id="character"]/div[3]/div/div/div[2]/div[3]/div[1]/div[2]/div[1]/ul/li',
                "filter" => "filterXPath",
                "attr" => "",
                "subset" => 1,
                "trim" => ""
            ],
            "text" => [
                "selector" => '//*[@id="character"]/div[3]/div/div/div[2]/div[1]/div/div/h3',
                "filter" => "filterXPath",
                "attr" => "",
                "trim" => ""
            ]
        ];//*[@id="character"]/div[3]/div/div/div[2]/div[1]/div/div/h3
        file_put_contents($this->mappingFilePath, JSON::stringify($mapping));
    }

    protected function _after()
    {
        unlink($this->mappingFilePath);
    }

    public function testApiCharacter_getMappingの引数が空の時_全mappingを取得する()
    {
        $mock = new ApiMock();
        $this->assertTrue(
            count($mock->getMapping()) > 1
        );
    }

    public function testApiAbstract_getMapping_マッピングを取得する()
    {
        $mock = new ApiMock();
        $this->assertArrayHasKey('selector', $mock->getMapping('name'));
        $this->assertArrayHasKey('filter', $mock->getMapping('name'));
        $this->assertArrayHasKey('attr', $mock->getMapping('name'));
        $this->assertArrayHasKey('subset', $mock->getMapping('name'));
        $this->assertArrayHasKey('trim', $mock->getMapping('name'));
    }

    public function testApiAbstract_getCrawler_Crawlerインスタンスを取得する()
    {
        $mock = new ApiMock();
        $this->assertTrue(
            $mock->getCrawler('GET', $this->url) instanceof Crawler
        );
    }

    public function testApiAbstract_scrapingのmappingが空の時_HTMLを取得する()
    {
        $mock = new ApiMock();
        $crawler = $mock->getCrawler('GET', $this->url . $this->id);

        $this->assertTrue(
            !Utils::isBlank($mock->scraping($crawler, []))
        );
    }

    public function testApiAbstract_scrapingのmappingがnameの時_filterXPathでnameの配列を取得する()
    {
        $mock = new ApiMock();
        $mapping = ['name' => $mock->getMapping('name')];
        $crawler = $mock->getCrawler('GET', $this->url . $this->id);
        $ret = $mock->scraping($crawler, $mapping);
        $this->assertEquals(
            ['name' => 'Kadhe Dd'],
            $ret
        );
    }

    public function testApiAbstract_scrapingのmappingがnameの時_filterでraceの配列を取得する()
    {
        $mock = new ApiMock();
        $mapping = ['race' => $mock->getMapping('race')];
        $crawler = $mock->getCrawler('GET', $this->url . $this->id);
        $ret = $mock->scraping($crawler, $mapping);
        $this->assertEquals(
            ['race' => 'ミコッテ / ムーンキーパー / ♀'],
            $ret
        );
    }

    public function testApiAbstract_キャッシュなしの時_通常で取得する()
    {
        Cache::clean('Lodestone\ApiAbstract');
        $mock = new ApiMock();
        $this->assertEquals(
            [
                'name' => 'Kadhe Dd',
                'race' => 'ミコッテ / ムーンキーパー / ♀',
                'level' => [
                    0 => '50',
                    1 => '28',
                    2 => '50',
                    3 => '43',
                    4 => '39',
                    5 => '50',
                ],
                'mount' => [
                    0 => 'マイチョコボ',
                    1 => 'でぶチョコボ',
                    2 => '魔導アーマー',
                    3 => 'C式魔導アーマー',
                    4 => 'クァール',
                    5 => 'アーリマン',
                    6 => 'ベヒーモス',
                    7 => 'ウォーライオン',
                    8 => 'ユニコーン',
                    9 => 'ナイトメア',
                    10 => 'アイトーン',
                    11 => 'クサントス',
                    12 => 'グルファクシ',
                    13 => 'エンバール',
                ],
                'text' => '自己紹介文',
            ],
            $mock->get($this->id)
        );
    }

    public function testApiAbstract_scrapingSのsubset有りの時_該当マッピングの配列を取得する()
    {
        $mock = new ApiMock();
        $mapping = ['mount' => $mock->getMapping('mount')];
        $crawler = $mock->getCrawler('GET', $this->url . $this->id);
        $this->assertEquals(
            [
                'mount' => [
                    0 => 'マイチョコボ',
                    1 => 'でぶチョコボ',
                    2 => '魔導アーマー',
                    3 => 'C式魔導アーマー',
                    4 => 'クァール',
                    5 => 'アーリマン',
                    6 => 'ベヒーモス',
                    7 => 'ウォーライオン',
                    8 => 'ユニコーン',
                    9 => 'ナイトメア',
                    10 => 'アイトーン',
                    11 => 'クサントス',
                    12 => 'グルファクシ',
                    13 => 'エンバール',
                ]
            ],
            $mock->scraping($crawler, $mapping)
        );
    }

    public function testApiAbstract_doScraping時_取得データの配列を取得する()
    {
        $mock = new ApiMock();
        $this->assertEquals(
            [
                'name' => 'Kadhe Dd',
                'race' => 'ミコッテ / ムーンキーパー / ♀',
                'level' => [
                    0 => '50',
                    1 => '28',
                    2 => '50',
                    3 => '43',
                    4 => '39',
                    5 => '50',
                ],
                'mount' => [
                    0 => 'マイチョコボ',
                    1 => 'でぶチョコボ',
                    2 => '魔導アーマー',
                    3 => 'C式魔導アーマー',
                    4 => 'クァール',
                    5 => 'アーリマン',
                    6 => 'ベヒーモス',
                    7 => 'ウォーライオン',
                    8 => 'ユニコーン',
                    9 => 'ナイトメア',
                    10 => 'アイトーン',
                    11 => 'クサントス',
                    12 => 'グルファクシ',
                    13 => 'エンバール',
                ],
                'text' => '自己紹介文',
            ],
            $mock->doScraping($this->id)
        );
    }

    public function testApiAbstract_get時_取得データの配列を取得する()
    {
        $mock = new ApiMock();
        $this->assertEquals(
            [
                'name' => 'Kadhe Dd',
                'race' => 'ミコッテ / ムーンキーパー / ♀',
                'level' => [
                    0 => '50',
                    1 => '28',
                    2 => '50',
                    3 => '43',
                    4 => '39',
                    5 => '50',
                ],
                'mount' => [
                    0 => 'マイチョコボ',
                    1 => 'でぶチョコボ',
                    2 => '魔導アーマー',
                    3 => 'C式魔導アーマー',
                    4 => 'クァール',
                    5 => 'アーリマン',
                    6 => 'ベヒーモス',
                    7 => 'ウォーライオン',
                    8 => 'ユニコーン',
                    9 => 'ナイトメア',
                    10 => 'アイトーン',
                    11 => 'クサントス',
                    12 => 'グルファクシ',
                    13 => 'エンバール',
                ],
                'text' => '自己紹介文',
            ],
            $mock->get($this->id)
        );
    }
}

class ApiMock extends ApiAbstract
{
    public function __construct()
    {
        $config['_id'] = 'Mock';
        $config['_group'] = 'ApiMock';
        $config['_url'] = 'http://jp.finalfantasyxiv.com/lodestone/character/';
        parent::__construct($config);
        Cache::clean($config['_group']);
    }
}