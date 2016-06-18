<?php

namespace EasyLbs\Core;
use EasyLbs\GeoCloud\GeoColumn;
use EasyLbs\GeoCloud\GeoPoi;

/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/17
 * Time: 下午2:45
 */
abstract class GeoCloudAbstractApi extends LbsAbstractApi
{
    protected $url;
    protected $geotable_id;
    static $API_CREATE = '';
    static $API_LIST = '';
    static $API_DETAIL = '';
    static $API_UPDATE = '';
    static $API_DELETE = '';


    /**
     * 添加
     * @param $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        $this->setAttributeParams($attributes);
        $result = $this->getResult(self::METHOD_POST, self::$API_CREATE);
        return $result;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function list($attributes = [])
    {
        $this->setAttributeParams($attributes);
        $result = $this->getResult(self::METHOD_GET, self::$API_LIST);
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function detail($attributes)
    {
        if (!$attributes['id']) {
            Throw new \Exception("参数id错误");
        }
        $this->setAttributeParams($attributes);
        $result = $this->getResult(self::METHOD_GET, self::$API_DETAIL);
        return $result;
    }

    /**
     * @param $attributes
     * @return mixed
     * @throws \Exception
     */
    public function update($attributes)
    {
        if (!isset($attributes['id'])) {
            Throw new \Exception("参数id为必选");
        }
        $this->setAttributeParams($attributes);
        $result = $this->getResult(self::METHOD_POST, self::$API_UPDATE);
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function delete($attributes)
    {
        if (!$attributes['id']) {
            Throw new \Exception("参数id错误");
        }
        $this->setAttributeParams($attributes);
        $result = $this->getResult(self::METHOD_POST, self::$API_DELETE);
        return $result;
    }
    
}