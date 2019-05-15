<?php
$dbhost = 'localhost';       // mysql服务器主机地址
$dbuser = 'blog';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
	die('连接失败: ' . mysqli_error($conn));
}
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");
// 默认不同，可以使用 union all 显示重复项
$sql =	"select country from websites union select country from apps";

mysqli_select_db( $conn, 'blog' );

// 查询 where 结果
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
	die('无法读取数据: ' . mysqli_error($conn));
}

while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
	echo json_encode($row, JSON_UNESCAPED_UNICODE);
	echo "<br />";
}

mysqli_free_result($retval);
mysqli_close($conn);
?>
