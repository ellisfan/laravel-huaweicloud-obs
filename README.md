## 简介
HuaweiCloud OBS filesystem for Laravel

## 使用方法
安装
```shell
composer require kalax2/laravel-huaweicloud-obs
```
配置

```php
// 在config/filesystems.php中添加相应配置
return [

    /* 其他配置 */
    
    'obs' => [
        'driver' => 'obs',
        'access_key' => env('OBS_ACCESS_KEY'),
        'access_secret' => env('OBS_ACCESS_SECRET'),
        'bucket' => env('OBS_BUCKET'),
        'region' => env('OBS_REGION'),      // 地域，详见 https://console.huaweicloud.com/apiexplorer/#/endpoint/OBS
        'ssl' => env('OBS_SSL', true),      // 是否使用https
        'domain' => env('OBS_DOMAIN', ''),  // 自定义域名
        'guzzle' => []                      // GuzzleHttp配置
    ]
];
```

使用
```php
Storage::disk('obs')->put('hello.txt', 'world');
Storage::disk('obs')->temporaryUrl('hello.txt', now()->addMinutes(5));
```
更多用法请看[官方文档](https://laravel.com/docs/11.x/filesystem)