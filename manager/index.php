   <?php 
      include('../config/generate_db.php');
   ?>
   
   <!-- Navbar -->
   <?php include('partial/navbar.php') ?>

   <?php
      if(isset($_SESSION['delete']))
      {
         // $message = $_SESSION['delete'];
         // echo "<script'>alert('$message');</script>";
         echo $_SESSION['delete'];
      }
   ?>

   <section class="main-content">
      <div class="container">
         <p style="font-size:30px; text-align: center; font-weight: bold;">Manager Site</p>
      </div>

      <!-- Add -->
      <?php include('partial/add.php') ?>

      <!-- Table -->
      <?php include('partial/table.php') ?>

      <!-- Page change -->
      <?php include('partial/change.php') ?>

      <!-- Footer -->
      <?php include('partial/footer.php') ?>
   </section>
   

   

</body>
</html>