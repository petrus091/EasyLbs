<?php
/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/17
 * Time: 下午8:28
 */

namespace EasyLbs\GeoCloud;


use EasyLbs\Core\GeoCloudAbstractApi;

class GeoPoi extends GeoCloudAbstractApi
{
    const API_CREATE = '/geodata/v3/poi/create';
    const API_LIST = '/geodata/v3/poi/list';
    const API_DETAIL = '/geodata/v3/poi/detail';
    const API_UPDATE = '/geodata/v3/poi/update';
    const API_DELETE = '/geodata/v3/poi/delete';
    private $poi_attributes = [
        'id',
        'title',
        'address',
        'tags',
        'latitude',
        'longitude',
        'coord_type',
        'geotable_id',
    ];

    public function __construct($ak, $sk)
    {
        parent::__construct($ak, $sk);
        $this->attributes = $this->poi_attributes;
        static::$API_CREATE = self::API_CREATE;
        static::$API_LIST = self::API_LIST;
        static::$API_DETAIL = self::API_DETAIL;
        static::$API_UPDATE = self::API_UPDATE;
        static::$API_DELETE = self::API_DELETE;
    }
}