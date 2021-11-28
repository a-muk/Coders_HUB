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
  $id = $_GET['catid'];
  $sql =   "SELECT * FROM `categories` WHERE category_id = $id";
  $result = mysqli_query($conn, $sql);
 
  while ($row = mysqli_fetch_assoc($result)){
    $catname= $row['category_name'];
    $catdesc= $row['category_description'];



  }

  
  
  ?>
<?php
$method =$_SERVER['REQUEST_METHOD'];
$posty = false;
if($method=='POST'){
  $posty=true;
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $sql =   "INSERT INTO `threads` (`threads_title`, `threads_desc`, `timestamp`, `threads_user_id`, `threads_cat_id`) VALUES ('$title', '$desc', current_timestamp(), '0', '$id')";

  $result = mysqli_query($conn, $sql);
 
}
if($posty){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Your Question Has Been Successfully Submitted
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>


    <div class="container my-4">
    <div class="jumbotron">
  <h1 class="display-4">Welcome to <?php echo $catname; ?> Forum</h1>
  <p class="lead"><?php echo $catdesc; ?></p>
  <hr class="my-4">
  <p>This is a forum to share knowledge with each other and clear doubts</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
    </div>
    <div class="container">
    <form action=<?php echo "threadlist.php?catid=".$id; ?> method="post">
         <h2>Ask a Question<h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Question Title</label>
    <input type="text" class="form-control" id="title" name="title" >
    
  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Please describe your question</label>
  <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <div class="container">
        <h1 class="py-2">Browse questions</h1>
        <?php
  $sql =   "SELECT * FROM `threads` WHERE threads_cat_id = $id";
  $result = mysqli_query($conn, $sql);
 $check= true;
  while ($row = mysqli_fetch_assoc($result)){
    $check=false;
    echo ' <div class="media my-4">
    <div class="media-body">
        <h5 class="mt-0"><a class="text-dark" href="thread.php?thread_id='.$row['threads_id'].'">'.$row['threads_title'].'</a></h5>
        '.$row['threads_desc'].'
</div>
</div>';



  }
if($check){
  echo '<h2>No Questions Yet</h2>';
}
  
  
  ?>
       <br>
       
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