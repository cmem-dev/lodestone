<?php
namespace Lodestone\Config;

use Lodestone\Exception\JSONParseException;
use Lodestone\Log;
use Lodestone\Object;
use Lodestone\Cache;
use Lodestone\JSON;

abstract class ConfigAbstract extends Object
{
    protected $_id;
    protected $_group;
    protected $_dir;
    protected $_ext;
    protected $_mapping;

    /**
     * Constructor.
     * @param array $config name-value pairs that will be used to initialize the object properties
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    /**
     * Object Initialize.
     */
    public function init(){
        if($data = Cache::get($this->_id, $this->_group)){
            $arrConfig = unserialize($data);
        }else{
            $vendorDir = dirname(dirname(__FILE__));
            $data = file_get_contents(
                $vendorDir . DIRECTORY_SEPARATOR .
                $this->_dir . DIRECTORY_SEPARATOR .
                $this->_id ."_".
                $this->_group .".".
                $this->_ext
            );
            try{
                $arrConfig = JSON::parse($data);
            }catch(JSONParseException $e){
                Log::warning('config data set fail.');
                $arrConfig = [];
            }

            Cache::save($arrConfig, $this->_id, $this->_group);
        }
        $this->setMapping($arrConfig);
    }

    /**
     * @return mixed
     */
    public function getMapping()
    {
        return $this->_mapping;
    }

    /**
     * @param mixed $mapping
     */
    public function setMapping($mapping)
    {
        $this->_mapping = $mapping;
    }
}