<?php
/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/17
 * Time: 下午7:44
 */

namespace EasyLbs\GeoCloud;


use EasyLbs\Core\GeoCloudAbstractApi;

class GeoColumn extends GeoCloudAbstractApi
{
    const API_CREATE = '/geodata/v3/column/create';
    const API_LIST = '/geodata/v3/column/list';
    const API_DETAIL = '/geodata/v3/column/detail';
    const API_UPDATE = '/geodata/v3/column/update';
    const API_DELETE = '/geodata/v3/column/delete';
    private $column_attributes= [
        'id',
        'name',
        'key',
        'type',
        'max_length',
        'default_value',
        'is_sortfilter_field',
        'is_search_field',
        'is_index_field',
        'is_unique_field',
        'geotable_id',
    ];
    public function __construct($ak, $sk)
    {
        parent::__construct($ak, $sk);
        $this->attributes = $this->column_attributes;
        static::$API_CREATE = self::API_CREATE;
        static::$API_LIST = self::API_LIST;
        static::$API_DETAIL = self::API_DETAIL;
        static::$API_UPDATE = self::API_UPDATE;
        static::$API_DELETE = self::API_DELETE;
    }
}