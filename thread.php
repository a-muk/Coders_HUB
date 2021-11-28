<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Forum</title>
  </head>
  <body>

  <?php include 'partials/_header.php'; 
        include 'partials/_dbconnect.php';
  ?>
  <?php
  $id = $_GET['thread_id'];
  $sql =   "SELECT * FROM `threads` WHERE threads_id = $id";
  $result = mysqli_query($conn, $sql);
 
  while ($row = mysqli_fetch_assoc($result)){
    $name= $row['threads_title'];
    $desc= $row['threads_desc'];
   echo ' <div class="container my-4">
    <div class="jumbotron">
  <h1 class="display-4">'.$name.'</h1>
  <p class="lead">'.$desc.'</p>
  <hr class="my-4">
  
   
</div>
    </div>';


  }

  
  
  ?>
    
    <div class="container">
        <h1 class="py-2">Comments</h1>
       <!-- <?php
  $sql =   "SELECT * FROM `threads` WHERE threads_cat_id = $id";
  $result = mysqli_query($conn, $sql);
 $check=true;
  while ($row = mysqli_fetch_assoc($result)){
    $check=false;
    echo ' <div class="media my-4">
    <div class="media-body">
        <h5 class="mt-0"><a class="text-dark" href="thread.php">'.$row['threads_title'].'</a></h5>
        '.$row['threads_desc'].'
</div>
</div>';



  }

  if($check){
    echo '<h2>No Answer Yet...</h2>';
  }
  
  ?> 
        -->
  <?php include 'partials/_footer.php'; ?>

    <h1></h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  </body>
</html>