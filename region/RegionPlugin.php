<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------

namespace plugins\Region;

//Demo插件英文名，改成你的插件英文就行了
use cmf\lib\Plugin;

//Demo插件英文名，改成你的插件英文就行了
class RegionPlugin extends Plugin
{
    public $info = [
        'name'        => 'Region', //Demo插件英文名，改成你的插件英文就行了
        'title'       => '省市区数据库',
        'description' => '封装了中国常用的省市区行政区数据库',
        'status'      => 1,
        'author'      => '火箭源码',
        'version'     => '1.0',
        'demo_url'    => '',
        'author_url'  => '',
    ];

    public $hasAdmin = 0; //插件是否有后台管理界面

    // 插件安装
    public function install()
    {
        return true; //安装成功返回true，失败false
    }

    // 插件卸载
    public function uninstall()
    {
        return true; //卸载成功返回true，失败false
    }
}
