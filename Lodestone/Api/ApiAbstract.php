<?php
namespace Lodestone\Api;


use Lodestone\Object;
use Lodestone\Cache;
use Lodestone\JSON;
use Lodestone\Utils;

abstract class ApiAbstract extends Object
{

    protected $_id;
    protected $_group;
    protected $_mapping;
    protected $_mappingFilePath;

    /**
     * Constructor.
     * @param array $config name-value pairs that will be used to initialize the object properties
     */
    public function __construct($config = array())
    {
        $vendorDir = dirname(dirname(__FILE__));
        $config['_mappingFilePath'] = "{$vendorDir}/Mapping/{$config['_id']}.json";
        parent::__construct($config);
    }

    /**
     * Object Initialize.
     */
    public function init(){
        if($data = Cache::get($this->_id, $this->_group)){
            $mapping = unserialize($data);
        }else{
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
        if(Utils::isBlank($key)){
            return $this->_mapping;
        }else{
            return $this->_mapping[$key];
        }
    }

    /**
     * @param mixed $mapping
     */
    public function setMapping($mapping)
    {
        $this->_mapping = $mapping;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public abstract function get($id='');
}