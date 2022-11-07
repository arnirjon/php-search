<?php
  $con = mysqli_connect("localhost", "root", "", "test") or die('Failed to connect');

  $searchTable = "SELECT * FROM search";
  $searchquery = mysqli_query($con ,$searchTable);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Php search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <style type="text/css">
    .tablehv:hover {
      background-color: #B5B5B5;
    }
  </style>
  <body>

    <div class="container my-3">
      <h1 style="text-align: center;">Search data with php</h1>
      <p style="text-align: center;">Database Name: <span style="color: #C55252; font-weight: bold;">test</span>, Database table name: <span style="color: #C55252; font-weight: bold;">search</span></p>
    </div>
    

    <div class="container my-5">
      <form class="d-flex" role="search" action="search.php" method="GET">
        <input class="form-control me-2" name="search" type="search" placeholder="Search Name" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>

    <div class="container">
      <table class="table table-striped table-bordered border-primary">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Section</th>
            <th scope="col">Class</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while ($data = mysqli_fetch_array($searchquery)) {
              $id = $data['id'];
              $name = $data['name'];
              $section = $data['section'];
              $class = $data['class'];
          ?>
          <tr class="tablehv">
            <th scope="row"><?php echo $id ?></th>
            <td class="thhv"><?php echo $name ?></td>
            <td class="thhv"><?php echo $section ?></td>
            <td class="thhv"><?php echo $class ?></td>
            <?php }?>
          </tr>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>