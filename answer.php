<?php
    include('common.php');
    $qid = $_SESSION['qid'];
    $name=$_SESSION['name'];
    $q1 = "SELECT unanid from answers";
    $an = $conn->query($q1);
    while($hi=$an->fetch_assoc())
    {
        $neww = $hi['unanid'];
    }
    $neww = $neww + 1;

    $sql = "SELECT question,name,regno from questions q, info_acc i where q.askid=i.regno and q.id='$qid'";
    $new = $conn->query($sql);
    $res = $new->fetch_assoc();
  
    if(isset($_POST['ans']))
    {
        $arg = $_POST['message'];
        $reg = $_SESSION["username"];
        $sql = "INSERT into answers values('$qid','$reg','$arg','$neww')";
        $conn->query($sql);
        if($_SESSION['spec']=='NULL')
        {
            header('location:welcome.php');
        }
        else
        {
            header('location:welcomefac.php');
        }
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
    if(isset($_POST['logout']))
    {
        session_destroy();
        header('location:loginto.html');
    }
    if(isset($_POST['showques']))
    {
        header('location:showquestion.php');
    }
    if(isset($_POST['account']))
    {
        header('location:profile.php');
    }
    if(isset($_POST['qask'])){
        header('location:askques.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Answer </title>
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coiny|Lobster" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
        <link type="text/css"rel="stylesheet" href="css/style1.css">
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
    <form action="" method='POST'>
        <ul class="topnav">
            <li><button id="brand"name='home'><span id="first">V</span><span id="second"> Answer </span></button></li> 
            <?php 
            if($_SESSION['spec']=='NULL')
            {
                echo '<li><button name="qask">Ask a Question&nbsp;<i class="far fa-question-circle"></i></button></li>';
                echo '<li><button name="showques">My Questions</button></li>';
            }
            ?> 
            <li><button name='showans'>My Answers</button></li>
                <li><button class="right" name='account'><?php echo $name; ?> &nbsp; <i class="fas fa-user"></i></button></li>  
                <li id="lout"class="right"><button name='logout'>Log Out&nbsp;<i class="fas fa-sign-out-alt"></i></button></li>
            </ul> </br> </br>
        </form>
        <div class="container">
            <div class="row">
        <div id='ques'class="col-md-12"><b> <?php echo $res['question']; ?></b> </div>
        </div>
        <div class="row">
        <div id='askb' class="col-md-12"> Asked By :<?php echo $res['name']; ?> </div>
        </div>
        <div class="row">
            <div class="col-md-8">
        <form method="POST" action="">
            <div class="form-group">
            <textarea name="message"class="form-control" row="90"> </textarea>
            </div>
            <div class="form-group">
            <input class="btn btn-success right" type="submit" name="ans">
            </div>
        </form>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </div>
    </body>
</html>