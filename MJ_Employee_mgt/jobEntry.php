<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "jm";
//create connection
$cn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

// button variable
$btn_dispS = "";
$btn_dispu = "none";

// variables
$j_id = "";
$j_title = "";
$j_desc = "";
$j_jobapply = "";
$j_addinfo = "";

// for values inserting
$j__id = "";
$j__title = "";
$j__desc = "";
$j__jobapply = "";
$j__addinfo = "";

// -----------insert------------
if (isset($_POST['saveBTN'])) {
    $j_id = $_POST['j_id'];
    $j_title = $_POST['j_title'];
    $j_desc = $_POST['j_desc'];
    $j_jobapply = $_POST['j_jobapply'];
    $j_addinfo = $_POST['j_addinfo'];

    // retrived details ends here -->
    if (
        !empty($j_id) || !empty($j_title) || !empty($j_desc) || !empty($j_jobapply) || !empty($j_addinfo)
    ) {
        $insert = "insert into job values
				('$j_id', '$j_title', '$j_desc', '$j_jobapply', '$j_addinfo')";
        $run_insert = mysqli_query($cn, $insert);
        if ($run_insert === true) {
            echo "<script>alert('Record inserted successfully');</script>";
            $j_id = "";
            $j_title = "";
            $j_desc = "";
            $j_jobapply = "";
            $j_addinfo = "";
        } else {
            echo "<script>alert('Dublicate ID or field blank');</script>";
        }
    }
}

// -----------search------------
if (isset($_POST['searchBTN'])) {
    $j_id = $_POST['j_search'];

    $sql = "SELECT * FROM job WHERE j_ID  ='$j_id'";
    $result = mysqli_query($cn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $j__id = $row['j_ID'];
            $j__title = $row['j_title'];
            $j__desc = $row['j_desc'];
            $j__jobapply = $row['j_jobapply'];
            $j__addinfo = $row['j_addinfo'];

            $btn_dispS = "none";
            $btn_dispu = "";
        }
    } else {
        echo "<script>alert('No record found on searching');</script>";
    }
}

// -----------update------------
if (isset($_POST['updateBTN'])) {
    // retrived details
    $j_id = $_POST['j_id'];
    $j_title = $_POST['j_title'];
    $j_desc = $_POST['j_desc'];
    $j_jobapply = $_POST['j_jobapply'];
    $j_addinfo = $_POST['j_addinfo'];

    if (
        !empty($j_id) || !empty($j_title) || !empty($j_desc) || !empty($j_jobapply) || !empty($j_addinfo)
    ) {
        $update = "update job set j_title='$j_title', j_desc='$j_desc', j_jobapply = '$j_jobapply', j_addinfo = '$j_addinfo' where j_ID='$j_id'";
        $run_update = mysqli_query($cn, $update);
        if ($run_update === true) {
            echo "<script>alert('Record updated successfully');</script>";
            $j_id = "";
            $j_title = "";
            $j_desc = "";
            $j_jobapply = "";
            $j_addinfo = "";

            $btn_dispS = "";
            $btn_dispu = "none";

        } else {
            echo "<script>alert('Duplicate record');</script>";
        }
    }
}

// -----------delete------------
if (isset($_POST['deleteBTN'])) {
    $j_id = $_POST['j_id'];
    $sql = "DELETE FROM job WHERE j_id ='$j_id'";
    $result = mysqli_query($cn, $sql);
    echo "<script>alert('Record deleted');</script>";
    $j_id = "";
    $j_title = "";
    $j_desc = "";
    $j_jobapply = "";
    $j_addinfo = "";

    $btn_dispS = "";
    $btn_dispu = "none";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Job Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- Bootstrap calendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="custom_style.css">
    <style>
        .row {
            background: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 0 10px 30px 0px rgba(0, 0, 0, 0.2);
            /* box-shadow: 12px 12px 22px rgb(65, 60, 60); */
        }

        .input_design {
            background: rgb(255, 255, 255);
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #AB274F;">
        <a class="navbar-brand" href="#">Directorate Of Sericulture</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
					<a class="nav-link" href="home.php">Home </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="employee.php">Employee</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="user.php">User </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="leave.php">Leave </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Job Details <span class="sr-only">(current)</span></a>
				</li>
                <li class="nav-item">
					<a class="nav-link" href="dept.php">Department</a>
				</li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <form method="POST">
                    <input class="form-control mr-sm-2" type="search" name="j_search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-warning my-2 my-sm-0" type="submit" name="searchBTN">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- NavBar -->
    <!-- Container -->
    <section class="form mx-2 mt-3">
        <form method="POST">
            <div class="row no-gutters mx-5 mb-4 px-3 py-3">
                <div class="form-row">
                    <div class="form-group col-md-4 form__group field">
                        <input type="text" class="form-control form__field" id="jobID" name="j_id" value="<?= $j__id ?>" placeholder="Job ID" required />
                        <label class="form__label" for="jobID">Job ID</label>
                    </div>
                    <div class="form-group col-md-8 form__group field">
                        <input type="text" class="form-control form__field" id="jobTitle" name="j_title" value="<?= $j__title ?>" placeholder="Job Title" required />
                        <label class="form__label" for="jobTitle">Job Title</label>
                    </div>
                    <div class="form-group col-md-6 form__group field">
                        <textarea class="form-control form__field" id="jobDesc" rows="2" name="j_desc" value="<?= $j__desc ?>" placeholder="Job Description" required><?= $j__desc ?></textarea>
                        <label class="form__label" for="jobDesc">Job Description</label>
                    </div>
                    <div class="form-group col-md-6 form__group field">
                        <textarea class="form-control form__field" id="jobApply" rows="2" name="j_jobapply" value="<?= $j__jobapply ?>" placeholder="How to apply" required><?= $j__jobapply ?></textarea>
                        <label class="form__label" for="jobApply">How to apply</label>

                    </div>
                    <div class="form-group col-md-12 form__group field">
                        <input type="text" class="form-control form__field" id="AddInfo" name="j_addinfo" value="<?= $j__addinfo ?>" placeholder="Additional Information" required />
                        <label class="form__label" for="AddInfo">Additional Information</label>
                    </div>

                    <!-- buttons -->
                    <div class="form-group col-md-12">
                        <button type="submit" name="saveBTN" class="form-control btn btn-outline-danger" style="display:<?= $btn_dispS ?>">
                            save
                        </button>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" name="updateBTN" class="form-control btn btn-outline-danger" style="display:<?= $btn_dispu ?>">
                            update
                        </button>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" name="deleteBTN" class="form-control btn btn-outline-danger" style="display:<?= $btn_dispu ?>">
                            delete
                        </button>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="button" class="form-control btn btn-outline-danger">
                            cancel
                        </button>
                    </div>
                    <!-- buttons -->
                </div>
            </div>
        </form>
    </section>
    <!-- Container -->
    <!-- Optional JavaScript -->
    <script src="cusstom_script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>