<?php
    $title = "Delete"; 
	$tourism_id = isset($_GET['id']) ? $_GET['id'] : null;
	$image = isset($_GET['image']) ? $_GET["image"] : null;
	if(!$tourism_id || !$image) {
        echo 'Error has occurred, please go back.';
		exit;
	}

    include('includes/header.php');
    include('includes/nav.php');
    require_once('includes/config.php');
    require_once('includes/dbcontroller.php');

    $error=false;
    if(!empty($tourism_id)&&!empty($image)) {

        $db = new DbController();
        $db->dbConnect(HOST,USER,PASS,DB);
        $sql="DELETE FROM tourism where tourism_id=?";
        if($db->deleteRecord($sql,$tourism_id)) {
            echo "<p>Record deleted</p>";
            if(file_exists($image)){
                unlink($image);
            }
        } else {
            $error=true;
        }
    } else {
        $error=true;
    }
    if($error) {
        echo "<p>Record NOT deleted</p>";
    }
    include('includes/footer.php');
?>