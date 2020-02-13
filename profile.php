<!DOCTYPE html>
<?php
    include('common.php');
    $regno = $_SESSION["username"];
    $name = $_SESSION['name'];
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
        header('location:welcome.php');
    }
    if(isset($_POST['account']))
    {
        header('location:profile.php');
    }
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Coiny|Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
            body{
            overflow-x:hidden;
            
        }
        .container{
            font-family:'Times New Roman';
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
border-color: rgba(161, 159, 159, 0.644);
box-shadow: 1px 1px 2px gray;
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
    margin-bottom:-11px;
    display: block;
    color: rgb(255, 255, 255);
    background-color: #333;
    text-align: center;
    text-decoration: none;
    font-size:17px;;
    border: none;
    width:200px;
    padding: 20px;
}
.abt{
    margin-top:20px;
    padding:10px;
    font-size:19px;
    color:#18b66c;
}
.checked {
  color: orange;
}
.tab-content{
    margin-left:25px;
}
    </style>
</head>
<body>
        <form action="" method='POST' id='upvote'> </form>
        <form action="" method='POST' id='downvote'> </form>
        <form action="" method='POST'>
            <ul class="topnav">
            <li><button id="brand" name='home'><span id="first">V</span><span id="second"> Answer </span></button></li> 
                <li><button name='qask'>Ask a Question&nbsp;<i class="far fa-question-circle"></i></button></li>
                <li><button name='showques'>My Questions</button></li>
                <li><button name='showans'>My Answers</button></li>
                <li><button class="active" name='account'><?php echo $name; ?>&nbsp; <i class="fas fa-user"></i></button></li>  
                <li id="lout"class="right"><button name='logout'>Log Out&nbsp;<i class="fas fa-sign-out-alt"></i></button></li>
            </ul>
    <div class="container">
        <div class="row">
                <h3 >Hello <?php echo $name ?> </h3>
                <i>Profile Rating:</i>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <p>Joined since: January,2019</p>
            </div>
        </div>
        <hr>
    </div>
            <div class="nav-center">
                    <ul class="nav nav-tabs" id="tabs">
                      <li class="active"><a data-toggle="tab" href="#Basicinfo" class="links">
                            <i class="glyphicon glyphicon-user"></i>  
                        About
                        </a></li>
                      <li><a data-toggle="tab" href="#timeline" class="links">          
                          <span class="glyphicon glyphicon-eye-open"></span>
                          Summary
                        </a></li>
                    </ul>
                    <div class="tab-content">
                            <div id="Basicinfo" class="tab-pane fade in active">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-4 abt text-right">Name:</div>
                                        <div class="col-md-4 abt text-left"><?php echo $name ?></div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4 abt text-right">Reg No:</div>
                                        <div class="col-md-4 abt text-left"><?php echo $regno ?></div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4 abt text-right">Branch:</div>
                                        <div class="col-md-4 abt text-left">Computer Science</div>
                                        </div>
                                </div>
                            </div>
                            <div id="timeline" class="tab-pane fade">
                           <h3>Hello there,</h3>
                            <p>I am an undergraduate student studying in VIT Chennai University.<br>
                        Through vanswer I am constantly learning and solving my doubts!!
                        THANKS!
                        </p>
                            </div>
                  </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>