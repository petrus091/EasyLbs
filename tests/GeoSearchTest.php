<?php

/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/18
 * Time: 上午11:08
 */
class GeoSearchTest extends TestCase
{
    private $search;
    public function __construct()
    {
        $this->search = new \EasyLbs\GeoSearch\GeoSearch($this->ak,$this->sk);
    }

    public function testNearby() {
        $search_attributes = [
            'geotable_id'=>143991,
            'q'=>'hhhh',
            'location'=>'116.321984,40.043131',
            'coord_type'=>3,
            'radius'=>5000,
            'sortby'=>'distance:1',
            'page_index'=>0,
            'page_size'=>10,
        ];
        $res = $this->search->searchOfNearBy($search_attributes);
        var_dump($res);
    }

    public function testLocal() {
        $search_attributes = [
            'geotable_id'=>143991,
            'q'=>'hhhh',
            'region'=>'北京市',
            'coord_type'=>3,
            'radius'=>5000,
            'sortby'=>'distance:1',
            'page_index'=>0,
            'page_size'=>10,
        ];
        $res = $this->search->searchOfLocal($search_attributes);
        var_dump($res);
    }

    public function testBound() {
        $search_attributes = [
            'geotable_id'=>143991,
            'q'=>'hhhh',
            'bounds'=>'116.30,36.20;117.30,37.20',
            'coord_type'=>3,
            'radius'=>5000,
            'sortby'=>'distance:1',
            'page_index'=>0,
            'page_size'=>10,
        ];
        $res = $this->search->searchOfBound($search_attributes);
        var_dump($res);
    }

    public function testDetail() {
        $search_attributes = [
            'geotable_id'=>143991,
            'coord_type'=>3,
        ];
        $res = $this->search->searchOfDetail(1725295399,$search_attributes);
        var_dump($res);
    }
}
