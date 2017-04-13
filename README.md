# EasyLbs
Laravel 百度云地图LBS SDK
使用前请先阅读百度云LBS服务云文档，本SDK不再对请求参数以及响应作解释
---
# 云存储

## 方法列表：
    * create
    * getList
    * update
    * detail
    * delete

## 位置数据表（geotable）

```php
    $geoTable = new GeoTable('your-ak','your-sk');
```
  
## 自定义扩展列（column）
  
```php
    $geoColumn = new GeoColumn('your-ak','your-sk');
```
  
## 位置数据（poi）

```php
    $geoPoi = new GeoPoi('your-ak','your-sk');
```

# 云检索

## poi周边搜索

```php
    $geoSearch = new GeoSearch('your-ak','your-sk');
    //$attributes 请参考百度云文档
    $geoSearch->searchOfNearBy($attributes);
```
  
## poi本地检索
  
```php
    $geoSearch = new GeoSearch('your-ak','your-sk');
    //$attributes 请参考百度云文档
    $geoSearch->searchOfLocal($attributes);
```
  
## poi详情检索
  
```php
    $geoSearch = new GeoSearch('your-ak','your-sk');
    //$attributes 请参考百度云文档
    $geoSearch->searchOfDetail($attributes);
```
