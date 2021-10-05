<div class="container show-data">
   <table class="admin-table">
      <caption class="table-caption">Product List</caption>
         <tr>
               <th class="id">ID</th>
               <th class="thumbnail">Thumbnail</th>
               <th class="title">Title</th>
         </tr>

         <?php
            session_start();
            // Count number of rows
            $sql = "SELECT * FROM table01";
            $res = mysqli_query($conn, $sql) or die('Error: '.mysqli_error($conn));
            $count_all = mysqli_num_rows($res);
            
            // Determine data per page and number of pages
            include('change_sm.php');
            $object_per_page =  $_SESSION['num_page'];
            // echo $object_per_page;
            
            $num_of_page = ceil($count_all/$object_per_page);
            
      
            if(!isset($_GET['page'])) {
               $page=1;
            } else {
               $page  = $_GET['page'];
            }
            
            $page_start_object = ($page-1)*$object_per_page;

            // Retrieve data
            $sql = "SELECT * FROM table01 WHERE status='1' LIMIT ".$page_start_object.",".$object_per_page;
            $res = mysqli_query($conn, $sql) or die('Error: '.mysqli_error($conn));

            // Check queries working or not
            if ($res==TRUE)
            {
               // Count rows (also to check if table has data)
               $count = mysqli_num_rows($res);   //Function to get all rows in database

               if($count>0)
               {// Has data
                  $idcnt = $page_start_object;
                  while($row=mysqli_fetch_assoc($res))
                  {
                     //If there's still data, the code will continue to fetch
                     $status = $row['status'];
                     if ($status==1){
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $image = $row['image'];
                        $idcnt++;
                        ?>
                           <tr>
                              <td>
                                 <?php echo '<a href="'.SITEURL.'/user/show-object.php?id='.$id.'">';if($status==1){echo $idcnt;}'</a>'; ?>
                              </td>
                              <td><?php
                                 if($status==1)
                                 {
                                    if($image!='')
                                    {
                                       echo '<img src="'.SITEURL.'/img/'.$image.'" width="150px">';
                                    }
                                    else
                                    {
                                    echo "No image";
                                    }
                                 }?>
                              </td>
                              <td><?php if($status==1){echo $title;} ?></td>
                           </tr>
                        <?php
                     }
                  }
               }
            }
         ?>
   </table>
</div>