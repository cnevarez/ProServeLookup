<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProServ LookUp</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="og:type" content="website">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootswatch/3.1.1/cosmo/bootstrap.min.css" />
</head>

<body>
<div class="form-group">
  <form method="post" action="add.php" enctype="multipart/form-data">
    <label>Client Name:
      <select name="clientName" id="cn" onchange="other();">
        <option selected="selected">--Select--</option>
        <?php menu(); ?>
        <option value="other">Other</option>
      </select>
    </label>
    <div id="otherop" style="display:none;">
      <input type="text" name="otherclientName" placeholder="New Client Name" />
    </div>
    <br/>
    <table>
      <tr>
        <td><label>Project ID:<br/>
            <input type="text" name="projectId" />
          </label></td>
        <td><label>Project Name:<br/>
            <input type="text" name="projectName" />
          </label></td>
      </tr>
      <tr>
        <td><label>Workflow:<br/>
            <input type="file" name="workflow" id="file">
          </label></td>
        <td><label>Handoff Sheet<br/>
            <input type="file" name="sheet" />
          </label></td>
      </tr>
    </table>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script>
function add(){
	document.getElementById('form').style.display = "block";
	
}
function other(){
if(document.getElementById('cn').value == 'other'){
	document.getElementById('otherop').style.display = "inline";
	document.getElementById('otherop').required = true;
}
	else{
		document.getElementById('otherop').style.display = "none";
		document.getElementById('otherop').required = false;
		}
}

</script>
<?php
function menu(){
 // Connects to your Database 
require("connect.php");
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
</body>
</html>