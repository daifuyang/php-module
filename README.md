# php-module
利用PHP实现各种常用模块的思路
# <a href="https://github.com/daifuyang/php-module/tree/master/rabc">RABC模块</a>
基于thinkphp开发的RABC模块
### 数据库
##### 用户表 User
<table>
  <tr>
    <td>字段</td>
    <td>长度</td>
    <td>备注</td>
  </tr>
  <tr>
    <td>id</td>
    <td>int(11)</td>
    <td>备注</td>
  </tr>
  <tr>
    <td>nickanme</td>
    <td>varchar(40)</td>
    <td>备注</td>
   </tr>
   <tr>
    <td>realname</td>
    <td>varchar(40)</td>
    <td>备注</td>
   </tr>
   
</table> 

##### 角色表 Role
<table>
    <tr>
      <td>字段</td>
      <td>长度</td>
      <td>备注</td>
    </tr>
    <tr>
      <td>id</td>
      <td>int(11)</td>
      <td></td>
    </tr>
    <tr>
      <td>parent_id</td>
      <td>int(11)</td>
      <td>父类id</td>
    </tr>
        <tr>
          <td>name</td>
          <td>varchar(40)</td>
          <td>角色名称</td>
        </tr>
</table>

##### 用户角色对应表 Role_user
<table>
    <tr>
      <td>字段</td>
      <td>长度</td>
      <td>备注</td>
    </tr>
 <tr>
      <td>id</td>
      <td>int(11)</td>
      <td></td>
</tr>   
    <tr>
         <td>user_id</td>
         <td>int(11)</td>
         <td>用户id</td>
   </tr> 
   <tr>
            <td>role_id</td>
            <td>int(11)</td>
            <td>对应角色id</td>
      </tr> 
    
</table>

##### 用户角色对应表 Auth_access
<table>
 <tr>
    <td>字段</td>
    <td>长度</td>
    <td>备注</td>
 </tr>
 
 <tr>
     <td>id</td>
     <td>int(11)</td>
     <td></td>
 </tr>
 
  <tr>
      <td>role_id</td>
      <td>int(11)</td>
      <td>角色id</td>
  </tr> 
  
  <tr>
       <td>rule_name</td>
       <td>varchar(255)</td>
       <td></td>
   </tr>
     
 
</table>

#### 对应关系
Role表和Role_user表一对多关联</br>
获取当前用户的所有角色</br>
根据角色ID获取auth_access的授权列表</br>
判断当前入口是否拥有权限

#### 应用思路
+ 获取当前用户id
+ 根据Role表和Role_user表关联查询出当前用户的角色ID
+ 根据角色获取所有角色对应的权限内容 auth_access

# <a href="https://github.com/daifuyang/php-module/tree/master/region">REGION地区表插件</a>
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
                {:lang('HOSPITAL_ADDRESS')}
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
