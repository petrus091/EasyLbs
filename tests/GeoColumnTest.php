<?php

/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/17
 * Time: 下午8:07
 */
class GeoColumnTest extends TestCase
{
    private $geocolumn;

    public function __construct()
    {
        $this->geocolumn = new \EasyLbs\GeoCloud\GeoColumn($this->ak, $this->sk);

    }

    public function testCreate()
    {
        $column = [
            'name' => '哈哈',
            'key' => 'test_key',
            'type' => '3',
            'max_length' => '256',
            'default_value' => 'test',
            'is_sortfilter_field' => 0,
            'is_search_field' => 1,
            'is_index_field' => 1,
            'is_unique_field' => 1,
            'geotable_id' => 143991,
        ];
        $res = $this->geocolumn->create($column);
        var_dump($res);
    }

    public function testList()
    {
        $res = $this->geocolumn->list(['geotable_id' => 143991]);
        var_dump($res);
    }

    public function testDelete()
    {
        $res = $this->geocolumn->delete(['id' => 247928, 'geotable_id' => 143991]);
        var_dump($res);
    }

    public function testUpdate()
    {
        $column = [
            'id' => 247926,
            'name' => 'GGGGGG',
            'type' => '3',
            'max_length' => '256',
            'default_value' => 'test',
            'is_sortfilter_field' => 0,
            'is_search_field' => 1,
            'is_index_field' => 1,
            'is_unique_field' => 1,
            'geotable_id' => 143991,
        ];
        $res = $this->geocolumn->update($column);
        var_dump($res);
    }

    public function testDetail()
    {
        $res = $this->geocolumn->detail(['id' => 247926, 'geotable_id' => '143991']);
        var_dump($res);
    }
}
