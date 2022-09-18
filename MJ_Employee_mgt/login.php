<?php
$username = $_POST['user']; // fetching values from POST ()
$password = $_POST['pass']; // fetching values from POST ()

if(!empty($username) || !empty($password)) // performing validation to check if username and password are empty or not
{
    $host = "localhost";
    $dbusername ="root";
    $dbpassword ="root";
    $dbname="jm";

    //create connection
    $cn = new mysqli($host,$dbusername,$dbpassword,$dbname);

    // to prevent mysql injection
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($cn, $username);  
    $password = mysqli_real_escape_string($cn, $password); 

    if(mysqli_connect_error()) // to check if there is any error during connection
    {
        die( 'Connect Error ('.mysqli_connect_error().')' .mysqli_connect_error());
    }
    else
    {
        $sql = "select * from admin where username = '$username' and password = '$password'";  
        $result = mysqli_query($cn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);

        if($count == 1)
        {
            session_start();
            $_SESSION['name']=$username;
            header('Location: home_test.php');
            die;
        }
        else
        {
            echo "<script>alert('Incorrect username or password. Try again!');window.location.href='index.html';</script>";
        }
    }
}
else{
    echo "All field are required";
    die();
}

?>