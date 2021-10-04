<?php
   include('../config/constants.php');

   // Get ID of the object needed to be delete
   $id = $_GET['id'];

   // Queries to delete the object (data)
   $sql = "DELETE FROM table01 WHERE id=$id";

   // Execute the queries
   $res = mysqli_query($conn,$sql);

   // Check if object was deleted
   if($res == TRUE)
   {
      // echo "SUCCESS!";
      // Create session to display message
      $_SESSION['delete'] = "Successfully deleted!";
      // Redirect to manager site
      header('location:'.SITEURL.'/manager/index.php');
   }
   else
   {
      // echo "Something went wrong.";
      // Create session to display message
      $_SESSION['delete'] = "Failed to delete. Try again.";
      // Redirect to manager site
      header('location:'.SITEURL.'/manager/index.php');
   }

   

?>