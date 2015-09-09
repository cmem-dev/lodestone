<?php
namespace Lodestone\Api;

use Lodestone\Utils;

class Worldstatus extends ApiAbstract
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $config['_id'] = 'Worldstatus';
        $config['_group'] = 'Api-Worldstatus';
        $config['_url'] = 'http://jp.finalfantasyxiv.com/lodestone/worldstatus/';
        parent::__construct($config);
    }

    /**
     * doScraping (override)
     * @param $id
     * @return array
     */
    function doScraping($id)
    {
        $url = $this->_url;
        $mapping = $this->getMapping();
        $crawler = $this->getCrawler('GET', $url);
        if (is_null($crawler)) {
            return [];
        }
        $data = $this->scraping($crawler, $mapping);
        return Utils::swapArray($data);
    }

}
