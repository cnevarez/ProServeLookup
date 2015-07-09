<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProServ LookUp</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="og:type" content="website">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootswatch/3.1.1/cosmo/bootstrap.min.css" />
<style>
.rz-video {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.rz-video iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
th, td {
	padding-right: 35px;
}
body {
	background-image: url("http://mindfirestudio.appspot.com/static/images/bg_main.jpg");
	background-repeat: no-repeat;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
.container {
	background-image:url(https://dl.dropboxusercontent.com/u/73788087/public%20web/whitebgd.png);
	padding-top:150px;
	padding-bottom:150px;
}
</style>
<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script>
function showUser(str,div,page)
{
if (str=="")
  {
  document.getElementById(div).innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(div).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET", page+"?name="+str,true);
xmlhttp.send();
}
$(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        nextEffect  : 'none',
        prevEffect  : 'none',
        padding     : 20,
        margin      : [20, 60, 20, 60] // Increase left/right margin
    });
</script>
<style>
.fancybox-type-iframe .fancybox-nav {
	width: 60px;
}
.fancybox-type-iframe .fancybox-nav span {
	visibility: visible;
	opacity: 0.5;
}
.fancybox-type-iframe .fancybox-nav:hover span {
	opacity: 1;
}
.fancybox-type-iframe .fancybox-next {
	right: -60px;
}
.fancybox-type-iframe .fancybox-prev {
	left: -60px;
}
#logo{
	position: fixed;
    top: 1em;
}
#footer{
	  position:fixed !important;
    position: absolute; /*ie6 */
    bottom: 0;
	color:#000;
	width:100%;
	height:100px;
	background-image:url(https://dl.dropboxusercontent.com/u/73788087/public%20web/whitebgd.png);
}
</style>
</head>

<body>
<div class="container" id="container" >
  <div class="row">
    <div class="col-md-12">
      <div  id="logo">
        <p style="text-align: center;"><img src="https://s3-us-west-1.amazonaws.com/mfimarketing/0/mindfirestudio-logo-200x50.png"/><br/>
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label>Please search for the project you are looking fo by client Name:
          <select name="salesRep" onchange="showUser(this.value,'content','scripts/projects.php');">
            <option selected="selected">--Select--</option>
            <?php menu(); ?>
          </select>
        </label>
        <button class="fancybox fancybox.iframe btn btn-primary"  href="scripts/form.php"> Add+</button><br/><br/><br/><br/>
        <center><div id="content"> </div></center>
      </div>
      <?php
function menu(){
 // Connects to your Database 
require("scripts/connect.php");
 // Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
	   //Puts SQL Data into an array
		 $data = mysqli_query($con,"SELECT DISTINCT clientName FROM projects order by clientName asc;"); 
		 
		 //Now we loop through all the data 
		 while($ratings = mysqli_fetch_array( $data )) 
		 { 
		 
		 //This outputs the sites name 
		 echo "<option value='" .$ratings['clientName'] . "'> " .$ratings['clientName'] . "</option>"; 
		 }
  }

	
}
		 ?>
      <br/>
    </div>
  </div>
</div>
  <div id="footer"><center>Powered by Chris Nevarez &copy; 2015</center></div>
</body>
</html>