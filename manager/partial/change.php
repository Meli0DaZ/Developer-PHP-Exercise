<div class="container page-change">
   <div class="num-of-obj">
      <span>Pages: </span>
      <select name="obj-per-page">
         <option value="5">5</option>
         <option value="15">15</option>
         <option value="25">25</option>
         <option value="50">50</option>
      </select>
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