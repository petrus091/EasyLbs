<?php

/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/17
 * Time: 下午5:11
 */
class GeoTableTest extends TestCase
{
    private $geotable;
    public function __construct()
    {
        $this->geotable = new \EasyLbs\GeoCloud\GeoTable($this->ak,$this->sk);

    }

    public function testCreate() {
        $res = $this->geotable->create(['name'=>'test','geotype'=>1,'is_published'=>1,'timestamp'=>time()]);
        var_dump($res);
    }
    public function testList() {
        $res = $this->geotable->list();
        var_dump($res);
    }
    public function testDelete() {
        $res = $this->geotable->delete(143928);
        var_dump($res);
    }
    public function testUpdate() {
        $res = $this->geotable->update(['id'=>'143990','name'=>'change']);
        var_dump($res);
    }
    public function testDetail() {
        $res = $this->geotable->detail(['id'=>143991]);
        var_dump($res);
    }

}
