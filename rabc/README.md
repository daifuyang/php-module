## RABC模块
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

### 联系作者
@Author：Return_归来<br>
@Email：belief_dfy@qq.com<br>
@QQ      ：1140444693<br>
@website ：www.dfy520.cn
