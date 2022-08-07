<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Trang chủ </title>
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
<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Chưa nhập tên");return false;}var z =document.forms["form"]["college"].value;if (z == null || z == "") {alert("chưa nhập đại học");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("email không hợp lệ");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("chưa điền mật khẩu");return false;}if(a.length<5 || a.length>25){alert("mật khẩu phải dài từ 5 đến 25 kí tự.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("mật khẩu không khớp.");return false;}}
</script>


</head>

<body>
<div class="header">
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-5">
<span class="logo">WEB TRẮC NGHIỆM TRỰC TUYẾN</span></div>
<div class="col-md-2 col-md-offset-4">
</div>
<!--modal đăng nhập-->
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


<!--  nhập Password -->
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
    </div>>
  </div>
</div>


</div>
</div>

<div class="bg5">
<div class="row">

<div class="col-md-4"></div>
<div class="col-md-4 panel">
<!-- đăng kí -->  
  <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
<fieldset>


<!-- nhập tên-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Nhập tên" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- giới tính-->
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Nhập giới tính" class="form-control input-md" >
   <option value="Male">Giới tính</option>
  <option value="M">Nam</option>
  <option value="F">Nữ</option> </select>
  </div>
</div>

<!-- Đại học-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="college" name="college" placeholder="Nhập tên đại học" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- email-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Nhập email" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- điện thoại-->
<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>  
  <div class="col-md-12">
  <input id="mob" name="mob" placeholder="Nhập số điện thoại" class="form-control input-md" type="number">
    
  </div>
</div>


<!-- password-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Nhập mật khẩu" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Xác nhận mật khẩu" class="form-control input-md" type="password">
    
  </div>
</div>
<?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
<!-- nút đăng kí -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-6"> 
    <input  type="submit" class="sub" value="Đăng kí" class="btn btn-primary" />
  </div>
  <div class="col-md-6"> 
     <a href="#" data-toggle="modal" data-target="#myModal"><input  type="submit" class="sub" value="Đăng nhập" class="btn btn-primary" /></a>
  </div>
</div>

</fieldset>
</form>
</div>
</div></div>
</div><!-- kết thúc container-->

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
        <h4 class="modal-title" style="font-family:'Times New Roman' "><span style="color:blue">Phát triển</span></h4>
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
<input type="password" name="password" maxlength="15" placeholder=" nhập mật khẩu" class="form-control"/>
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
