<?php
$title = "Modify"; 
include 'includes/header.php';
?>
     <?php include 'includes/nav.php'?>

<?php
require_once('includes/config.php');
require_once('includes/dbcontroller.php');
$db = new DbController();
$db->dbConnect(HOST,USER,PASS,DB);

$sql = "SELECT * FROM tourism";

$results = $db->getRecords($sql);
?>
				<table>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Location</th>
							<th>Theme</th>
							<th>Description</th>
							<th>Image</th>
							<th colspan="2">Make Changes</th>
						</tr>
<?php
   foreach($results as $row) {
    $tourism_id = $row['tourism_id'];
	$tourism_name = $row['tourism_name'];
	$tourism_location = $row['tourism_location'];
	$tourism_theme = $row['tourism_theme'];
	$tourism_description = $row['tourism_description'];
    $file_name = $row['file_name'];
   
        echo "<tr>";
        echo "<td> {$tourism_id} </td>";
        echo "<td> {$tourism_name} </td>";
        echo "<td> {$tourism_location} </td>";		
		echo "<td> {$tourism_theme} </td>";
		echo "<td> {$tourism_description} </td>";	
        echo "<td> <img src=images/{$file_name} alt='{$tourism_name}' class='thumb'></td>";
        echo "<td> <a href='update_form.php?id={$tourism_id}' class='link'>Update</a></td>";
        echo "<td> <a href ='delete_confirm.php?id={$tourism_id}' class='link'>Delete</a></td>";
        echo "</tr>";
    }
    echo " </table>";
    include('includes/footer.php');
?>