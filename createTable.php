<?php
$dbhost = 'localhost';       // mysql服务器主机地址
$dbuser = 'blog';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
	    die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';
$sql =	"CREATE TABLE blog_table( ".
	    "blog_id INT NOT NULL AUTO_INCREMENT, ".
		"blog_title VARCHAR(100) NOT NULL, ".
		"blog_author VARCHAR(40) NOT NULL, ".
		"submission_date DATE, ".
		"PRIMARY KEY ( blog_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_select_db( $conn, 'blog' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
	    die('数据表创建失败: ' . mysqli_error($conn));
}
echo "数据表创建成功\n";
mysqli_close($conn);
?>
