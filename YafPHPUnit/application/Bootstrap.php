<?php

/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:\Yaf\Dispatcher $dispatcher
 * 调用的顺序, 和声明的顺序相同
 *
 */
class Bootstrap extends \Yaf\Bootstrap_Abstract {

    /**
     * Yaf的配置缓存
     *
     * @var \Yaf\Config\Ini
     */
    protected $_config = null;

    /**
     * 把配置存到注册表
     */
    public function _initConfig() {
        $config = \Yaf\Application::app()->getConfig();

        $this->_config = $config;
        \Yaf\Registry::set('config', $config);
	}
}
