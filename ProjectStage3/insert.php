<?php
require_once('includes/config.php');
require_once('includes/dbcontroller.php');
$title = "Insert Record";
$file = isset($_FILES['image']) ? $_FILES["image"] : null;
$tourism_name = isset($_POST['tourism_name']) ? $_POST["tourism_name"] : null;
$tourism_location = isset($_POST['tourism_location']) ? $_POST["tourism_location"] : null;
$tourism_theme = isset($_POST['tourism_theme']) ? $_POST["tourism_theme"] : null;
$tourism_description = isset($_POST['tourism_description']) ? $_POST["tourism_description"] : null;
if(!$file || !$tourism_name || !$tourism_location || !$tourism_theme || !   $tourism_description) {
	echo 'Error has occurred, please go back.';
	exit;
}
 $db = new DbController();
 $db->dbConnect(HOST,USER,PASS,DB);

foreach ($_POST as $key => $val) {
    $$key = $db->cleanUp($val);
}

$temp = $_FILES['image']['tmp_name'];
$image_upload = "images/". $_FILES["image"]["name"];//will place in images folder - must exist with correct permissions
$image = $_FILES["image"]["name"]; //only uploads the file name NOT images/...
$sql = "INSERT INTO tourism(tourism_name,tourism_location,tourism_theme,tourism_description,file_name) VALUES (?,?,?,?,?)";
if ($db->insertQuery($sql, $tourism_name, $tourism_location, $tourism_theme, $tourism_description, $image)) {
    $db->uploadImage($temp, $image_upload);
    echo '
        <script>
            alert("New record successfully inserted into the database");
             location.href = "modify.php";
        </script> ';
} else {
    echo '
        <script>
          alert("Record has not been inserted into the database");
          location.href = "modify.php";
        </script> ';
}
?>