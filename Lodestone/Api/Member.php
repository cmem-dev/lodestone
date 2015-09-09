<?php
namespace Lodestone\Api;

use Lodestone\Utils;

class Member extends ApiAbstract
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $config['_id'] = 'Member';
        $config['_group'] = 'Api-Member';
        $config['_url'] = 'http://jp.finalfantasyxiv.com/lodestone/freecompany/';
        parent::__construct($config);
    }

    /**
     * doScraping (override)
     * @param $id
     * @return array
     */
    function doScraping($id)
    {
        $url = $this->_url . $id . "/member";
        $mapping = $this->getMapping();
        $crawler = $this->getCrawler('GET', $url);
        if (is_null($crawler)) {
            return [];
        }
        $data = $this->scraping($crawler, $mapping);
        $tempData = Utils::swapArray($data);
        if ($tempData['total'] < 50) {
            return $tempData;
        }

        $pages = ceil($tempData['total'] / 50);
        for ($i = 2; $i <= $pages; $i++) {
            $tempData = array_merge(
                $tempData,
                $this->doScrapingPaging($id, $tempData['total']
                )
            );
        }

        return $tempData;
    }

    /**
     * doScraping Paging (override)
     * @param $id
     * @param $pageNo
     * @return array
     */
    function doScrapingPaging($id, $pageNo)
    {
        $url = $this->_url . $id . "/member/?page={$pageNo}";
        $mapping = $this->getMapping();
        $crawler = $this->getCrawler('GET', $url);
        if (is_null($crawler)) {
            return [];
        }
        $data = $this->scraping($crawler, $mapping);

        return Utils::swapArray($data);
    }
}
