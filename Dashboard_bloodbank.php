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
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 5px;
        padding-bottom: 5px;
        
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
          <a href="Dashboard_receiver.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Receiver List</span>
          </a>
        </li>
        <li>
          <a href="Dashboard_bloodbank.php" class="active">
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
        <span >Blood Bank</span>
      </div>
     
     
    </nav>

    <br><br><br><br>

  <table style="overflow-y:auto">
    <tr id="tt">
      <th>Blood_id</th>
      <th>Donor_id</th>
      <th>Blood_type</th>
      <th>Receiver_id</th>
      <th>Donation_date</th>
      <th>Receive_date</th>
    </tr>
    <?php
    $conn=mysqli_connect("localhost","root","","mydb");
    // stored procedure view_blood_bank
    $result=mysqli_query($conn,"call view_blood_bank()");

    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $row["blood_id"]; ?></td>
          <td><?php echo $row["donor_id"]; ?></td>
          <td><?php echo $row["blood_type"]; ?></td>
          <td><?php echo $row["receiver_id"]; ?></td>
          <td><?php echo $row["donation_date"]; ?></td>
          <td><?php echo $row["receive_date"]; ?></td>
        </tr> 

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

