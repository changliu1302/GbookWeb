function check(){
 var user = "user", password = "123456";
 var temUser = document.form1.username.value;
 var temPassword = document.form1.password.value;
 if(user==temUser && password==temPassword)
{
 alert("success!");
location.href="main.html";
}
 else{ 
   alert("password or username is wrong!")
  }
}
  function bodyLoad(){

         var dateTime=new Date();
         var hh=dateTime.getHours();
         var mm=dateTime.getMinutes();
         var ss=dateTime.getSeconds();
   document.getElementById("date").innerHTML=hh+":"+mm+":"+ss ;
 setTimeout(bodyLoad,1000);
   }
