
function Find(){
	var mychar = document.getElementById("welcome");
        mychar.style.display="none";
	var mychar2 = document.getElementById("showFind");
        mychar2.style.display="block";
	var mychar3 = document.getElementById("writeComment");
        mychar3.style.display="none";
	var mychar4 = document.getElementById("powerSwitch");
        mychar4.style.display="none";

		var mychar6 = document.getElementById("bookcomment");
        mychar6.style.display="none";		
	}
function Display(){
	var mychar = document.getElementById("welcome");
        mychar.style.display="none";
	var mychar2 = document.getElementById("showFind");
        mychar2.style.display="none";
	var mychar3 = document.getElementById("writeComment");
        mychar3.style.display="block";
	var mychar4 = document.getElementById("powerSwitch");
        mychar4.style.display="none";
		
			var mychar6 = document.getElementById("bookcomment");
        mychar6.style.display="none";
	}
function Power(){
	var mychar = document.getElementById("welcome");
        mychar.style.display="none";
	var mychar2 = document.getElementById("showFind");
        mychar2.style.display="none";
	var mychar3 = document.getElementById("writeComment");
        mychar3.style.display="none";
	var mychar4 = document.getElementById("powerSwitch");
        mychar4.style.display="block";
		
			var mychar6 = document.getElementById("bookcomment");
        mychar6.style.display="none";
	}
function Reset(){
	var mychar = document.getElementById("welcome");
        mychar.style.display="none";
	var mychar2 = document.getElementById("showFind");
        mychar2.style.display="none";
	var mychar3 = document.getElementById("writeComment");
        mychar3.style.display="none";
	var mychar4 = document.getElementById("powerSwitch");
        mychar4.style.display="none";

		var mychar6 = document.getElementById("bookcomment");
        mychar6.style.display="none";
	}
 function bodyLoad(){

         var dateTime=new Date();
         var hh=dateTime.getHours();
         var mm=dateTime.getMinutes();
         var ss=dateTime.getSeconds();
   document.getElementById("date").innerHTML=hh+":"+mm+":"+ss ;
 setTimeout(bodyLoad,1000);
      
     
        
   }
 function AddBook(){
	 var mychar = document.getElementById("welcome");
        mychar.style.display="none";
	var mychar2 = document.getElementById("showFind");
        mychar2.style.display="none";
	var mychar3 = document.getElementById("writeComment");
        mychar3.style.display="none";
	var mychar4 = document.getElementById("powerSwitch");
        mychar4.style.display="none";

	var mychar6 = document.getElementById("bookcomment");
        mychar6.style.display="block";	
		
	 }
