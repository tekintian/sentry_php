

# Sentry PHP日志管理系统



Sentry  PHP 可视化日志管理系统,支持 php5.3以上版本, 支持 thinkphp5, ci,  yii2, laravel等PHP框架, 可以集成到框架中,也可直接使用.



## PHP集成 sentry 通用方法:

1. composer require "tekintian/sentry_php"

~~~php
# 2种载入方式,选择其中一种即可
# 方案 一:  采用autoload.php自动载入方式加载 Sentry 
require_once  __DIR__ . 'vendor/autoload.php';


# 方案 二:  在你的入口文件中载入Sentry ,直接载入方式, 
require_once  __DIR__ . '/vendor/tekintian/sentry_php/src/sentry_php/Sentry.php';

~~~

2. 在你的入口文件中增加
~~~php
//$client_url 为你的sentry服务端分配的客户端URL
\tekintian\sentry_php\Sentry::listen('http://88861b9070395551b55063f03a6ca988:58891b9070394b61b55063f03a6ca123@sentry.yunnan.ws/1');
~~~



## thinkphp5 sentry 可视化日志管理系统配置步骤

### 一. thinkphp/base.php 配置方法 (推荐此种方案)

1. 在项目根目录执行   composer require "tekintian/sentry_php"


2. 在 thinkphp/base.php 文件的最后增加一下代码

~~~php
# 注意将  http://88861b9070395551b55063f03a6ca988:58891b9070394b61b55063f03a6ca123@sentry.yunnan.ws/1 换成你自己的 sentry 服务端分配的URL即可
// sentry日志监听开启;
\tekintian\sentry_php\Sentry::listen('http://88861b9070395551b55063f03a6ca988:58891b9070394b61b55063f03a6ca123@sentry.yunnan.ws/1');

~~~



> 提示:   在 thinkphp/base.php 文件的最后, thinkphp5已经自动加载了 Sentry类; 如果是在 index.php 入口文件最前面的话需要手动加载 Sentry 后才可执行
>
>

### 二. tp5  public/index.php 配置方法

~~~php
// Sentry start
// Sentry 放到TP入口文件的最前面, 需要手动加载Sentry.php
require __DIR__ . '/../vendor/tekintian/sentry_php/src/sentry_php/Sentry.php';
// sentry日志监听开启;
\tekintian\sentry_php\Sentry::listen('http://88861b9070395551b55063f03a6ca988:58891b9070394b61b55063f03a6ca123@sentry.yunnan.ws/1');
// sentry end

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';

~~~





### thinkphp5 sentry 配置截图



- thinkphp/base.php 入口配置

![thinkphp5 入口配置](tp5_base.png)



> PS: Sentry php  Thinkphp5 只能放到 thinkphp/base.php 这个文件中,放到其他地方可能导致不正常!



Tekin

TekinTian@gmail.com
