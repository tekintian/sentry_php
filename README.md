

# Sentry PHP日志管理系统

## PHP集成 sentry 通用方法:
1. composer require "tekintian/sentry_php"

~~~php
# 在你的入口文件中载入Sentry | 如果已经载入了 Autoloader.php,则次步骤可忽略
require_once 'tekintian/sentry_php/Sentry.php';
~~~

2. 在你的入口文件中增加
~~~php
//$client_url 为你的sentry服务端分配的客户端URL
\tekintian\sentry_php\Sentry::listen($client_url);
~~~



## thinkphp5 sentry配置步骤

1. 修改tp5配置文件,增加SENTRY配置项目

在配置文件 application/config.php 中增加 sentry_raven 配置项目

~~~php
return [
	//   其他配置信息 .......
	//   
	//   
	//   
	//   
	//   
	//SENTRY Raven Log日志可视化日志管理系统
	'sentry_raven' => [
		// 是否启用 TRUE 启用; FALSE  禁用
		'is_enable' => TRUE,
		// Sentry 项目配置中的客户端URL
		'client_url' => 'http://xxxxxxxxxxxxxxxxxxxxxxxxxx:xxxxxxxxxxxxxxxxxxxxxxxxxx@sentry.yunnan.ws/1',
	],
]
~~~


2. 在 thinkphp/start.php 文件的最后增加一下代码

~~~php

if (config('sentry_raven.is_enable')) {
	// 使用tp助手函数从 thinkphp5的配置文件中获取 sentry raven url地址
	$client_url = config('sentry_raven.client_url');

	// sentry日志监听开启, 如果不需要配置开关,可以直接将下面这段放到你想要的地方即可.
	\tekintian\sentry_php\Sentry::listen($client_url);
}

~~~



### thinkphp5 sentry 配置截图

配置文件配置

![thinkphp5 config配置方法](tp5_config.png)



- 入口配置

![thinkphp5 入口配置](tp5_start.png)





Tekin

TekinTian@gmail.com
