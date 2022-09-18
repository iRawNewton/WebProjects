<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "jm";
//create connection
$cn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
// variables
$name = "";
$pass = "";
if (isset($_POST['login'])) {
    $name = $_POST['user'];
    $pass = $_POST['pass'];



    $sql = "select * from admin where username = '$name' and password = '$pass'";
    $result = mysqli_query($cn, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // session_start();
        // $_SESSION['name'] = $username;
        header('Location: home.php');
        die;
    } else {
        echo "<script>alert('Incorrect username or password. Try again!');window.location.href='index.php';</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login to your account</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        :root {
            --background: #1e90ff;
            --text: #000000;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            /* background: rgb(209, 230, 230); */
            background: rgb(220, 220, 220);
        }

        .row {
            background: rgb(238, 238, 238);
            border-radius: 30px;
            /* box-shadow: 12px 12px 22px rgb(65, 60, 60); */
            /* box-shadow: 0 10px 30px 0px rgba(0, 0, 0, 0.2); */
            box-shadow: 20px 20px 50px #cecece, -30px -30px 60px #dddddd;
        }

        .row:hover {
            box-shadow: 12px 12px 22px rgb(136, 136, 136);
            /* box-shadow: 20px 20px 50px #cecece, -30px -30px 60px #cccccc; */
        }

        img {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .btn1 {
            border: 1px;
            outline: none;
            height: 37px;
            width: 100%;
            /* background-color: black;
            color: white; */
            border-radius: 4px;
            font-weight: bold;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 18px;
            letter-spacing: 1vh;
        }

        /* .btn1:hover {
            background: rgb(183, 201, 201);
            border: 1px solid;
            color: black; */
        /* } */

        h2 {
            font-family: 'Times New Roman', Times, serif;
            /*font-size: 28px;*/
            text-align: center;
        }

        .form-check {
            padding-top: 9px;
            text-align: right;
        }

        .form-check-label {
            font-size: 16px;
            font-family: garamond;
            font-weight: bold;
        }

        @media screen and (min-width: 992px) {
            .form-check {
                margin-right: 9vw;
            }
        }

        @media screen and (max-width: 991px) {
            /*h2 {
                font-size: 3vw;
            }*/
        }

        .form {
            /*background-color: aqua;*/
            padding-top: 1cm;
        }
    </style>
</head>

<body>
    <form method="POST">
        <section class="mb-5">
            <h1 class="h1-responsive font-weight-bold text-center my-4" style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 3px; font-weight: bold">
                <u> Directorate Of Sericulture </u>
            </h1>
        </section>
        <section class="form pt-0 mx-3">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="logo.png" class="img-fluid p-5" alt="">
                    </div>
                    <div class="col-md-7 px-5 my-auto">
                        <div class="col-md-7 mx-auto">
                            <h2>Admin Login</h2>
                        </div>

                        <form action="">
                            <div class="form-row ">
                                <div class="col-md-7 mx-auto">
                                    <input type="text" class="form-control mt-5 mb-3 p-3" placeholder="username" name="user" id="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-7 mx-auto">
                                    <input type="password" class="form-control mt-3 p-3" placeholder="password" name="pass" id="pwd">
                                </div>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="showPassword()">
                                <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                            </div>

                            <div class="form-row">
                                <div class="col-md-7 mx-auto">
                                    <button type="submit" id="btn" name="login" value="login" class="btn btn-primary btn-rounded btn1 mt-3 mb-5">Login</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- JavaScript Validation -->
    <script>
        function Validation() {
            var id = document.loginFrm.user.value;
            var pwd = document.loginFrm.pass.value;
            if (id.length == "" && pwd.length == "") {
                alert("Username and password field are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("Username is empty");
                    return false;
                }
                if (pwd.length == "") {
                    alert("Password is empty");
                    return false;
                }
            }
        }
    </script>

    <!-- For show password -->
    <script>
        function showPassword() {
            var x = document.getElementById("pwd");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>