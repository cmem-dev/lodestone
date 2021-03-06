<?php
namespace Lodestone\Api;


use Goutte\Client;
use Lodestone\Object;
use Lodestone\Cache;
use Lodestone\JSON;
use Lodestone\Utils;

abstract class ApiAbstract extends Object
{

    protected $_id;
    protected $_group;
    protected $_mapping;
    protected $_url;
    protected $_mappingFilePath;

    /**
     * Constructor.
     * @param array $config name-value pairs that will be used to initialize the object properties
     */
    public function __construct($config = [])
    {
        $vendorDir = dirname(dirname(__FILE__));
        $config['_mappingFilePath'] = "{$vendorDir}/Mapping/{$config['_id']}.json";
        parent::__construct($config);
    }

    /**
     * Object Initialize.
     */
    public function init()
    {
        if ($data = Cache::get($this->_id, $this->_group)) {
            $mapping = $data;
        } else {
            $mappingJson = file_get_contents($this->_mappingFilePath);
            $mapping = JSON::parse($mappingJson);
            Cache::save($mapping, $this->_id, $this->_group);
        }
        $this->setMapping($mapping);
        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getMapping($key = '')
    {
        if (Utils::isBlank($key)) {
            return $this->_mapping;
        } else {
            return $this->_mapping[$key];
        }
    }

    /**
     * @param array $mapping
     * @internal param mixed $mapping
     */
    public function setMapping($mapping = [])
    {
        if (!Utils::isBlank($mapping)) {
            $this->_mapping = $mapping;
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public function get($id)
    {
        if (Utils::isBlank($id)) return [];
        if (!is_numeric($id)) return [];
        if (!$data = Cache::get($id, $this->_group)) {
            $data = $this->doScraping($id);
            Cache::save($data, $id, $this->_group);
        }
        return $data;
    }

    /**
     * @param $id
     * @return array
     */
    function doScraping($id)
    {
        $url = $this->_url . $id;
        $mapping = $this->getMapping();
        $crawler = $this->getCrawler('GET', $url);
        if (is_null($crawler)) {
            return [];
        }
        return $this->scraping($crawler, $mapping);
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     * @param array $mapping
     * @return array
     */
    public function scraping($crawler, $mapping = [])
    {
        if (Utils::isBlank($mapping)) return [$crawler->html()];
        $ret = [];
        foreach ($mapping as $key => $value) {
            $dom = $crawler->$value['filter']($value['selector']);
            if (isset($value['subset'])
                && !Utils::isBlank($value['subset'])
            ) {
                $ret[$key] = $dom->each(function ($node) use ($value) {
                    return $this->getValue($node, $value['attr'], $value['trim']);
                });
            } else {
                $ret[$key] = $this->getValue($dom, $value['attr'], $value['trim']);
            }
        }
        return $ret;
    }

    /**
     * @param $method
     * @param $url
     * @return null|\Symfony\Component\DomCrawler\Crawler
     */
    public function getCrawler($method, $url)
    {
        $client = new Client();
        $crawler = $client->request($method, $url);
        $status = $client->getResponse()->getStatus();

        switch ($status) {
            case 200:
                break;
            default:
                $crawler = null;
                break;
        }
        return $crawler;
    }

    /**
     * @param $node \Symfony\Component\DomCrawler\Crawler
     * @param string $attr
     * @param $trim
     * @return string
     */
    public function getValue($node, $attr, $trim)
    {
        $temp = '';
        try {
            if (Utils::isBlank($attr)) {
                $temp = $node->text();
            } else {
                $temp = $node->attr($attr);
            }
        } catch (\Exception $e) {
        }
        if($trim == 'timestamp'){
            $temp = preg_replace('/.*ldst_strftime\(/','',$temp);
            $temp = preg_replace('/,.*/',"",$temp);
            $temp = trim($temp);
        }
        if($trim == 'hash'){
            preg_match('/([0-9a-zA-Z]+)$/',$temp,$m);
            $temp = trim($m[0]);
        }
        return Utils::trimQsa($temp);
    }
}

