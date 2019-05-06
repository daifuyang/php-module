<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------

namespace plugins\Region\controller;

//Demo插件英文名，改成你的插件英文就行了
use cmf\controller\PluginBaseController;
use plugins\region\model\RegionModel;
use think\facade\Request;

class IndexController extends PluginBaseController
{
    public function index()
    {
        $this->success("hello world!");
        exit();
    }

    /*
     * @Author Return_归来
     * @Date 2019-05-03
     * @Desc 根据area_id获取地区数据接口
     * */
    public function getDataByAreaId(){
        $areaId = Request::param('area_id',0);
        $region = new RegionModel();
        $where = array('parent_id' => $areaId);
        $data = $region->getRegion($where,false);
        $this->success("获取成功!",'',$data);
    }
}
