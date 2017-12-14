<?php
header("Content-type: text/html; charset=utf-8");
//设置数据库变量
$db_host   = '121.40.80.26';  //数据库主机名称，一般都为localhost
$db_user   = 'root';        //数据库用户帐号，根据个人情况而定
$db_passw = 'Leoxie';   //数据库用户密码，根据个人情况而定
$db_name  = 'fire_news';         //数据库具体名称，以刚才创建的数据库为准


//连接数据库
$conn = mysqli_connect($db_host,$db_user,$db_passw) or die ('数据库连接失败！</br>错误原因：'.mysqli_error());


//设置字符集，如utf8和gbk等，根据数据库的字符集而定
mysqli_query($conn,"set names 'utf8'");


//选定数据库
mysqli_select_db($db_name,$conn) or die('数据库选定失败！</br>错误原因：'.mysqli_error());


//执行SQL语句(查询)
$result = mysqli_query($sql) or die('数据库查询失败！</br>错误原因：'.mysqli_error());




//说明：这段代码本身并没有什么作用，因为它要经常用到，所以只是为了减少工作量不必重复写它，所以把它专门放在一个文件里，这样就可以随时调用了。你只需要根据个人情况改一下“设置数据库变量”和“设置字符集”的部分就可以了。
?>