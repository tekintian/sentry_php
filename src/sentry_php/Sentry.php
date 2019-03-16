<?php

/**
 * Sentry日志管理系统 入口
 *
 * 使用方法: 在 thinkphp/start.php 文件尾部增加   \tekintian\sentry_php\Sentry::listen($client_url);
 *
 * @Author: tekintian
 * @Date:   2018-12-25 18:05:27
 * @Last Modified 2019-03-16
 */
namespace tekintian\sentry_php;

require_once __DIR__ . '/Autoloader.php';
include __DIR__ . '/Processor/SanitizeDataProcessor.php';
include __DIR__ . '/ErrorHandler.php';
use Raven_Autoloader;
use Raven_Client;
use Raven_ErrorHandler;

/**
 * Sentry日志管理系统入口类
 */
class Sentry {

	/**
	 * sentry 日志监听
	 * @param  [type] $client_url [Sentry 项目配置中的客户端URL]
	 * @return [type]             [description]
	 */
	static public function listen($client_url) {
		error_reporting(E_ALL ^ E_NOTICE);
		Raven_Autoloader::register();
		// 实例化sentry raven client
		$raven_client = new Raven_Client($client_url);
		$error_handler = new Raven_ErrorHandler($raven_client);
		$error_handler->registerExceptionHandler();
		$error_handler->registerErrorHandler();
		$error_handler->registerShutdownFunction();
	}
}
