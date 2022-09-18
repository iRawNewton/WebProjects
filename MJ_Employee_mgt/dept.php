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
$d_id = "";
$d_name = "";

// for values inserting
$d__id = "";
$d__name = "";

// -----------insert------------
if (isset($_POST['saveBTN'])) {
	$d_id = $_POST['d_id'];
	$d_name = $_POST['d_name'];
	
	// retrived details ends here -->
	if (
		!empty($d_id) || !empty($d_name)
	) {
		$insert = "insert into dept values
				('$d_id', '$d_name')";
		$run_insert = mysqli_query($cn, $insert);
		if ($run_insert === true) {
			echo "<script>alert('Record inserted successfully');</script>";
			$d_id = "";
			$d_name = "";
			
		} else {
			echo "<script>alert('Dublicate ID or field blank');</script>";
		}
	}
}

// -----------search------------
if (isset($_POST['searchBTN'])) {
	$d_id = $_POST['d_search'];

	$sql = "SELECT * FROM dept WHERE d_id  ='$d_id'";
	$result = mysqli_query($cn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$d__id = $row['d_id'];
			$d__name = $row['d_name'];
			
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
	$d_id = $_POST['d_id'];
	$d_name = $_POST['d_name'];
	
	if (
		!empty($d_id) || !empty($d_name)
	) {
		$update = "update dept set d_name='$d_name' where d_id='$d_id'";
		$run_update = mysqli_query($cn, $update);
		if ($run_update === true) {
			echo "<script>alert('Record updated successfully');</script>";
			$d_id = "";
			$d_name = "";

			$btn_dispS = "none";
			$btn_dispu = "";

		} else {
			echo "<script>alert('Duplicate record');</script>";
		}
	}
}

// -----------delete------------
if (isset($_POST['deleteBTN'])) {
	$d_id = $_POST['d_id'];
	$sql = "DELETE FROM dept WHERE d_id ='$d_id'";
	$result = mysqli_query($cn, $sql);
	echo "<script>alert('Record deleted');</script>";
	$d_id = "";
	$d_name = "";
	
	$btn_dispS = "none";
	$btn_dispu = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Department</title>
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
			/* box-shadow: 0 10px 30px 0px rgba(0, 0, 0, 0.2); */
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
		<a class="navbar-brand" href="home.php">Directorate Of Sericulture</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="home.php">Home </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="employee.php">Employee </a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="#">User </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="leave.php">Leave</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="jobEntry.php">Job Details</a>
				</li>
                <li class="nav-item active">
					<a class="nav-link" href="dept.php">Department <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<div class="form-inline my-2 my-lg-0">
				<form method="POST">
					<input class="form-control mr-sm-2" type="search" name="d_search" placeholder="Search" aria-label="Search" />
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
					<div class="form-group col-md-12 form__group field ">
						<input type="text" class="form-control form__field" id="deptID" name="d_id" value="<?= $d__id ?>" placeholder="Department ID" required />
						<label class="form__label" for="deptID">Department ID</label>
					</div>
					<div class="form-group col-md-12 form__group field ">
						<input type="text" class="form-control form__field" id="dname" name="d_name" value="<?= $d__name ?>" placeholder="Department Name" required />
						<label class="form__label" for="dname">Department Name</label>
					</div>
					
					

					<!-- buttons -->
					<div class="form-group col-md-12">
						<button type="submit" name="saveBTN" class="form-control btn btn-danger" style="display:<?= $btn_dispS ?>">
							save
						</button>
					</div>
					<div class="form-group col-md-6">
						<button type="submit" name="updateBTN" class="form-control btn btn-danger" style="display:<?= $btn_dispu ?>">
							update
						</button>
					</div>
					<div class="form-group col-md-6">
						<button type="submit" name="deleteBTN" class="form-control btn btn-danger" style="display:<?= $btn_dispu ?>">
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
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>