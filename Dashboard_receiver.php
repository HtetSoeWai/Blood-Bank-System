<?php session_start(); ?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
  <link rel="stylesheet" href="dashboard_style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    table,th,td{
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;

      
    }
    
    td{
      padding: 20px;
      
    }
    table{
      margin-left: 38px;


    }
    #tt{
      height: 50px;
      background-color: #0A2558;
      color: white;
      font-size: 15px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Blood Bank Admin Panel</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="Dashboard.php" >
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="Dashboard_donor.php">
          <i class='bx bx-box' ></i>
          <span class="links_name">Donor List</span>
        </a>
      </li>
      <li>
        <a href="Dashboard_receiver.php" class="active">
          <i class='bx bx-list-ul' ></i>
          <span class="links_name">Receiver List</span>
        </a>
      </li>
      <li>
        <a href="Dashboard_bloodbank.php">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="links_name">Blood Bank</span>
        </a>
      </li>
      <li>
          <a href="Dashboard_blood.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Blood</span>
          </a>
        </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span >Receiver List</span>
      </div>
      
      
    </nav>

    <br><br><br><br>

    <?php 
    if(isset($_SESSION["noblood"])){
      echo  $_SESSION['noblood'];
      session_destroy();
      
    }
    if (isset($_SESSION['receive'])) {
      echo $_SESSION["receive"];
      session_destroy();
      
    }
    ?>
    <table style="overflow-y: auto;">
      <tr id="tt">
        <th>Id</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Blood</th>
        <th>Address</th>
        <th>Date</th>
        <th>About</th>
        <th>Action</th>
      </tr>
      <?php
      $conn=mysqli_connect("localhost","root","","mydb");
      $result=mysqli_query($conn,"call view_receiver_list()");

      if(mysqli_num_rows($result)>0)
      {
        while($row=mysqli_fetch_assoc($result)){ ?>
          <tr>
            <td><?php echo $row["receiver_id"]; ?></td>
            <td><?php echo $row["receiver_name"]; ?></td>
            <td><?php echo $row["receiver_phone"]; ?></td>
            <td><?php echo $row["receiver_email"]; ?></td>
            <td><?php echo $row["receiver_age"]; ?></td>
            <td><?php echo $row["receiver_gender"]; ?></td>
            <td><?php echo $row["receiver_blood"]; ?></td>
            <td><?php echo $row["receiver_address"]; ?></td>
            <td><?php echo $row["receiver_date"]; ?></td>
            <td><?php echo $row["receiver_about"]; ?></td>
            <td>
              <form action="update_bank.php" method="post">

                <input type="hidden" name="id" value=<?php echo $row["receiver_id"]; ?>>
                <input type="hidden" name="blood" value=<?php echo $row["receiver_blood"]; ?>>
                <input type="hidden" name="about" value=<?php echo $row["receiver_about"]; ?>>
                <input type="submit" name="update" value="read">
              </form>
            </td>

          <?php }
        }

        ?>
      </table> 
    </section>

    <script>
     let sidebar = document.querySelector(".sidebar");
     let sidebarBtn = document.querySelector(".sidebarBtn");
     sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
      }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

</body>
</html>

