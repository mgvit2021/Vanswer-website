<?php
    include('common.php');
    $usr = $_POST["username"];
    $pa  = $_POST["pass"];
    $sql = "SELECT passw,name,fac from info_acc where regno='$usr'";
    $res = $conn->query($sql);
    if($res->num_rows==1)
    {
        $che=$res->fetch_assoc();
        $val = $che["passw"];
        if($val==$pa)
        {
            echo "Login Validated";
            session_start();
            $_SESSION['username'] = strtoupper($usr);
            $_SESSION['name'] = $che['name'];
            $_SESSION['spec'] = $che['fac'];
            if($che['fac']!='NULL')
            {
                header('location:welcomefac.php');
            }
            else
            {
                header('location:welcome.php');
            }
        }
        else
        {
            echo "Incorrect Password";
            header("Refresh:1 ; URL='loginto.html'");
        }
    }
    else
    {
        echo "Invalid Login Details </br> Account Doesn't Exist";
        header("Refresh:1 ; URL='loginto.html'");
    }
?>