<?php
include_once "config.php";
include_once "mysql.class.php";
$db = new Mysql($db_host,$db_user,$db_pass,$db_name);

 $search=array();
switch ($_GET['a']) {
  case 'del':


  $request=$db->delete("comment","id={$_GET['id']}", $url = '');
   if($request){
        echo "<script>alert('ok');location='main.php';</script>";
  }
  break;


  case 'search':
  $db->query("select * from comment where title like '%{$_GET['q']}%'");
 //echo "select * from comment where title like '%{$_GET['q']}%'";
  $search=$db->fetch_assoc(); 
  if(!$search){
    exit("<script>alert('error');history.go(-1);</script>");
  }
  break;

  case 'details':
  $db->query("select * from comment where id='{$_GET['id']}'");
  $details=$db->fetch_assoc(); 
  break;

}



if(!empty($_POST['submit'])){

  if($_POST['title']=='' || $_POST['writer']==''  || $_POST['comment']=='' )
  {
    echo "<script>alert('error');history.go(-1)</script>";
    exit;
  }
  $request=$db->query("INSERT INTO comment
VALUES ('','{$_POST['title']}','{$_POST['writer']}','{$_POST['score']}','{$_POST['type']}','{$_POST['comment']}')");
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
<meta name="description" content="book comment">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main.css">
<style type="text/css">

 .submitControl{position:relative;margin-top:-220px;}
#preview{width:200px;height:190px;border:1px solid #000;overflow:hidden;}
#imghead {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);}

.star_score { width:160px; height:21px;  position:relative; }
.star_score a{ height:21px; display:block; text-indent:-999em; position:absolute;left:0;}

#starttwo .star_score { background:url(img/starky.png);}
#starttwo .star_score a:hover{ background:url(img/starsy.png);left:0;}
#starttwo .star_score a.clibg{ background:url(img/starsy.png);left:0;}

</style>
<script src="js/main.js" ></script>
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/startScore.js"></script>
<script type="text/javascript">
function previewImage(file)
        {
          var MAXWIDTH  = 260; 
          var MAXHEIGHT = 180;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        } 
$(function () {
                $("select").bind("change", function () {
                    
                        $(this).css("background-color", "blue");
                     $(this).css("color", "white");
                })
            });
  </script>
<script type="text/JavaScript">
var i = 0;
 function addRow(){

  $('form1').submit();
/*  var tabEle = document.getElementById("tab_1");
  var addTr = tabEle.insertRow();
  addTr.setAttribute("id", "tr_"+i);
  
  var td_1 = addTr.insertCell();
  td_1.setAttribute("id", "td_"+i+"_1");
  var td_2 = addTr.insertCell();
  td_2.setAttribute("id", "td_"+i+"_2");
  var td_3 = addTr.insertCell();
  td_3.setAttribute("id", "td_"+i+"_3");
  var td_4 = addTr.insertCell();
  td_4.setAttribute("id", "td_"+i+"_4");
  var td_5 = addTr.insertCell();
  td_5.setAttribute("id", "td_"+i+"_5");
   var td_6 = addTr.insertCell();
  td_6.setAttribute("id", "td_"+i+"_6");
  td_1.innerHTML=$("#title1").attr("value");
  td_2.innerHTML=$("#writer1").attr("value");
  td_3.innerHTML=$("#starttwo").attr("value");
 td_4.innerHTML=$("#select1").attr("value");
  td_5.innerHTML=$("#textarea1").attr("value");
  
  td_6.innerHTML="<div style='width:60px;'><button  onclick='deleteRow("+i+");'>Delete</button></div>";
  i++;
   var mychar = document.getElementById("welcome");
        mychar.style.display="none";
  var mychar2 = document.getElementById("showFind");
        mychar2.style.display="none";
  var mychar3 = document.getElementById("writeComment");
        mychar3.style.display="none";
  var mychar4 = document.getElementById("powerSwitch");
        mychar4.style.display="block";
  
  var mychar6 = document.getElementById("bookcomment");
        mychar6.style.display="none"; */
 }
 
 
 function deleteRow(index){
  /*var tabEle = document.getElementById("tab_1");
  var currentRow = document.getElementById("tr_"+index);
  tabEle.deleteRow(currentRow.rowIndex);*/
 }
  

</script>
</head>
<body onLoad="bodyLoad()">
<!-- SITE-HEADER -->
<div class="groupid">Group-13</div>
<div class="outline"><span class="out">Main</span><span class="line">Functions</span></div>
<div id="date"></div>
<div  class="main1" >
  <h1 class="GBook">GBook</h1>
  <div class="nav">
    <ul>
      <li><a href="#" onClick="Find()" id="rank"></a></li>
      <li><a href="#" onClick="Display()" id="search"></a></li>
     <!--  <li><a href="#" onClick="Power()" id="write"></a></li> -->
      <li><a href="/main.php" id="write"></a></li>
    </ul>
  </div>


  <div class="mainpage1">
    <div id="welcome"><?php echo $_SESSION['username'];?></div>
    <div id="showFind"> </div>
    <div id="writeComment"> 
  <div class="bg-div">
  <div class="search-box">
  <div class="logo"></div>



   
    <form class="search-form" action="" id="search-form" method="get">
      <input type="text" class="search-text" name="q" id="search_input" autocomplete="off"/>
      <input type="hidden" name="a" value="search">
      <input type="submit" class="search-button" value=""/>
    </form>

  </div>
 </div>

 <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
 <script>
 $('#search_input').bind('keyup',function(){
  var jqueryInput = $(this);
  var searchText = jqueryInput.val();
  $.get('http://api.bing.com/qsonhs.aspx?q='+searchText);
 });
$('#search-suggest').css({
  top:$('#search-form').offset().top+$('#search-form').height()+10,
  left:$('#search-form').offset().left
}).show();

 </script>
 </div>


 <style>
  #powerSwitch{display: block;}
</style>

    <?php
   if($search){
    //print_r($search);
    $row=$search;
    ?>
   
   <style>
  #powerSwitch{display: none;}
</style>
   <div class="search"> 
 <TABLE id="tab_1" cellSpacing=1 cellPadding=0 width=780 border=0>
        <TR id="tr_head" >
          <TD bgColor=#e3e3e3 ><STRONG>Title</STRONG></TD>
          <TD bgColor=#e3e3e3><STRONG>Writer</STRONG></TD>
          <TD bgColor=#e3e3e3><STRONG>Score</STRONG></TD>
          <TD bgColor=#e3e3e3><STRONG>Type</STRONG></TD>
          <TD bgColor=#e3e3e3 width="350px"><STRONG>Comment</STRONG></TD>
          <TD bgColor=#e3e3e3 width="50px"><STRONG>Opeartion</STRONG></TD>
        <TR>


   
        <tr>  
               <td bgColor=#e3e3e3 ><?php echo $row['title']?></td>
               <td bgColor=#e3e3e3 ><?php echo $row['writer']?></td>
               <td bgColor=#e3e3e3 ><?php echo $row['score']?></td>
               <td bgColor=#e3e3e3 ><?php echo $row['type']?></td>
               <td bgColor=#e3e3e3 ><a href="?a=details&id=<?php echo $row['id']?>"><?php echo substr($row['comment'],0,50)?></a></td>
               <td bgColor=#e3e3e3 ><a href="?a=del&id=<?php echo $row['id']?>">DEL</a></td>
              
        </tr>
       




      </table>

   </div>
   <?php
        }
   ?>




    <?php
 if($details){
  $row=$details;
    ?>
    <style>
  #powerSwitch{display: none;}
</style>
  
   <div class="details" style="background:#fff;">  
          <?php
                echo $row['comment'];
          ?>
           <div style="padding:20px;">
             <a href="javascript:history.go(-1);">back</a>
           </div>
   </div>
   <?php
        }
   ?>






    <div id="powerSwitch">
      <div  ><a href="#" onClick="AddBook()"><img src="img/1-140105141414.jpg"></a><span id="textAddbookcomment">Add book comment</span></div>


      <TABLE id="tab_1" cellSpacing=1 cellPadding=0 width=780 border=0>
        <TR id="tr_head" >
          <TD bgColor=#e3e3e3 ><STRONG>Title</STRONG></TD>
          <TD bgColor=#e3e3e3><STRONG>Writer</STRONG></TD>
          <TD bgColor=#e3e3e3><STRONG>Score</STRONG></TD>
          <TD bgColor=#e3e3e3><STRONG>Type</STRONG></TD>
          <TD bgColor=#e3e3e3 width="350px"><STRONG>Comment</STRONG></TD>
          <TD bgColor=#e3e3e3 width="50px"><STRONG>Opeartion</STRONG></TD>
        <TR>


      <?php
            $db->findall("comment"); 
            //$request=$db->fetch_assoc();
            while ($row = $db->fetch_assoc()) { 
              //print_r($row);
      ?>
        <tr>  
               <td bgColor=#e3e3e3 ><?php echo $row['title']?></td>
               <td bgColor=#e3e3e3 ><?php echo $row['writer']?></td>
               <td bgColor=#e3e3e3 ><?php echo $row['score']?></td>
               <td bgColor=#e3e3e3 ><?php echo $row['type']?></td>
               <td bgColor=#e3e3e3 ><a href="?a=details&id=<?php echo $row['id']?>"><?php echo substr($row['comment'],0,50)?></a></td>
               <td bgColor=#e3e3e3 ><a href="?a=del&id=<?php echo $row['id']?>">DEL</a></td>
              
        </tr>
        <?php
        }
        ?>




      </table>
   
  </div>






<form action="" method="post" name="form1" id="form1">
    <div id="bookcomment">
      <div><span>
        <button onClick="Power()" id="textClose">Close</button>
        </span><span>
        <button onClick="addRow()" id="textPush">Push</button>
      
        </span></div>




      <div id="bookcomment1">
        <div id="bookimg">
          <div id="preview"> <img id="imghead" border=0 src="img/head_180.jpg" width="180" height="180" /> </div>
          <input type="file" onChange="previewImage(this)" />
        </div>


        <div id="bookcomment2">
          <div id="textTitle">
            <input type="text" name="title"  placeholder="TITLE" id="title1" autocomplete="off"/>
          </div>
          <div id="textWriter">
            <input type="text" name="writer"  placeholder="WRITER" id="writer1" autocomplete="off"/>
          </div>
        </div>
      </div>
      <hr />
      <div class="simplefunction">
        <div><span id="score" style="color:#FF0000;">Score:</span>
          <div class="content1">
            <div id="starttwo" class="block clearfix">
              <div  class="star_score"></div>
            </div>
            <input type="hidden" name="score" id="score_value">
            <script>
     
     scoreFun($("#starttwo"),{
         fen_d:22,
         ScoreGrade:5
     })
    </script>
          </div>
        </div>
        <br>
        <div>


          
            <span id="textType" style="color:#FF0000">Type:</span>
            <select name="type" style="width:220px;height:40px;font-size:18px;" id="select1" >
              <option value="Literature">Literature</option>
              <option value="Social">Social</option>
              <option value="Life">Life</option>
              <option value="Management">Management</option>
              <option value="Technology">Technology</option>
              <option value="Popular">Popular</option>
            </select>
            <script>
    $(function(){
      $('select').searchableSelect();
    });
  </script>
  <input type="hidden" name="submit" value="submit">
          </form>





        </div>
        <br>
        <div><span id="comment" style="color:#FF0000;">Comment:</span><br>
          <textarea rows="10" cols="50" id="textarea1" name="comment">
      Here you can write the detail comment and introduce~~</textarea>
        </div>



      </div>
    </div>
  </div>
</div>
</body>
</html>
