<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "jm";
//create connection
$cn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

require_once __DIR__ . '/vendor/autoload.php';



if (isset($_POST['j_id'])) {
  $j_id = $_POST['j_id'];
  require('vendor/autoload.php');
  $res = mysqli_query($cn, "select * from job where j_ID='$j_id'");
  if (mysqli_num_rows($res) > 0) { {
      $html .= '<style> 
        
        .table1{
            border: 1px solid black;
            display:grid;
            justify-content: center;
        } 
        .cuscenter{
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 10px;
            padding-bottom: 10px;
        }
        .tablecenter{
            margin: auto;
            width: 100%;
            text-align: center;
            padding: 10px;
        }
        .partleft{
            text-align: left;
        }
        td{
            border-bottom: 1px solid black;
            padding-top: 5px;
        }
        </style>';

      $html .= '<body><section class="form my-1 mx-2">
        <h2 class="h1-responsive font-weight-bold text-center cuscenter"><u>Job Information</u></h2>
                <div class="container">
                <table class="table1 align-middle tablecenter">';


      while ($row = mysqli_fetch_assoc($res)) {
        $html .= '<tr> 
                        <td class="partleft">ID </> 
                        <td>:</td>
                        <td class="partleft">' . $row['j_ID'] . '</td>
                    </tr>
                    <tr>
                        <td class="partleft">Job Title </>
                        <td>:</td>
                        <td class="partleft">' . $row['j_title'] . '</td>
                    </tr>
                    <tr>
                        <td class="partleft">Job Description </>
                        <td>:</td>
                        <td class="partleft">' . $row['j_desc'] . '</td>
                    </tr>
                    <tr>
                        <td class="partleft">How to apply </>
                        <td>:</td>
                        <td class="partleft">' . $row['j_jobapply'] . '</td></tr>
                    <tr>
                        <td class="partleft">Additional Info </>
                        <td>:</td>
                        <td class="partleft">' . $row['j_addinfo'] . '</td></tr>
                                      
                    ';
      }
      $html .= '</table></div></section></body>';
    }
  } else {
    $html = "Data not found";
  }
  $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML($html);
  // $file=time().'.pdf';
  $file = $j_id . $j_title . '.pdf';
  $mpdf->output($file, 'I');
  // $printBtndisp = "none";
}


?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style>
    /* Split the screen in half */
    .splitl {
      height: 100%;
      width: 80%;
      position: fixed;
      z-index: 1;
      top: 0;
      overflow-x: hidden;
      padding-top: 20px;
      margin-top: 60px;
    }

    .splitr {
      height: 100%;
      width: 20%;
      position: fixed;
      z-index: 1;
      top: 0;
      overflow-x: hidden;
      padding-top: 20px;
      margin-top: 60px;
    }

    /* Control the left side */
    .left {
      left: 0;
      background-color: white;
    }

    /* Control the right side */
    .right {
      right: 0;
      background-color: #f9564f;
    }

    /* If you want the content centered horizontally and vertically */
    .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    /* Style the image inside the centered container, if needed */
    .centered img {
      width: 150px;
      border-radius: 50%;
    }
  </style>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="custom_style.css">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #AB274F;">
    <a class="navbar-brand" href="#">Directorate Of Sericulture</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="employee.php">Employee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user.php">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="leave.php">Leave</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jobEntry.php">Job Details</a>
        </li>
        <li class="nav-item">
					<a class="nav-link" href="dept.php">Department</a>
				</li>
      </ul>
  </nav>
  <!-- navbar -->
  <form method="POST">
    <div class="splitl left">
      <div class="centered">
        <!-- carousel -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="pic1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="pic2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="pic3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- carousel -->
        <!-- <p>Some text.</p> -->
      </div>
    </div>

    <div class="splitr right">
      <div class="centered ">

        <!-- <p>Some text here too.</p> -->
        <!-- php -->
        <?php
        $sql = "SELECT j_ID,j_title, SUBSTRING(j_desc, 1, 30) as j_desc FROM job";
        $result = mysqli_query($cn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <div class="card my-3" style="width: 18rem; background-color: #f3c677;">
              <div class="card-body">
                <input type="submit" class="card-title button-13" name="j_id" value=" <?php echo ($row['j_ID']);  ?>"> <br>
                <h5 class="card-title" style="font-family: Verdana, Geneva, sans-serif;"> <?php echo ($row['j_title']);  ?> </h5>
                <p class="card-text" style="font-family: Verdana, Geneva, sans-serif;"><?php echo ($row['j_desc']);  ?></p>
              </div>
            </div>
        <?php
          }
        }
        ?>



        <!-- } -->


      </div>
    </div>
  </form>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>