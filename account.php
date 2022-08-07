<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tài khoản </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <!--thongbao-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>


</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">WEB TRẮC NGHIỆM TRỰC TUYẾN</span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];
$email=$_SESSION['email'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Đăng xuất</a></span>';
}?>
</div>
</div></div>
<div class="bg2">

<!--menu chức năng-->
<nav class="navbar navbar-default title4">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><b>MENU</b></a>
    </div>

    <!-- kiểm tra điều kiện điều hướng của menu và tiến hành điều hướng -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Trang chủ<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Lịch Sử</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Xếp Hạng</a></li>
		</ul>
      </div>
  </div>
</nav>
<div class="container"><!--bắt đầu container-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>STT</b></td><td><b>Chủ đề</b></td><td><b>Tổng số câu hỏi</b></td><td><b>Điểm</b></td><td><b>Thời gian làm bài</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$right = $row['right'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$right*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#58ACFA"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>BẮT ĐẦU</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$right*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>LÀM LẠI</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}?>


<!--bắt đầu làm bài-->
<?php
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div class="panel" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</b><br /><br />';
}
$q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';

while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
}
echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;trả lời</button></form></div>';
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}
//hiển thị kết quả
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Kết quả</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
$r=$row['right'];
$qa=$row['level'];
echo '<tr style="color:#66CCFF"><td>Tổng số câu hỏi</td><td>'.$qa.'</td></tr>
      <tr style="color:#99cc32"><td>Số câu trả lời đúng&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
	  <tr style="color:red"><td>số câu trả lời sai&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
	  <tr style="color:#66CCFF"><td>Điểm&nbsp;<span class="glyphicon glyphicon-education" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
$q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
echo '<tr style="color:#8904B1"><td>Tổng điểm&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
echo '</table></div>';

}
?>
<!--kết thúc bài làm-->
<?php
//lịch sử
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>STT</b></td><td><b>Câu hỏi</b></td><td><b>Đáp án</b></td><td><b>Đúng</b></td><td><b>Sai<b></td><td><b>Điểm</b></td>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$eid=$row['eid'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['right'];
$qa=$row['level'];
$q23=mysqli_query($con,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');
while($row=mysqli_fetch_array($q23) )
{
$title=$row['title'];
}
$c++;
echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
}
echo'</table></div>';
}

//xếp hạng
if(@$_GET['q']== 3) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Hạng</b></td><td><b>Tên</b></td><td><b>Giới tính</b></td><td><b>Đại học</b></td><td><b>Điểm</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];
$college=$row['college'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$s.'</td><td>';
}
echo '</table></div></div>';}
?>



</div></div></div></div>
<!--Footer-->
<div class="row footer">
<div class="col-md-3 box">
<a href="http://fit.vimaru.edu.vn/" target="_blank" class="nhapnhay">Thông tin</a>
</div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#login" class="nhapnhay">Đăng nhập admin</a></div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#developers" class="nhapnhay">Phát triển</a>
</div>
<div class="col-md-3 box">
<a href="feedback.php" target="_blank" class="nhapnhay">Phản hồi</a></div></div>
<!-- thông tin người làm hiển thị trên modal-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
        <h4 class="modal-title" style="font-family:'Times New Roman' "><span style="color:orange">Phát triển</span></h4>
      </div>
	  
       <div class="modal-body">
        <p>
    <div class="row">
    <div class="col-md-4">
     <img src="image/photo.jpg" width=100 height=100 alt="" class="img-rounded">
     </div>
     <div class="col-md-5">
    <a href="https://www.facebook.com/phungbadat1907" style="color:#202020; font-family:'Times New Roman' ; font-size:18px" title="Find on Facebook">Phùng Bá Đạt</a>
    <h4 style="font-family:'Times New Roman' ">dat77641@st.vimaru.edu.vn</h4>
    <h4 style="font-family:'Times New Roman' ">Đại Học Hàng Hải</h4></div></div>
    </p>
    <p>
    <div class="row">
    <div class="col-md-4">
     <img src="image/photo.jpg" width=100 height=100 alt="" class="img-rounded">
     </div>
     <div class="col-md-5">
    <a href="https://www.facebook.com/profile.php?id=100009516431215" style="color:#202020; font-family:'Times New Roman' ; font-size:18px" title="Find on Facebook">Trương Minh Hiếu</a>
    <h4 style="font-family:'Times New Roman' ">hieu78045@st.vimaru.edu.vn</h4>
    <h4 style="font-family:'Times New Roman' ">Đại Học Hàng Hải</h4></div></div>
    </p>
    <p>
    <div class="row">
    <div class="col-md-4">
     <img src="image/photo.jpg" width=100 height=100 alt="" class="img-rounded">
     </div>
     <div class="col-md-5">
    <a href="https://www.facebook.com/profile.php?id=100015419283171" style="color:#202020; font-family:'Times New Roman' ; font-size:18px" title="Find on Facebook">Phạm Quốc Khánh</a>
    <h4 style="font-family:'Times New Roman' ">khanh78470@st.vimaru.edu.vn</h4>
    <h4 style="font-family:'Times New Roman' ">Đại Học Hàng Hải</h4></div></div>
    </p>
      </div>
    
    </div>
  </div>
</div>

<!--Modal của đăng nhập admin-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
        <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">Đăng nhập</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="nhập email" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" placeholder="nhập mật khẩu" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Đăng nhập" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      
    </div>
  </div>
</div>
<!--kết thúc Footer-->


</body>
</html>
