<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
      body{
        background-image: url("images/bg-body.jpg");
      }    
      img{
        width: 25%;
        padding-top: 30px;
      }
      #adm{
        text-align: center;
        font-size: 20px;
      }
  </style>
</head>

<body>

<div id="header" align="center">
  <img src="images/logoo.png">
</div>
<div class="container">
    <p id="adm">ADMIN</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Comment</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $con=mysqli_connect("localhost","root","","smart_kuy");
                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $sql="SELECT*FROM book_data";

                if ($result=mysqli_query($con,$sql))
                  {
                  // Fetch one and one row
                  while ($row=mysqli_fetch_row($result))
                    {
                      echo "<tr>
                          <td>".$row[1]."</td>
                          <td>".$row[2]."</td>
                          <td>".$row[3]."</td>
                          <td>".$row[4]."</td>
                          <td>".$row[5]."</td>
                          <td>
                              <a href='delete.php?id=".$row[0]."'>
                                  <span class='glyphicon glyphicon-remove'></span>
                              </a>
                          </td>
                      </tr>";
                    }
                  // Free result set
                  mysqli_free_result($result);
                }

                mysqli_close($con);
                ?>
        </tbody>
    </table>
</div>

</body>
</html>
