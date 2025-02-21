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
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Blood Bank Admin Panel</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="Dashboard.php" class="active">
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
        <a href="Dashboard_receiver.php">
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
          <a href="Dashboard_blood.php" >
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
        <span class="dashboard">Dashboard</span>
      </div>
      <div style="float:right; ">
        
        <span ><a href="index.php"><button style="width: 100px;height: 30px;  background-color: #0A2558;color:white;">Logout</button></a></span>
      </div>


    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Blood</div>
            <?php 
            $tot_blood=0;
            $conn=mysqli_connect("localhost","root","","mydb");
            $sql="SELECT * from blood_bank where receiver_id='0'";
            $result=mysqli_query($conn,$sql) or die("query failed.");

            if(mysqli_num_rows($result)>0)
            {
              while($row=mysqli_fetch_assoc($result)){
                $tot_blood++;
              }
            }

            ?>
            <div class="number"><?php echo $tot_blood; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <a href="Dashboard_bloodbank.php"><span class="text">Full Detail</span></a> 
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Donor Pending</div>
            <?php 
            $tot_donor=0;
            $conn=mysqli_connect("localhost","root","","mydb");
            $sql="SELECT * from donor_detail where donor_about='pending'";
            $result=mysqli_query($conn,$sql) or die("query failed.");

            if(mysqli_num_rows($result)>0)
            {
              while($row=mysqli_fetch_assoc($result)){
                $tot_donor++;
              }
            }

            ?>
            <div class="number"><?php echo $tot_donor; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <a href="Dashboard_donor.php">  <span class="text">Full Detail</span></a>

            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Receiver Pending</div>
            <?php 
            $tot_receiver=0;
            $conn=mysqli_connect("localhost","root","","mydb");
            $sql="SELECT * from receiver_detail where receiver_about='pending'";
            $result=mysqli_query($conn,$sql) or die("query failed.");

            if(mysqli_num_rows($result)>0)
            {
              while($row=mysqli_fetch_assoc($result)){
                $tot_receiver++;
              }
            }

            ?>
            <div class="number"><?php echo $tot_receiver; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"><a href="Dashboard_receiver.php">Full Detail</a></span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        
      </div>


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

