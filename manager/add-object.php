<!-- Navbar -->
<?php include('partial/navbar.php') ?>

<section class="main content">
   <div class="container">
         <p style="font-size:25px; font-weight: bold;">Add object</p>
   </div>

   <div class="container">
      <a href="index.php" class="add-new toprightbtn">
         Back
      </a>
   </div>

   <div class="container">
      <!-- Add-object form -->
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="addtbl">
               <tr>
                  <td>Title:</td>
                  <td>
                     <input type="text" name="title" placeholder="Object Title" class="txt-input">
                  </td>
               </tr>
               <tr>
                  <td>Description:</td>
                  <td>
                     <textarea name="description" placeholder="Description" class="des-input"></textarea>
                  </td>
               </tr>
               <tr>
                  <td>Image:</td>
                  <td>
                     <input type="file" name="image">
                  </td>
               </tr>
               <tr>
                  <td>Status:</td>
                  <td>
                     <select name="status" class="choose-status">
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td colspan="2">
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
               $title = $_POST['title'];
               $description = $_POST['description'];
               $create_time = $time;
               $update_time = $time;
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
               $sql = "INSERT INTO table01 SET
                  title='$title',
                  description='$description',
                  image='$image',
                  status='$status',
                  create_at=now(),
                  update_at=now()";
               // $conn = mysqli_connect('localhost','root','') or die('Error: ' . mysqli_error($conn));;
               // $db_select = mysqli_select_db($conn,'php_exercise') or die('Error: ' . mysqli_error($conn));;
               
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