<?php 
$dbhost = 'localhost';       // mysql服务器主机地址
$dbuser = 'blog';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
echo '数据库连接成功！';
$result =  mysqli_select_db($conn, 'blog');
if($result){
	echo '选择 blog 数据库成功';
}
mysqli_close($conn);
?>
