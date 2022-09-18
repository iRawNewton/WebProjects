<!-- PHP section -->
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "demo2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// variables
$id ="";
$vehicle_no = "";
$uname = "";
$contact = "";
$designation = "";
$dept = "";
$rollno = "";
$disabledSave = "";
$vehicleR = "";

// insert
if (isset($_POST['submit'])) {
    // values retrived 
    $vehicle = $_POST['vehicle'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    if (!empty($_POST['designation'])) {
        $designation = $_POST['designation'];
    }
    if (!empty($_POST['dept'])) {
        $dept = $_POST['dept'];
    }
    $roll = $_POST['roll'];
    // sql query
    if (!empty($vehicle) || !empty($username) || !empty($contact)) {
        $insert = "insert into vehicleinfo values 
        ('$id','$vehicle','$username','$contact','$designation','$dept','$roll')";

        $run_insert = mysqli_query($conn, $insert);
        if ($run_insert === true) {
            echo '<script>alert("Record saved")</script>';
        } else {
            echo "Cannot insert dublicate values";
        }
    } else {
        echo "Error connecting database connection";
    }
}

// search
if (isset($_POST['search'])) {
    // values retrived
    $search_num = $_POST['searchnum'];
    // sql query
    $sql = "SELECT * FROM vehicleinfo WHERE vehicle_no  ='$search_num'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // setting values
            $id = $row['id'];
            $vehicle_no = $row['vehicle_no'];
            $uname = $row['uname'];
            $contact = $row['contact'];
            $designation = $row['designation'];
            $dept = $row['dept'];
            $rollno = $row['rollno'];
        }
    } else {
        echo "<script>alert('No record found on searching');</script>";
    }
}
// update
if (isset($_POST['update'])) {
    // retrived values
    $vehicle = $_POST['vehicle'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    if (!empty($_POST['designation'])) {
        $designation = $_POST['designation'];
    }
    if (!empty($_POST['dept'])) {
        $dept = $_POST['dept'];
    }
    $roll = $_POST['roll'];
    // sql query
    if (!empty($vehicle) || !empty($username) || !empty($contact) || !empty($designation)) {
        $update = "update vehicleinfo set uname='$username', contact='$contact', designation='$designation', dept='$dept', rollno='$roll'";
        $run_update = mysqli_query($conn, $update);
        if ($run_update === true) {
            echo "<script>alert('Record updated successfully');</script>";
            // blank inputs
            $id = "";
            $vehicle_no = "";
            $uname = "";
            $contact = "";
            $designation = "";
            $dept = "";
            $rollno = "";
            $disabledSave = "";
            $vehicleR = "";
        } else {
            echo "<script>alert('Duplicate record');</script>";
        }
    } else {
        echo "Error connecting database connection";
    }
}

// delete
if (isset($_POST['delete'])) {
    // retrived values
    $vehicle = $_POST['vehicle'];
    // sql query
    $sql = "DELETE FROM vehicleinfo WHERE vehicle_no ='$vehicle'";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Record deleted');</script>";
    // blank inputs
    $id = "";
    $vehicle_no = "";
    $uname = "";
    $contact = "";
    $designation = "";
    $dept = "";
    $rollno = "";
    $disabledSave = "";
    $vehicleR = "";
}

// delete
if (isset($_POST['AddDept'])) {
    // retrived values
    $Add_dept = $_POST['Add_dept'];
    // sql query
    $sql = "INSERT INTO DEPT VALUES ( '$Add_dept' )";
    $result = mysqli_query($conn, $sql);
}
?>
<!-- PHP section -->
<!-- HTML section -->
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <form name="vehicleInfo" id="vehicleInfo" method="POST">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light pb-3">
            <a class="navbar-brand" href="#">Vehicle Portal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vehicle Information <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick='resetform()'>Clear form</a>
                    </li>
                </ul>
                <section class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name="searchnum" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" id="searchID" onclick="searchClicked()">Search</button>
                </section>
            </div>
        </nav>
        <!-- navbar -->
        <!-- form -->
        <div class="container shadow">
            <section class="form mx-2 mt-3">
                <div class="row no-gutters mx-5 mb-4 px-3 py-3">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="vehicle_no">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehicle_no" name="vehicle" placeholder="Vehicle Number" value="<?= $vehicle_no ?>" <?= $vehicleR ?>>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="uname">User Name</label>
                            <input type="text" class="form-control" id="uname" name="username" placeholder="User Name" value="<?= $uname ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="c_number">Contact Number</label>
                            <input type="text" class="form-control" id="c_number" name="contact" placeholder="Contact Number" value="<?= $contact ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="desgn">Designation</label>
                            <input type="text" class="form-control" id="desgn" name="designation" placeholder="select designation" value="<?= $designation ?>" data-toggle="modal" data-target="#DesigModalCenter" autocomplete="off">
                            <!-- Modal -->
                            <div class="modal fade" id="DesigModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Select Designation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- modal body -->
                                            <select class="browser-default custom-select" id="modalselect1">
                                                <option value="">Choose your option</option>
                                                <option value="Faculty">Faculty</option>
                                                <option value="Student">Student</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            <!-- modal body -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close1">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="modal_desig()">Select</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dept">Department</label>
                            <input type="text" class="form-control" id="dept" name="dept" placeholder="select department" value="<?= $dept ?>" data-toggle="modal" data-target="#DeptModalCenter" autocomplete="off">
                            <!-- Modal -->
                            <div class="modal fade" id="DeptModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Select Department</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- modal body -->
                                            <!-- ... -->
                                            <select class="browser-default custom-select" id="modalselect2">
                                                <option disabled selected value>Choose your option</option>
                                                <?php
                                                $sql = "SELECT distinct dept_name FROM dept";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo '<option value =' . $row['dept_name'] . '>  ' . $row['dept_name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <!-- modal body -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close2">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="modal_dept()">Select</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="add_dept">&nbsp</label>
                            <button type="button" class="form-control btn btn-outline-info" id="add_dept" data-toggle="modal" data-target="#DeptAddModalCenter">Add Department</button>
                            <!-- Modal -->
                            <div class="modal fade" id="DeptAddModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Department</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- modal body -->
                                            <input type="text" class="form-control" id="Add_dept" name="Add_dept" placeholder="Enter Department Name">
                                            <!-- modal body -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close3">cancel</button>
                                            <button type="submit" class="btn btn-primary" id="AddDeptID" name="AddDept">save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                        </div>
                        <div class="form-group col-md-12" id="roll_no">
                            <label for="roll">Roll Number</label>
                            <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll Number" value="<?= $rollno ?>">
                        </div>

                        <!-- buttons -->
                        <div class="form-group col-md-6" id="save">
                            <button class="form-control btn btn-outline-success" type="submit" id="saveID" name="submit" <?php if ($disabledSave) {
                                                                                                                                echo 'disabled="disabled"';
                                                                                                                            } ?>>save</button>
                        </div>
                        <div class="form-group col-md-6" id="cancel">
                            <button type="button" class="form-control btn btn-outline-danger" id="cancelID">cancel</button>
                        </div>
                        <div class="form-group col-md-6" id="update">
                            <button class="form-control btn btn-outline-success" type="submit" id="updateID" name="update">update</button>
                        </div>
                        <div class="form-group col-md-6" id="delete">
                            <button class="form-control btn btn-outline-danger" type="submit" id="deleteID" name="delete">delete</button>
                        </div>
                        <!-- buttons -->
                    </div>
                </div>
            </section>
        </div>

        <!-- form -->

    </form>
    <!-- Optional JavaScript -->
    <script type="text/javascript">
        window.onload = function() {
            var x =document.getElementById("vehicle_no").value
            if (x==''){
                document.getElementById("save").style.display = "block";
                document.getElementById("cancel").style.display = "block";
    
                document.getElementById("update").style.display = "none";
                document.getElementById("delete").style.display = "none";
            }
            else{
                document.getElementById("save").style.display = "none";
                document.getElementById("cancel").style.display = "none";
    
                document.getElementById("update").style.display = "block";
                document.getElementById("delete").style.display = "block";
            }
        }

        function resetform() {
            document.getElementById("vehicleInfo").reset;
        }

        function modal_desig() {
            var x = document.getElementById("modalselect1").value;
            document.getElementById("desgn").value = x;
            document.getElementById("close1").click();
            if (x=='Faculty'){
                document.getElementById("roll_no").style.display = "none";
            }
            else{
                document.getElementById("roll_no").style.display = "block";
            }
        }

        function modal_dept() {
            var y = document.getElementById("modalselect2").value;
            document.getElementById("dept").value = y;
            document.getElementById("close2").click();
        }

        // function searchClicked() {
        //     document.getElementById("save").style.display = "none";
        //     document.getElementById("cancel").style.display = "none";

        //     document.getElementById("update").style.display = "block";
        //     document.getElementById("delete").style.display = "block";

            // var targetElement = document.getElementById("updateID");
            // targetElement.className = "form-control btn btn-outline-success animate__animated animate__fadeIn";

            // var targetElement = document.getElementById("deleteID");
            // targetElement.className = "form-control btn btn-outline-success animate__animated animate__fadeIn";
// }
;
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS sweetalert -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
