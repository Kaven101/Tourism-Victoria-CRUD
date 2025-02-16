<?php 
$title = "Tourism Victoria";
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
}
?>
	<?php include 'includes/footer.php'?>
	</body>
</html>