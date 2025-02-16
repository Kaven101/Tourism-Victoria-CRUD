<?php
$title = "Contact Us";
include 'includes/header.php';
?>
     <?php include 'includes/nav.php'?>

	 
    <form class="main-form">
      <h2>Contact Us</h2>
      <label for="Fname">First Name:</label>
      <input type="text" id="Fname" name="first_name" />
      <label for="Lname">Last Name:</label>
      <input type="text" id="Lname" name="last_name" />
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" />
      <label for="phone">Phone:</label>
      <input type="text" id="phone" name="phone" />
	  <label for="description">Description</label>
		<textarea id="description" placeholder="Write your enquery here ..."></textarea>
      <input type="submit" class="btn btn-primary" name="submit" value="Submit" >
    </form>
    <?php include 'includes/footer.php'?>
  </body>
</html>
