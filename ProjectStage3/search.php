<?php
$title = "Search"; 
include 'includes/header.php';
?>

	<?php include 'includes/nav.php'?>

<?php
require_once('includes/config.php');
require_once('includes/dbcontroller.php');
$db = new DbController();
$db->dbConnect(HOST,USER,PASS,DB);

$search = "%".$_POST['search']."%";

$sql = "SELECT * FROM tourism WHERE tourism_name LIKE ? OR tourism_description LIKE ?";

$results = $db->searchQuery($sql, $search);

if($results){
?>
		<main class="card-wrap">
			<div style="margin-left: auto;">
<?php
    foreach ($results as $key => $val) {
?>
				<section>
					<img src="images/<?= $val['file_name'] ?>" alt="<?= $val['tourism_name'] ?>" width="300" height="180">
					<p><?= $val['tourism_location'] ?></p>
					<h2><?= $val['tourism_name'] ?></h2>
					<p><a href = 'details.php?id=<?= $val['tourism_id'] ?>'>Read More</a></p>
				</section>
<?php
    }
?>
			</div>
		</main>
<?php
} else{
	echo "<h2> No record matches found </h2>";
}
?>
	<?php include 'includes/footer.php'?>
</html>