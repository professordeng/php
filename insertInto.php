<?php
$dbhost = 'localhost';  // mysql服务器主机地址
$dbuser = 'blog';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
	  die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");
  
$blog_title = '学习 Python';
$blog_author = 'professordeng';
$submission_date = '2016-03-06';
   
$sql =	"INSERT INTO blog_table ".
		"(blog_title, blog_author, submission_date) ".
        "VALUES ".
        "('$blog_title','$blog_author','$submission_date')";
                                                    
mysqli_select_db( $conn, 'blog' );

$retval = mysqli_query( $conn, $sql );
if(! $retval ) {
	die('无法插入数据: ' . mysqli_error($conn));
}
echo "数据插入成功\n";
mysqli_close($conn);
?>
