<div class="container show-data">
   <table class="admin-table">
      <caption class="table-caption">Object List</caption>
         <tr>
               <th class="id">ID</th>
               <th class="thumbnail">Thumbnail</th>
               <th class="title">Title</th>
               <th class="status">Status</th>
               <th class="data-time">Time</th>
               <th class="action">Action</th>
         </tr>

         <?php
            // Count number of rows
            $sql = "SELECT * FROM table01";
            $res = mysqli_query($conn, $sql) or die('Error: '.mysqli_error($conn));
            $count_all = mysqli_num_rows($res);
            
            // Determine data per page and number of pages
            $object_per_page = 5;
            $num_of_page = ceil($count_all/$object_per_page);
      
            if(!isset($_GET['page'])) {
               $page=1;
            } else {
               $page  = $_GET['page'];
            }
            
            $page_start_object = ($page-1)*$object_per_page;

            // Retrieve data
            $sql = "SELECT * FROM table01 LIMIT ".$page_start_object.",".$object_per_page;
            $res = mysqli_query($conn, $sql) or die('Error: '.mysqli_error($conn));

            // Check queries working or not
            if ($res==TRUE)
            {
               // Count rows (also to check if table has data)
               $count = mysqli_num_rows($res);   //Function to get all rows in database

               if($count>0)
               {// Has data
                  $idcnt = 0;
                  while($row=mysqli_fetch_assoc($res))
                  {
                     $idcnt++;
                     //If there's still data, the code will continue to fetch
                     $id = $row['id'];
                     $title = $row['title'];
                     $description = $row['description'];
                     $image = $row['image'];
                     $status = $row['status'];
                     $create_time = $row['create_at'];
                     $update_time = $row['update_at'];
                     ?>
                        <tr>
                           <td><?php echo $idcnt; ?></td>
                           <td>
                              <?php
                                 if($image!='')
                                 {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>/img/<?php echo $image ?>" width="150px">
                                    <?php
                                 }
                                 else
                                 {
                                    echo "No image";
                                 }
                              ?>
                           </td>

                           <td><?php echo $title; ?></td>
                           <td><?php if ($status==1){ echo "Enabled";}
                                    else {echo "<span class='red-text'>Disabled</span>";}
                           ?></td>
                           <td>
                              <p class="time-header">Created at:</p>
                              <p class="time-txt"><?php echo $create_time; ?></p><br>
                              <p class="time-header"> Updated at:</p>
                              <p class="time-txt"><?php echo $update_time; ?></p>
                           </td>
                           <td>
                              <a href="<?php echo SITEURL; ?>/manager/show-object.php?id=<?php echo $id; ?>" style="color:blue;">Show</a> |
                              <a href="<?php echo SITEURL; ?>/manager/edit-object.php?id=<?php echo $id; ?>" style="color:blue;">Edit</a> |
                              <a href="<?php echo SITEURL; ?>/manager/delete-object.php?id=<?php echo $id; ?>" style="color:red;">Delete</a>
                              </td>
                        </tr>
                     <?php
                  }
               }
            }

         ?>
   </table>
</div>