# php-module
记录PHP实现各种常用模块的思路
## <a href="https://baike.baidu.com/item/RBAC/1328788?fr=aladdin">RABC模块</a>
### 数据库
##### 用户表
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

##### 角色表
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

##### 用户角色对应表
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

##### 用户角色对应表
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