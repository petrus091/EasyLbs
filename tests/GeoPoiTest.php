<?php

/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/17
 * Time: 下午8:45
 */
class GeoPoiTest extends TestCase
{
    private $geopoi;
    public function __construct()
    {
        $this->geopoi = new \EasyLbs\GeoCloud\GeoPoi($this->ak,$this->sk);
    }
    public function testCreate() {
        $poi_attributes = [
            'title'=>'test',
            'address'=>'hhhh',
            'tags'=>'hhhh',
            'latitude'=>40.043131,
            'longitude'=>116.321984,
            'coord_type'=>3,
            'geotable_id'=>143991,
        ];
        $res = $this->geopoi->create($poi_attributes);
        var_dump($res);
    }
    public function testList() {
        $res = $this->geopoi->list(['geotable_id'=>143991]);
        var_dump($res);
    }
    public function testDetail() {
        $res = $this->geopoi->list(['geotable_id'=>143991,'id'=>'1725287473']);
        var_dump($res);
    }
    public function testUpdate() {
        $poi_attributes = [
            'id'=>1725287473,
            'title'=>'gggg',
            'address'=>'hhhh',
            'tags'=>'hhhh',
            'latitude'=>40.043131,
            'longitude'=>116.321984,
            'coord_type'=>3,
            'geotable_id'=>143991,
        ];
        $res = $this->geopoi->create($poi_attributes);
        var_dump($res);
    }

    public function testDelete() {
        $res = $this->geopoi->delete(['geotable_id'=>143991,'id'=>'1725287473']);
        var_dump($res);
    }
}
