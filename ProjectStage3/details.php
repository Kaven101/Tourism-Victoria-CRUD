<?php
    require_once('includes/config.php');
    require_once('includes/dbcontroller.php');
    $title = "Details";
    include('includes/header.php');
    include('includes/nav.php');
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $db = new DbController();
        $db->dbConnect(HOST,USER,PASS,DB);
        $sql = "SELECT * FROM tourism WHERE tourism_id=$id";
        $records = $db->getRecords($sql);

        foreach ($records as $row) {
            $name = $row['tourism_name'];
            $image = $row['file_name'];
            $theme = $row['tourism_theme'];
            $desc = $row['tourism_description'];
            echo "<section class= 'details'>";
            echo "<h2> {$name} </h2>";
            echo "<img src='images/{$image} ' alt=' {$theme} ' width='300' height ='180'>";
            echo "<p>{$desc}</p>";
            echo "</section>";
        }
    }
    
    include('includes/footer.php');
?>