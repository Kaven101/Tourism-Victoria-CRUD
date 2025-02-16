<?php
$title = "Delete";
$tourism_id = isset($_GET['id']) ? $_GET['id'] : null;

require_once('includes/config.php');
require_once('includes/dbcontroller.php');
include('includes/header.php');
?>
<?php
if(!$tourism_id) {
	echo 'Error has occurred, please go back.';
	exit;
}

include('includes/nav.php');

$db = new DbController();
$db->dbConnect(HOST,USER,PASS,DB);

$sql = "SELECT * FROM tourism where tourism_id=$tourism_id";
$results = $db->getRecords($sql);
foreach($results as $row) {
    $tourism_id = $row['tourism_id'];
    $tourism_name = $row['tourism_name'];
    $image = $row['file_name'];
    $tourism_description = $row['tourism_description'];
    $tourism_theme = $row['tourism_theme'];
    echo '<form class="main-form" method="post" action="delete.php">';
    echo "<h2 style=\"color: red;\">Are you sure you want to delete this record </h2>";
    echo "<h3>Tourism Name : {$tourism_name}</h3>";
    echo "<h3>Description : {$tourism_description}</h3>";
    echo "<h3>Image Name : {$image}</h3>";
    echo "<img src='images/{$image}' alt='{$tourism_theme}' width='300' height='180' style='margin-left: 60px; margin-top: 10px;' >";
    echo "<p class='confirm mt-3' style='text-align: center;'>";
    $image_name = urlencode("images/{$image}");
    echo "<a href='modify.php' style=\"font-size: 24px; padding: 5px; border: 1px solid; border-color:rgb(48, 103, 18);color:rgb(48, 103, 18); margin-right: 5px;\">Cancel </a>";
    echo "<a href='delete.php?id=$tourism_id&image=$image' style=\"font-size: 24px; padding: 5px; border: 1px solid; border-color:rgb(48, 103, 18); color:rgb(48, 103, 18);\">Delete </a>";
    echo "</p>";
    echo "</form>";
    }
?>
<?php
include('includes/footer.php');
?>
</body>
</html>