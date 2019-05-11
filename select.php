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
$sql =	'SELECT blog_id, blog_title, 
		blog_author, submission_date
		FROM blog_table';

mysqli_select_db( $conn, 'blog' );

//1. mysqli_fetch_array 函数, 参数是 MYSQLI_ASSOC
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
	die('无法读取数据: ' . mysqli_error($conn));
}
echo '<h2>菜鸟教程 mysqli_fetch_array 测试<h2>';
echo '<table border="1"><tr><td>教程 ID</td><td>标题</td><td>作者</td><td>提交日期</td></tr>';
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
	echo "<tr><td> {$row['blog_id']}</td> ".
	"<td>{$row['blog_title']} </td> ".
	"<td>{$row['blog_author']} </td> ".
	"<td>{$row['submission_date']} </td> ".
	"</tr>";
}
echo '</table>';

//2. mysqli_fetch_assoc 函数
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
	die('无法读取数据: ' . mysqli_error($conn));
}
echo '<h2>菜鸟教程 mysqli_fetch_assoc 测试<h2>';
echo '<table border="1"><tr><td>教程 ID</td><td>标题</td><td>作者</td><td>提交日期</td></tr>';
while($row = mysqli_fetch_assoc($retval))
{
	    echo "<tr><td> {$row['blog_id']}</td> ".
		"<td>{$row['blog_title']} </td> ".
		"<td>{$row['blog_author']} </td> ".
		"<td>{$row['submission_date']} </td> ".
		"</tr>";
}
echo '</table>';

//3. mysqli_fetch_array 函数，参数是 MYSQLI_NUM
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
	die('无法读取数据: ' . mysqli_error($conn));
}
echo '<h2>菜鸟教程 mysqli_fetch_array 测试<h2>';
echo '<table border="1"><tr><td>教程 ID</td><td>标题</td><td>作者</td><td>提交日期</td></tr>';
while($row = mysqli_fetch_array($retval, MYSQLI_NUM))
{
	    echo "<tr><td> {$row[0]}</td> ".
		"<td>{$row[1]} </td> ".
		"<td>{$row[2]} </td> ".
		"<td>{$row[3]} </td> ".
		"</tr>";
}
echo '</table>';

mysqli_free_result($retval);
mysqli_close($conn);
?>
