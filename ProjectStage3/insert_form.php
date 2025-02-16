<?php 
$title = "Insert Form";
include 'includes/header.php';
?>
<?php include 'includes/nav.php'?>
	 <div>
    <form name="frm" method="post" action="insert.php" enctype='multipart/form-data'>
      <h2>Insert a tourist attraction</h2>
      
  <label for="tourism_name">Name</label>
  <input type="text" id="tourism_name" name="tourism_name"><br>

  <label for="tourism_location">Location</label>
  <input type="text" id="tourism_location" name="tourism_location"><br>

      <label for="tourism_theme">Theme</label>
      <input type="text" id="tourism_theme" name="tourism_theme" /><br>
    
      <label for="tourism_description" class="tourism_description">Description</label>
      <textarea
        id="tourism_description"
        name="tourism_description"
        placeholder="Write the description here..."
		required
      ></textarea>
      <br><br>
      <input type="file" name="image" id="file" multiple required>
      <br><br>
      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
  </div>
	<?php include 'includes/footer.php'?>
</html>
