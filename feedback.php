<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Phản hồi </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>


</head>

<body>


<div class="row header">
<div class="col-lg-6">
<span class="logo">WEB TRẮC NGHIỆM TRỰC TUYẾN</span></div>
<div class="col-md-2">
</div>
<div class="col-md-4">
<?php
 include_once 'dbConnection.php';
session_start();
  if((!isset($_SESSION['email']))){
echo '<a href="#" class="pull-right sub1 btn title3" data-toggle="modal" data-target="#myModal">Đăng nhập</a>&nbsp;';}
else
{
echo '<a href="logout.php?q=feedback.php" class="pull-right sub1 btn title3"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Đăng xuất</a>&nbsp;';}
?>

<a href="index.php" class="pull-right btn sub1 title3"></span>&nbsp;Trang Chủ</a>&nbsp;
</div></div>

<!--đăng nhập-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">Đăng Nhập</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- nhập email-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="nhập email" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- nhập password-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="nhập mật khẩu" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
		</fieldset>
</form>
      </div>
    </div>
  </div>
</div>


<!-- kết thúc header-->

<div class="bg3">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 panel" style="background-image:url(image/bg1.jpg); min-height:430px;">
<h2 align="center" style="font-family:'Times New Roman'; color:#000066">PHẢN HỒI/ĐÓNG GÓP</h2>
<div style="font-size:14px">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo' 
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Bạn có thể gửi tới email bên dưới:<br />
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<a href="dat@gmail.com" style="color:#000000">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;dat77641@gmail.com</a><br /><br />
</div><div class="col-md-1"></div></div>
<p>Hoặc trực tiếp gửi phản hồi bên dưới:-</p>
<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Tên:</b><br /><br /><br /><b>Môn học:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Tên" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Môn học" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>Địa chỉ Email:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="email" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"> 
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Viết phản hồi......"></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Gửi" class="btn btn-primary" />
</div>
</form>';}?>
</div>
<div class="col-md-3"></div></div>
</div></div>
</div><!-- kết thúc container -->


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
<!-- Modal người làm-->
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

<!--Modal đăng nhập admin-->
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



</body>
</html>
