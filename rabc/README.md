# php-module
记录PHP实现各种常用模块的思路
## <a href="https://baike.baidu.com/item/RBAC/1328788?fr=aladdin">RABC模块</a>
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