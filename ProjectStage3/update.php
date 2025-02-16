<?php
$title = "Update";
$tourism_id = isset($_POST['tourism_id']) ? $_POST['tourism_id'] : null;
$tourism_name = isset($_POST['tourism_name']) ? $_POST["tourism_name"] : null;
$tourism_location = isset($_POST['tourism_location']) ? $_POST["tourism_location"] : null;
$tourism_theme = isset($_POST['tourism_theme']) ? $_POST["tourism_theme"] : null;
$tourism_description = isset($_POST['tourism_description']) ? $_POST["tourism_description"] : null;
if(!$tourism_id || !$tourism_name || !$tourism_location || !$tourism_description) {
	echo 'Error has occurred, please go back.';
	exit;
}

require_once('includes/config.php');
require_once('includes/dbcontroller.php');
include('includes/header.php');
include('includes/nav.php');
echo "<div id='message'>";
$error = false;
if (!empty($tourism_id)) {
    $db = new DbController();
    $db->dbConnect(HOST,USER,PASS,DB);
    foreach ($_POST as $key => $val) {
        $$key = trim($val);
    }
    $sql = "UPDATE tourism SET tourism_name=?, tourism_location=?, tourism_theme=?, tourism_description=? WHERE tourism_id=?";
    $update = $db->updateRecord($sql, $tourism_name, $tourism_location,$tourism_theme, $tourism_description, $tourism_id);
    if ($update) {
        echo "<p>Record updated<p>";
    } else {
        $error = true;
    }
} else {
    $error = true;
}
if ($error) {
    echo "<p>Record NOT updated<p>";
}
echo "</div>";
include('includes/footer.php');
?>