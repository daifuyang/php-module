<?php
namespace plugins\region\model;
use think\Model;
class RegionModel extends Model
{
    public function getRegion($where,$isPage = true)
    {
        if ($isPage){
            $result = $this->where($where)->paginate(10);
        }
        else{
            $result = $this->where($where)->select();
        }
       return $result;
    }
}