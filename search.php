<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Php search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>


  <div class="container my-5">
      <form class="d-flex" role="search" action="search.php" method="GET">
        <input class="form-control me-2" name="search" type="search" placeholder="Search Name" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>

<?php
  $con = mysqli_connect("localhost", "root", "", "test") or die('Failed to connect');


  if(isset($_GET['search'])) { //1st
    $search = $_GET['search'];
    $nosearch  = 0;

    $search_sql = "SELECT * FROM search WHERE name LIKE '%$search%'";
    $search_query = mysqli_query($con, $search_sql);

    if(mysqli_num_rows($search_query) > 0) { //2nd


      // Create table head
      echo "
      <div class='container'>
      <h3>Search Result</h3>
      <table class='table table-striped table-bordered border-primary'>
        <thead>
          <tr>
            <th scope='col'>#</th>
            <th scope='col'>Name</th>
            <th scope='col'>Section</th>
            <th scope='col'>Class</th>
          </tr>
        </thead>
      ";

      // Data loop
      while($data = mysqli_fetch_assoc($search_query)) { //4th

        $id = $data['id'];
        $name = $data['name'];
        $section = $data['section'];
        $class = $data['class'];

        if(!empty($search)) { //if data will be exist than work this section and print search data
          echo "
            <tr>
                <th scope='row'>$id</th>
                <td>$name</td>
                <td>$section</td>
                <td>$class</td>
              </tr>

          ";
        }

      }//4th // Data loop

      echo "</table> </div>"; // End table head     

    } //2nd

    else { //3rd
      echo "

      <div class='container'>
        <div style='position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);'>
          <img src='error.png' class='img-fluid'>
          <a href='index.php' title='Back to home' style='display: block; margin: auto; text-align: center; text-decoration: none; background-color: #6477F0; width: 100px; color: #FFFFFF; padding: 3px;'>Back</a>
        </div>
      </div>

      ";
    } //3rd

  } //1st
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>