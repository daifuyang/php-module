# REGION地区表插件
### 使用方法
创建表region。导入rigion.sql
### 应用思路
根据父级area_id获取省市区。顶级数据为0.如此非常简单的获取三级联动数据
### 前端调用js代码

> html代码
```
    <div class="form-group">
            <label class="col-sm-2 control-label">
                <span class="form-required">*</span>
                地区选择
            </label>
            <div class="col-md-6 col-sm-10">
                <div style="padding-left: 0" class="col-md-2 col-sm-2">
                    <select onchange="getRegion(this.value,'#city')" id="province" name="province" class="form-control" data-toggle="tooltip" data-placement="top" title="所在省份">
                        <option value="-1">所在省份</option>
                    </select>
                </div>

                <div style="padding-left: 0" class="col-md-2 col-sm-2">
                    <select onchange="getRegion(this.value,'#district')" id="city" name="city" class="form-control" data-toggle="tooltip" data-placement="top" title="所在城市">
                        <option value="-1">所在城市</option>
                    </select>
                </div>

                <div style="padding-left: 0" class="col-md-2 col-sm-2">
                    <select id="district" name="district" class="form-control" data-toggle="tooltip" data-placement="top" title="所在地区">
                        <option value="-1">所在县区</option>
                    </select>
                </div>

                <div style="padding-right: 0" class="col-md-6 col-sm-6">
                    <input type="text" class="form-control" name="hospital_address" data-toggle="tooltip" data-placement="top" title="详细地址"
                           value="" placeholder="详细地址">
                </div>

            </div>
```
> js代码
```
//初始化省
 $(function () {
        getRegion(0,"#province");
    })
    
//获取省市区的通用方法
    function getRegion(area_id,dom) {
        var url = "{:cmf_plugin_url('Region://index/getDataByAreaId')}";
        var data = {'area_id':area_id};
        if (area_id != 0){
            $(dom).empty();
        }
        $.post(url,data,function (res) {
            appendRegion(res,dom);
        });
    }

    function appendRegion(res,dom) {
        if (res.code == 1){
            var html = '';
            if (res.data.length > 0) {
                var defaultCode =  res.data[0].area_id;
                for (var i = 0; i < res.data.length; i++){
                    var str = "<option value='"+res.data[i].area_id+"'>"+res.data[i].area_name;+"</option>"
                    html += str;
                }
            }
            else{
                var html = "<option value=''>暂无县区</option>"
            }
            if (dom == "#city"){
                getRegion(defaultCode,"#district");
            }
            $(dom).append(html);
        }
    }
```
   
### 联系作者
@Author：Return_归来<br>
@Email：belief_dfy@qq.com<br>
@QQ      ：1140444693<br>
@website ：www.dfy520.cn
