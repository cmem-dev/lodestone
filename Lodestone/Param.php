<?php

namespace Lodestone;

use Lodestone\Exception\InvalidParamException;

/**
 * Class to handle params
 *
 */
class Param
{
    /**
     * Params
     *
     * @var array
     */
    protected $_params = array();

    /**
     * Raw Params
     *
     * @var array
     */
    protected $_rawParams = array();

    /**
     * Converts the params to an array. A default implementation exist to create
     * the an array out of the class name (last part of the class name)
     * and the params
     *
     * @return array
     */
    public function toArray()
    {
        $data = array($this->_getBaseName() => $this->getParams());

        if (!empty($this->_rawParams)) {
            $data = array_merge($data, $this->_rawParams);
        }

        return $data;
    }

    /**
     * Param's name
     * Picks the last part of the class name and makes it snake_case
     * You can override this method if you want to change the name
     *
     * @return string name
     */
    protected function _getBaseName()
    {
        return Util::getParamName($this);
    }

    /**
     * Sets params not inside params array
     *
     * @param  string          $key
     * @param  mixed           $value
     * @return \Lodestone\Param
     */
    protected function _setRawParam($key, $value)
    {
        $this->_rawParams[$key] = $value;

        return $this;
    }

    /**
     * Sets (overwrites) the value at the given key
     *
     * @param  string          $key   Key to set
     * @param  mixed           $value Key Value
     * @return \Lodestone\Param
     */
    public function setParam($key, $value)
    {
        $this->_params[$key] = $value;

        return $this;
    }

    /**
     * Sets (overwrites) all params of this object
     *
     * @param  array           $params Parameter list
     * @return \Lodestone\Param
     */
    public function setParams(array $params)
    {
        $this->_params = $params;

        return $this;
    }

    /**
     * Adds a param to the list.
     *
     * This function can be used to add an array of params
     *
     * @param  string          $key   Param key
     * @param  mixed           $value Value to set
     * @return \Lodestone\Param
     */
    public function addParam($key, $value)
    {
        if ($key != null) {
            if (!isset($this->_params[$key])) {
                $this->_params[$key] = array();
            }

            $this->_params[$key][] = $value;
        } else {
            $this->_params = $value;
        }

        return $this;
    }

    /**
     * Returns a specific param
     *
     * @param  string                               $key Key to return
     * @return mixed                                Key value
     * @throws \Lodestone\Exception\InvalidParamException If requested key is not set
     */
    public function getParam($key)
    {
        if (!$this->hasParam($key)) {
            throw new InvalidParamException('Param '.$key.' does not exist');
        }

        return $this->_params[$key];
    }

    /**
     * Test if a param is set
     *
     * @param  string  $key Key to test
     * @return boolean True if the param is set, false otherwise
     */
    public function hasParam($key)
    {
        return isset($this->_params[$key]);
    }

    /**
     * Returns the params array
     *
     * @return array Params
     */
    public function getParams()
    {
        return $this->_params;
    }
}
