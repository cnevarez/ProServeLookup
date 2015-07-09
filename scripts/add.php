<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
  $clientName = $_POST['clientName']; 
  $projectId = $_POST['projectId'];
  $projectName = $_POST['projectName']; 
 $workflow = "upload/" . $_FILES["workflow"]["name"];
$sheet = "upload/sheets/" . $_FILES["sheet"]["name"];
$other = $_POST['otherclientName']; 

if($clientName == "other"){
	$clientName = $other;
}


$sql = "INSERT INTO projects (`projectId`, `projectName`, `clientName`, `workflow`, `sheet`) VALUES ('".$projectId."', '".$projectName."', '".$clientName."', '".$workflow."', '".$sheet."');";

require("connect.php");
 // Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
	  mysqli_query($con,$sql); 
	  echo "This project has been added<br/><strong>Client Name:".$clientName;
	  $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf","xlsx");
$temp = explode(".", $_FILES["workflow"]["name"]);
$extension = end($temp);

if ((($_FILES["workflow"]["type"] == "image/gif")
|| ($_FILES["workflow"]["type"] == "image/jpeg")
|| ($_FILES["workflow"]["type"] == "image/jpg")
|| ($_FILES["workflow"]["type"] == "image/pjpeg")
|| ($_FILES["workflow"]["type"] == "image/x-png")
|| ($_FILES["workflow"]["type"] == "image/png")
|| ($_FILES["workflow"]["type"] == "application/pdf")
|| ($_FILES["workflow"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
&& ($_FILES["workflow"]["size"] < 2000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["workflow"]["error"] > 0) {
    echo "Return Code: " . $_FILES["workflow"]["error"] . "<br>";
  } else {
    echo "<strong>Upload:</strong> " . $_FILES["workflow"]["name"] . "<br>";
    echo "<strong>Type:</strong> " . $_FILES["workflow"]["type"] . "<br>";
    echo "<strong>Size:</strong> " . ($_FILES["workflow"]["size"] / 1024) . " kB<br>";
    if (file_exists("upload/" . $_FILES["workflow"]["name"])) {
      echo $_FILES["workflow"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["workflow"]["tmp_name"],
      "upload/" . $_FILES["workflow"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["workflow"]["name"];
    }
  }
} else {
  echo "Invalid file";
}
	$temp2 = explode(".", $_FILES["sheet"]["name"]);
$extension2 = end($temp2);

if ((($_FILES["sheet"]["type"] == "image/gif")
|| ($_FILES["sheet"]["type"] == "image/jpeg")
|| ($_FILES["sheet"]["type"] == "image/jpg")
|| ($_FILES["sheet"]["type"] == "image/pjpeg")
|| ($_FILES["sheet"]["type"] == "image/x-png")
|| ($_FILES["sheet"]["type"] == "image/png")
|| ($_FILES["sheet"]["type"] == "application/pdf")
|| ($_FILES["sheet"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
&& ($_FILES["sheet"]["size"] < 2000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["sheet"]["error"] > 0) {
    echo "Return Code: " . $_FILES["sheet"]["error"] . "<br>";
  } else {
    echo "<strong>Upload:</strong> " . $_FILES["sheet"]["name"] . "<br>";
    echo "<strong>Type:</strong> " . $_FILES["sheet"]["type"] . "<br>";
    echo "<strong>Size:</strong> " . ($_FILES["sheet"]["size"] / 1024) . " kB<br>";
    if (file_exists("upload/sheets/" . $_FILES["sheet"]["name"])) {
      echo $_FILES["sheet"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["sheet"]["tmp_name"],
      "upload/sheets/" . $_FILES["sheet"]["name"]);
      echo "Stored in: " . "upload/sheets/" . $_FILES["sheet"]["name"];
    }
  }
} else {
  echo "Invalid file";
}

  }
?>
</body>
</html>