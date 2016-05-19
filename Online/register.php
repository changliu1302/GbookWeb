<?php
include_once "config.php";
include_once "mysql.class.php";
$db = new Mysql($db_host,$db_user,$db_pass,$db_name);
if(!empty($_POST['submit'])){
  $request=$db->query("INSERT INTO user
VALUES ('','{$_POST['username']}','{$_POST['password']}','{$_POST['email']}')");
  if($request){
        echo "<script>alert('ok');history.go(-1);</script>";
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
    <link rel="stylesheet" href="css/register.css">
<script src="js/login.js" ></script>


<script>


AV.initialize('hC2WeytG85KK48TdXt1Pokb5-gzGzoHsz', 'I2cf3cIp39ijQKmmx9SIvJoA');

var user = new AV.User();
$("#register").click(function (e) {
 var user1 = $("#username").val();
    var pwd = $("#password").val();
    
    
    $("#username").val("");
    $("#password").val("");
    
   
    user.set("username", user1);
    user.set("password", pwd);
    user.signUp(null, { 
      success: function(user) {
        $('#regmsg').html("注册成功").show(200).delay(2500).hide(100);
      },
      error: function(user, error) {
        $('#regmsg').html("注册失败<br/>" + error.message).show(200).delay(2500).hide(100);
      }
    });
      
}); 


</script>
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
						<p>It's time to <span id="text_login">register  your account </span>in the form as following to use the specific functions.</p></div><br/>
                          <h2>Register</h2>
      					 </div>
<div class="login"><form id="form1" name="form1" method="post" action="" >
<span id="text_username">Account:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input type="text" id="username" name="username" value="Enter yout username">
<br/>
<br/>
<span id="text_password">Password:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input type="password" id="password" name="password" value="******"/>
<br/>
<br/>
<span id="text_mail">E-mail Address:</span>
<input type="text" id="mail" name="email" value="Enter yout E-mail address">
<br />
<br/>
<br />
<input type="submit" name="submit" value="REGISTER" id="register" onClick="register()"/><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input type="reset" value="RESET" id="reset" />
</form>


</div>



</div>
 
       </body>
	   </html>
      