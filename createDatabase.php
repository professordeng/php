<?php 
$dbhost = 'localhost';       // mysql服务器主机地址
$dbuser = 'blog';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
echo '数据库连接成功！<br />';
$sql = 'CREATE DATABASE blog';
$retval = mysqli_query($conn, $sql);
if(! $retval )
{
	die('创建数据库失败: ' . mysqli_error($conn));
}
echo "数据库 blog 创建成功\n";
mysqli_close($conn);
?>
