<?php
/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/17
 * Time: 下午10:02
 */

namespace EasyLbs\GeoSearch;


use EasyLbs\Core\LbsAbstractApi;

class GeoSearch extends LbsAbstractApi
{
    const API_NEARBY = '/geosearch/v3/nearby';
    const API_LOCAL = '/geosearch/v3/local';
    const API_BOUND = '/geosearch/v3/bound';
    const API_DETAIL = '/geosearch/v3/detail/';
    private $search_arrtibutes = [
        'geotable_id',
        'q',
        'location',
        'coord_type',
        'radius',
        'tags',
        'sortby',
        'filter',
        'page_index',
        'page_size',
        'callback',
        'region',
        'bounds',
    ];
    public function __construct($ak, $sk)
    {
        parent::__construct($ak, $sk);
        $this->attributes = $this->search_arrtibutes;
    }
    public function searchOfNearBy($attributes) {
        $this->setAttributeParams($attributes);
        $res = $this->getResult(self::METHOD_GET,self::API_NEARBY);
        return $res;
    }
    public function searchOfLocal($attributes) {
        $this->setAttributeParams($attributes);
        $res = $this->getResult(self::METHOD_GET,self::API_LOCAL);
        return $res;
    }
    public function searchOfBound($attributes) {
        $this->setAttributeParams($attributes);
        $res = $this->getResult(self::METHOD_GET,self::API_BOUND);
        return $res;
    }
    public function searchOfDetail($id,$attributes) {
        $this->setAttributeParams($attributes);
        $res = $this->getResult(self::METHOD_GET,self::API_DETAIL.$id);
        return $res;
    }
}