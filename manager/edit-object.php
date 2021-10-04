<!-- Navbar -->
<?php include('partial/navbar.php') ?>

<?php
   // Get ID of the object needed to be delete
   $id = $_GET['id'];

   // Queries to select the object (data)
   $sql = "SELECT * FROM  table01 WHERE id=$id";

   // Execute the queries
   $res = mysqli_query($conn,$sql);
?>

<section class="edit-object">
   <div class="container">
         <p style="font-size:25px; font-weight: bold;">Edit data</p>
   </div>

   <div class="container">
      <a href="<?php echo SITEURL; ?>/manager/show-object.php?id=<?php echo $id; ?>" class="show-btn" >
         Show
      </a>

      <a href="index.php" class="add-new toprightbtn">
         Back
      </a>
   </div>

   <?php

      // Check if object is available
      if($res == TRUE)
      {
         $count = mysqli_num_rows($res);
         if ($count!=1)
         {
            header('location:'.SITEURL.'/manager');
         }
         else
         {
            $row=mysqli_fetch_assoc($res);
            $title = $row['title'];
            $description = $row['description'];
            $image = $row['image'];
            $status = $row['status'];
         }
         
      }
      else
      {
         // echo "Something went wrong.";
         // Create session to display message
         
      }
   ?>

   <div class="container">
      <!-- Add product form -->
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="addtbl">
               <tr>
                  <td>Title:</td>
                  <td>
                     <input type="text" name="title" value="<?php echo $title; ?>" class="txt-input">
                  </td>
               </tr>
               <tr>
                  <td>Description:</td>
                  <td>
                     <textarea name="description" class="des-input"><?php echo $description; ?></textarea>
                  </td>
               </tr>
               <tr>
                  <td>Image:</td>
                  <td>
                     <input type="file" name="image" value="Image = none">
                  </td>
               </tr>
               <tr>
                  <td>Status:</td>
                  <td>
                     <select name="status" class="choose-status">
                        <?php
                           if($status==1)
                           {
                              echo "<option value='1' select='selected'>Enabled</option>";
                              echo "<option value='0'>Disabled</option>";
                           }
                           else
                           {
                              echo "<option value='0' select='selected'>Disabled</option>";
                              echo "<option value='1'>Enabled</option>";
                           }
                        ?>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td colspan="2">
                     <input type="hidden" name="id" value="<?php echo $id; ?>">
                     <input type="submit" name="submit" value="Submit" class="submit-btn">
                  </td>
               </tr>
            </table>
         </form>

         <?php
            // Submit-button click event
            if(isset($_POST['submit']))
            {
               // echo "Done";
               $id = $_POST['id'];
               $title = $_POST['title'];
               $description = $_POST['description'];
               if($_FILES['image']['name'])
               {
                  // Get image name
                  $image = $_FILES['image']['name'];

                  // Rename image
                  $ext = end(explode('.',$image));
                  $image = str_replace(" ","-",$title).'.'.$ext;

                  // Get image path to get image 
                  $image_path = $_FILES['image']['tmp_name'];

                  // Give a destination to save image
                  $image_destination = "../img/".$image;

                  // Move image to destination (copy)
                  $upload_image = move_uploaded_file($image_path,$image_destination);
                  if($upload_image==FALSE)
                  {
                     die();
                  }
               }
               else
               {
                  $image='';
               }
               if(isset($_POST['status']))
               {
                  $status = $_POST['status'];
               }
               else
               {
                  $status = "1";
               }
               

               // SQL Query to save data to database
               $sql = "UPDATE table01 SET
                  title='$title',
                  description='$description',
                  image='$image',
                  status='$status',
                  update_at=now()
                  WHERE id='$id'
               ";
               // Connect to database, execute SQL queries and save data to database
               $res = mysqli_query($conn, $sql) or die('Error: '.mysqli_error($conn));

               if($res==TRUE)
               {
                  echo "Success";
               }
               else{
                  echo "Failed";
               }
            }
         ?>
   </div>

</section>



<?php include('partial/footer.php') ?>