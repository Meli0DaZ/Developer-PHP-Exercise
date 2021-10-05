<div class="container page-change">
   <div class="num-of-obj">
      <?php 
         if(isset($_POST["obj-per-page"])){
            $_SESSION['num_page'] = $_POST["obj-per-page"];
         }
      ?>
      <span>Pages: </span>
      <form action="" method="POST">
         <select name="obj-per-page" onchange="this.form.submit()">
            <option value="5" <?php if (isset($_SESSION['num_page']) && $_SESSION['num_page']=="5") echo "selected";?>>5</option>
            <option value="10" <?php if (isset($_SESSION['num_page']) && $_SESSION['num_page']=="10") echo "selected";?>>10</option>
            <option value="15" <?php if (isset($_SESSION['num_page']) && $_SESSION['num_page']=="15") echo "selected";?>>15</option>
            <option value="20" <?php if (isset($_SESSION['num_page']) && $_SESSION['num_page']=="20") echo "selected";?>>20</option>
         </select>      
      </form>
      <?php 
            include('change_sm.php');
      ?>
   </div>

   <div class="pagination">
      <table class="pages">
         <tr>
            <td><a href="index.php?page=1"><<</a></td>
            <?php
               for ($page=1;$page<=$num_of_page;$page++) {
                  echo '<td><a href="index.php?page='.$page.'">'.$page.'</a></td>';
               }
            ?>
            <td><?php echo '<a href="index.php?page='.$num_of_page.'">>></a>'; ?></td>
         </tr>
      </table>
   </div>
</div>

