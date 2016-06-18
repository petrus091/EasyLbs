<?php
/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/17
 * Time: 下午3:49
 */

namespace EasyLbs\GeoCloud;


use EasyLbs\Core\GeoCloudAbstractApi;

class GeoTable extends GeoCloudAbstractApi
{
    const API_CREATE = '/geodata/v3/geotable/create';
    const API_LIST = '/geodata/v3/geotable/list';
    const API_DETAIL = '/geodata/v3/geotable/detail';
    const API_UPDATE = '/geodata/v3/geotable/update';
    const API_DELETE = '/geodata/v3/geotable/delete';
    private $table_attributes= [
        'id',
        'name',
        'geotype',
        'is_published',
        'timestamp'
    ];
    public function __construct($ak, $sk)
    {
        parent::__construct($ak, $sk);
        $this->attributes = $this->table_attributes;
        static::$API_CREATE = self::API_CREATE;
        static::$API_LIST = self::API_LIST;
        static::$API_DETAIL = self::API_DETAIL;
        static::$API_UPDATE = self::API_UPDATE;
        static::$API_DELETE = self::API_DELETE;
    }
}