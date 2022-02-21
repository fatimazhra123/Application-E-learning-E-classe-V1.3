
<?php
    session_start();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";
// Create connection
$conn =mysqli_connect($servername, $username, $password,$dbname);

echo "connected";

?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="students.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/3a3f417346.js" crossorigin="anonymous" defer></script>
    <title>course</title>


</head >

<body >
    <!-- sid_bar -->

    <?php 
     include 'sidbar2.php';  
     ?>
    <!-- navbar -->

    <div class=" navbar navbar-light  bg-white p-2 col-12  d-flex justify-content-between ">

<img class="econsNav" src="skip-start-circle.svg" alt="econs">
<div class="d-flex ">
    <div class=" d-flex align-items-end justify-content-md-end mt-3 mt-md-0">
        <input class=" rounded form-control form-control-dark me-3 " type="text" placeholder="Search"
            aria-label="Search">
    </div>

    <img src="bell.svg" alt="IMAG">
</div>

<div class=" d-flex main-container.flex-sm-row.flex-column  container bg-light  justify-content-between py-3">
<div >
    <p class="fw-bold "></p>
</div>
<div>
    <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M12.6002 11.375H1.40023C0.157725 11.375 -0.472275 12.8574 0.411475 13.7211L6.01148 19.2211C6.55835 19.7582 7.44648 19.7582 7.99335 19.2211L13.5934 13.7211C14.4684 12.8574 13.8427 11.375 12.6002 11.375ZM7.00023 18.25L1.40023 12.75H12.6002L7.00023 18.25ZM1.40023 8.625H12.6002C13.8427 8.625 14.4727 7.14257 13.589 6.2789L7.98898 0.7789C7.4421 0.241791 6.55398 0.241791 6.0071 0.7789L0.4071 6.2789C-0.4679 7.14257 0.157725 8.625 1.40023 8.625ZM7.00023 1.74999L12.6002 7.24999H1.40023L7.00023 1.74999Z"
            fill="#00C1FE" />
    </svg>

    <a href="form-course.php"> <button type="button" class="btn btn-info text-light">Add new courses</button></a>
</div>
</div>
</div>
    <!-- tableau -->
    <div id="page-content-wrapper">

        <div class="container-fluid px-3 mt-4">
            <div class="table-responsive ">
                <table class="table table-borderless course">




                    <table class="table table-borderless" style="width: 100%;">
                   
                   
                    <?php
      echo" <tr  class=' align-middle border-5 border-light text-secondary  5'>
     
      <th>Title</th>
      <th>description</th>
      <th>Price</th>
     
    </tr>";
      
       ?>
           </thead>
       
    <?php
      $req="SELECT * FROM course ";
      $res = $conn -> query($req);
      if($res  -> num_rows > 0){
        
        while( $course = $res-> fetch_assoc()): ?>
    <tr class='bg-white align-middle border-5 border-light' class='text-secondary'>
     
    <td class='py-3'> <?php echo $course ['Title']?></td>
       <td class='py-3'> <?php echo $course['description']?></td>
       <td class='py-3'> <?php echo $course ['Price']?></td>
       <td class=></td>
       <td class='py-3'>
       <a href="form-course.php?edit=<?php echo $course['id'];?>" type='button' class="btn  btn-sm">
         <i class="fas fa-pen pe-2 text-info"></i>
       </a>
       </td>
       <td class="py-3">
       <a href="form-course.php?delete=<?php echo $course['id'];?>" type="button" class="btn  btn-sm">
         <i class="fas fa-trash text-info"></i>
       </a>
     </td>
     </tr>
     <?php endwhile; } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

</body>



</html> 