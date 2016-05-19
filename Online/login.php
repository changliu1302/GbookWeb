	<?php
include_once "config.php";
include_once "mysql.class.php";
$db = new Mysql($db_host,$db_user,$db_pass,$db_name);
if(!empty($_POST['submit'])){
  $db->query("select * from user where account='{$_POST['username']}' and password='{$_POST['password']}' ");
  $request=$db->num_rows();
  if($request){
         $_SESSION['username']=$_POST['username'];
        echo "<script>alert('ok');location='main.php'</script>";
  }else{
    echo "<script>alert('error');history.go(-1);</script>";
  }
  
  exit;
}
?>
  <!DOCTYPE html>
 <html> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       
        <title>GBook</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
<script src="js/login.js" ></script>
<script src="https://cdn1.lncld.net/static/js/av-mini-0.6.4.js"></script>
    </head>
   
    <body onLoad="bodyLoad()">
      <!-- SITE-HEADER -->
             
                     <div class="groupid">Group-13</div>
                        <div class="outline"><span class="out">Out</span><span class="line">Line</span></div>
     <div id="date"></div>
			                <!-- HOMEPAGE -->
<div  class="main" >
                        <h1 class="bookReview">Gbook</h1>
						<div class="description">
                        <p ><span id="text_now">Now,</span> you can use this website to <span id="text_control">review the books.</spsn></p> 
						<p>It's time to <span id="text_login">log in your account </span>in the form as following to use the specific functions.</p></div></br>
                          <h2>Log in</h2>
      					 </div>
<div class="login"><form id="form1" name="form1" method="post" action="" >
<span id="text_username">Account:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input type="text" id="username" name="username" value="Enter your username" />
<br/>
<br/>
<span id="text_password">Password:</span><span>&nbsp;&nbsp;&nbsp;</span>
<input type="password" id="password" name="password" value="******"/>
<br />
<br/>
<br />
<!-- onClick="check()" -->
<input type="submit" name="submit" value="APPLY" id="apply" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input type="reset" value="RESET" id="reset" />
</form>
<br /><div class="register" onClick="registerPage"><a href="register.html">Register New Account</a>
</div>

</div>



</div>
 
       </body>
	   </html>
      