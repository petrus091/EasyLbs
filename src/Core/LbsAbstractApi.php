<?php
/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/17
 * Time: 下午3:07
 */

namespace EasyLbs\Core;


use EasyLbs\GeoCloud\GeoPoi;
use GuzzleHttp\Client;

abstract class LbsAbstractApi
{
    protected $ak;
    protected $sk;
    private $sn;
    protected $attributes;
    public $params = [];
    public $domain = 'http://api.map.baidu.com';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    public function __construct($ak, $sk)
    {
        $this->setAk($ak);
        $this->setSk($sk);
    }

    public function setAk($ak)
    {
        $this->ak = $ak;
    }

    public function setSk($sk)
    {
        $this->sk = $sk;
    }

    public function getAk()
    {
        return $this->ak;
    }

    public function getSk()
    {
        return $this->sk;
    }

    public function caculateAKSN($url, $querystring_arrays, $method = 'GET')
    {
        if ($method === 'POST') {
            ksort($querystring_arrays);
        }
        $querystring = http_build_query($querystring_arrays);
        $this->sn = md5(urlencode($url . '?' . $querystring . $this->sk));
        return $this->sn;
    }

    public function HTTPRequest($method, $url, $params)
    {
        $client = new Client(['base_uri'=>$this->domain]);
        if($method == self::METHOD_GET) {
            $res = $client->request($method, $url, ['query' => $params]);
        } else {
            $res = $client->request($method, $url, ['form_params' => $params]);
        }
        return \GuzzleHttp\json_decode($res->getBody()->getContents(),true);
    }
    public function request($method, $url, $params) {
        $params['ak'] = $this->getAk();
        $params['sn'] = $this->caculateAKSN($url, $params, $method);
        return $this->HTTPRequest($method,$url,$params);
    }
    /**
     * @param $attributes
     */
    public function setAttributeParams($attributes)
    {
        /**
         * 支持设置自定义字段
         * 此处会出现实例化GeoColumn时,attributes属性被GeoColumn的构造函数重新赋值
         * 此处废弃
         */
        /*
        if($this instanceof GeoPoi) {
            $geoColumn = new GeoColumn($this->ak,$this->sk);
            $result = $geoColumn->list(['geotable_id'=>$attributes['geotable_id']]);
            foreach ($result['columns'] as $column) {
                $this->attributes[] = $column['key'];
            }
        }
        */
        foreach ($attributes as $key => $attribute) {
            if($this instanceof GeoPoi) {
                $this->params[$key] = $attribute;
                continue;
            }
            if (in_array($key, $this->attributes)) {
                $this->params[$key] = $attribute;
            }
        }
    }
    /**
     * 发送API请求
     * 获取Response Json
     * @param $method
     * @param $uri
     * @return mixed
     */
    protected function getResult($method, $uri)
    {
        return $this->request($method, $uri, $this->params);
    }
}