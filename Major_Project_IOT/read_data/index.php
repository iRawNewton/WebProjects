	`<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "demo2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT arduino_signal, number_plate FROM app";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="refresh" content="1">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="main">
      <header>
        <h1>Number Plate Detection Software</h1>
      </header>
      <div class="plate" id="clr"><strong><?php
        while($row = $result->fetch_assoc())  {
            // echoing the fetched data from the database per column names
            // echo  $row["number_plate"]. $row["arduino_signal"]."<br>";
            $a=$row["number_plate"];
            $b=$row["arduino_signal"];
            echo $a;
        }  
    ?>  </strong></div>
      <div class="tb">
        <table >
           <tr align="center">
            <td width="50%" id="td1">
              <div class="signal">
                <div class="red" id="r"></div>
                <div class="yellow" id="y"></div>
                <div class="green" id="g"></div>
              </div>
            </td>
            <td width="50%" id="td2">
              <div class="display" id="msg"></div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <script type="text/javascript">
      var data=<?php echo $b;?>;
        if(data==0){
         var x= document.getElementById("r");
         x.style.opacity = "1";
         var x1= document.getElementById("msg");
         x1.innerHTML = '<span id="new"><strong>Not&nbspAvailable</strong></span>';
         var x2=document.getElementById("clr");
         x2.style.backgroundColor = "red";
        }
        else if(data==1){
          var y= document.getElementById("g");
          y.style.opacity = "1";
          var y1= document.getElementById("msg");
          y1.innerHTML = '<span id="new1">Available</span>';
          var y2=document.getElementById("clr");
          y2.style.backgroundColor = "green";
        }
        else{
          var z= document.getElementById("y");
          z.style.opacity = "1";
          var z1= document.getElementById("msg");
          z1.innerHTML = '<span id="new2">No&nbspNumber&nbspPlate&nbspScan</span>';
          var z2=document.getElementById("clr");
          z2.style.backgroundColor = "yellow";
        }
    </script>
  </body>
</html>

