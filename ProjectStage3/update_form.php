<?php 
$title = "Update detail"; 
$tourism_id = isset($_GET['id']) ? $_GET['id'] : null;

require_once('includes/config.php');
require_once('includes/dbcontroller.php');
include('includes/header.php');
$db = new DbController();
$db->dbConnect(HOST,USER,PASS,DB);
$sql = "SELECT * FROM tourism WHERE tourism_id = $tourism_id";
$result = $db->getRecords($sql);
foreach ($result as $row) {
?>
<?php 
if(!$tourism_id) {
	echo 'Error has occurred, please go back.';
	exit;
}
include('includes/nav.php'); 
?>
    <form class="main-form" method="post" action="update.php">
        <h2>Update detail</h2>
        <br>
        <h3>Attraction name </h3>
        <textarea cols="50" rows="1" name="tourism_name"><?php echo $row['tourism_name'] ?></textarea>
        <h3>Location</h3>
        <textarea cols="50" rows="1" name="tourism_location"><?php echo $row['tourism_location'] ?></textarea>
        <input type="hidden" name="tourism_id" value="<?php echo $row['tourism_id'] ?>">
        <h3>Theme </h3>
        <textarea cols="50" rows="1" name="tourism_theme"><?php echo $row['tourism_theme'] ?></textarea>
        <h3>Description </h3>
        <textarea cols="50" rows="3" name="tourism_description"><?php echo $row['tourism_description'] ?></textarea>
        <br>
        <input type="submit" name="submit" value="Update">
    </form>
<?php
}
include('includes/footer.php');
?>
</body>
</html>