<?php
include('common.php');
    $arr1 = array();
    $arr2 = array();
    $regno = $_SESSION["username"];
    $name = $_SESSION['name'];
    $qsql = "select question,name,q.askid,id from answers a,questions q,info_acc i where ansid='$regno' and a.aid=q.id and i.regno=q.askid group by id";
    $res2 = $conn->query($qsql);
    if(isset($_POST['qask']))
    {
        header('location:askques.php');
    }
    if(isset($_POST['logout']))
    {
        session_destroy();
        header('location:loginto.html');
    }
    if(isset($_POST['showques']))
    {
        header('location:showquestion.php');
    }
    if(isset($_POST['showans']))
    {
        header('location:questionshow.php');
    }
    if(isset($_POST['home']))
    {
        if($_SESSION['spec']=='NULL')
        {
            header('location:welcome.php');
        }
        else
        {
            header('location:welcomefac.php');
        }
    }
    if(isset($_POST['uphow']))
    {
        $idval = unserialize($_POST['uphow']);
        $q2 = "INSERT into upvoteans values('$idval[0]','$regno','$idval[1]')";
        $r2 = $conn->query($q2);
    } 
    if(isset($_POST['upcan']))
    {
        $idval = unserialize($_POST['upcan']);
        $q2 = "DELETE from upvoteans where reg='$regno' and aid='$idval[0]' and unan='$idval[1]'";
        $r2 = $conn->query($q2);
    }
    if(isset($_POST['account']))
    {
        header('location:profile.php');
    } 
?>
<!DOCTYPE htmL>
<html>
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coiny|Lobster" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <script type=text/javascript>
        </script>
        <title> Welcome to VAnswer </title>
    <style>
        body{
            overflow-x:hidden;
        }
        .askb{
    color: green;
    font-size: 16px;
    font-family:'Times New Roman';
    padding-left:65px;
}
        body{
            overflow-x:hidden;
            }
            hr{
    border-bottom-color: rgba(202, 199, 197, 0.548) !important;
    margin-bottom:16px !important;
}
#brand{
    margin-top:-5px;
    padding:0px;
    background-color: #333;
    margin-left:-19px;
}
#first{
    font-size:50px;
    color: #18b66c !important;
    font-family: 'Lobster Two', cursive;
}
#second{
    margin-left:-4px;
    font-size:30px;
    font-family: 'Lobster Two', cursive;
}
ul.topnav li button{
    margin-top:0px;
    margin-bottom:-7px;
    display: block;
    color: rgb(255, 255, 255);
    background-color: #333;
    text-align: center;
    text-decoration: none;
    font-size:110%;
    border: none;
    width:200px;
    padding: 20px;
}
  </style>      
    </head>

    <body>
    
        <form action="" method='POST' id='upvote'> </form>
        <form action="" method='POST' id='downvote'> </form>
        <form action="" method='POST'>
            <ul class="topnav">
            <li><button id="brand"class="active" name='home'><span id="first">V</span><span id="second"> Answer </span></button></li> 
            <?php 
            if($_SESSION['spec']=='NULL')
            {
                echo "<li><button name='qask'>Ask a Question&nbsp;<i class='far fa-question-circle'></i></button></li>";
                echo "<li><button name='showques'>My Questions</button></li>";
            }
            ?>
                <li><button name='showans'class="active">My Answers</button></li>
                <li><button class="right" name='account'><?php echo $name; ?>&nbsp; <i class="fas fa-user"></i></button></li>  
                <li id="lout"class="right"><button name='logout'>Log Out&nbsp;<i class="fas fa-sign-out-alt"></i></button></li>
            </ul> </br> </br>
            
           </form>
        <form action="" method='POST' id='butfor'> </form>
        <form action="" method='POST' id='qshow'> </form>
        <?php

        while($row=$res2->fetch_assoc())
        {    
            $new = $row['id'];
            $sqln = "SELECT ans,name,unanid,regno from answers a,info_acc i  where a.aid='$new' and a.ansid=i.regno";
            $sqlno = "SELECT ans,name,unanid,regno from upvoteans u,answers a,info_acc i  where a.aid='$new' and a.aid=u.aid and a.ansid=i.regno and a.unanid=u.unan group by unan order by count(unan) desc;";
            echo "<div class='quest'><br>Q. ".$row['question']."</div>";
            echo "<div class='askb'>"."Asked by: ".$row['name']."</div></br>";
            for($i=0;$i<2;$i++)
            {
                if($i==0)
                {   
                    $res3 = $conn->query($sqlno);
                    while($row2=$res3->fetch_assoc())
                    {
                        array_push($arr1,$row2['unanid']);
                    }
                    $res3 = $conn->query($sqlno);
                }
                else
                {
                    $res3 = $conn->query($sqln);
                    $arr2 = $arr1;
                }
                while($row2=$res3->fetch_assoc())
                {
                    $cheid = $row2['unanid'];
                    if(!in_array($cheid,$arr2) && $row2['regno']==$regno)
                    {
                        $str = $row2['ans'];
                        $q1 = "SELECT unan from upvoteans where unan='$cheid' and aid='$new' and reg='$regno'";
                        $r1 = $conn->query($q1);
                        echo "<span class='showans'><span> Your answer:<br><br><span>".$str."</span></span></span><br><br>";
                        $newarr = array($new,$cheid);
                        $serial = serialize($newarr);

                        $q2 = "select count(reg) from upvoteans where unan='$cheid'";
                        $resyes = ($conn->query($q2));
                        $holona = $resyes->fetch_assoc();
                        $num = $holona['count(reg)'];
                        echo "<span class='show' style='margin-left:66px;'><span>$num Upvote(s).</span></span></br><br><hr>";
                    }
                }
            }
        }
        ?>
    </body>
<html>
