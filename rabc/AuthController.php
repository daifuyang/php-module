<?php


namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class AuthController extends Controller
{
    protected $accessAuth;
    public function __construct(Request $request)
    {
        parent::__construct();

        $model = $request->module();
        $controller =  $request->controller();
        $action = $request->action();
        //当前路由 大写转小写
        $preAccessAuth = strtolower($model."/".$controller."/".$action);
        $accessAuth = $this->accessAuth;
        if (!in_array($preAccessAuth,$accessAuth)){
            $this->error("您无权访问此内容");
        }
    }

    protected function initialize()
    {
        $id = 2;
        //如果id为1.该用户为超级管理员
        if ($id == 1){
            echo '超级管理员';
        }
        //获取当前用户角色
        $data = Db::name("role")->alias("r")->leftJoin('roleUser ru','r.id = ru.role_id')->where('ru.user_id',$id)->select();
        $accessAuth = array();
        foreach ($data as $key => $val){
            //如果是超级管理员直接返回
            if ($val['role_id'] == 1){
                echo '超级管理员';
            }
            else{
                //获取分配权限内容
                // echo $val['role_id'];
                $result =  Db::name("auth_access")->where('role_id',$val['role_id'])->field('rule_name')->select();
                foreach ($result as $key => $val){
                    if ( ! in_array($val['rule_name'],$accessAuth) ){
                        array_push($accessAuth,$val['rule_name']);
                    }
                }

            }
        }
        //全部权限列表
        $this->accessAuth = $accessAuth;
    }
}