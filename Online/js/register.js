
  function bodyLoad(){

         var dateTime=new Date();
         var hh=dateTime.getHours();
         var mm=dateTime.getMinutes();
         var ss=dateTime.getSeconds();
   document.getElementById("date").innerHTML=hh+":"+mm+":"+ss ;
 setTimeout(bodyLoad,1000);
   }


