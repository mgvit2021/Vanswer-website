<?php
    include('common.php');
    $usr = $_SESSION['username'];
    $name = $_SESSION['name'];
    $sql = "SELECT id from questions";
    $res = $conn->query($sql);
    while($row = $res->fetch_assoc())
    {
        $newid = $row['id'];
    }
    $newid = $newid+1;
    if(isset($_POST['ques']))
    {
        if(!empty($_POST['message']))
        {
            $msg = $_POST['message'];
            $sel = $_POST['Color'];
            $sql = "INSERT into questions values('$newid','$usr','$msg','$sel')";
            $conn->query($sql);
            header('location:welcome.php');
        }
    }
    if(isset($_POST['qask']))
    {
        header('location:askques.php');
    }
    if(isset($_POST['showans']))
    {
        header('location:questionshow.php');
    }
    if(isset($_POST['logout']))
    {
        session_destroy();
        header('location:login2.php');
    }
    if(isset($_POST['showques']))
    {
        header('location:showquestion.php');
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
<!DOCTYPE html>
<html>
    <head>
        <title> Answer </title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coiny|Lobster" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="css/newtemp.css">
        <style>
        #brand{
    margin-top:-5px !important;
    padding:0px!important;
    background-color: #333;
    margin-left:-19px!important;
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
    margin-top:0px !important;
    margin-bottom:-11px !important;
    display: block;
    color: rgb(255, 255, 255);
    background-color: #333;
    text-align: center;
    text-decoration: none !important;
    font-size:17px !important;
    border: none;
    width:200px;
    padding: 20px !important;
}
        </style>
    </head>
    <body>
        <form action="" method='POST'>
            <ul class="topnav">
                <li><button id="brand"name='home'><span id="first">V</span><span id="second"> Answer </span></button></li> 
                <li><button class="active" name='qask'>Ask a Question&nbsp;<i class="far fa-question-circle"></i></button></li>
                <li><button name='showques'>My Questions</button></li>
                <li><button name='showans'>My Answers</button></li>
                <li><button name='account'>&nbsp; <?php echo $name; ?>&nbsp; <i class="fas fa-user"></i></button></li>
                <li class="right"><button name='logout'>Log Out &nbsp;<i class="fas fa-sign-out-alt"></i>&nbsp;</button></li>
            </ul> </br> </br>
        </form>
        <div class="container">
        <div id="intro"><br>Enter your question here:<br></div>
        <form action="" method='POST'>
            <div class="row">
                <div class="col-md-8">
            <div class="form-group"> 
            <textarea placeholder="Enter text here.." name="message" class="form-control"> </textarea>
            </div>    
        </div>
            </div>
            <p id="pref"> Enter the category in which your question falls: </p>
                <div class="form-group row">
                    <div class="col-md-4">
                <select name="Color" class="form-control">
                    <option value="0">Choose Category</option>
                    <option value="CSE">Computer Science</option>
                    <option value="ECE">Electronics and Communication</option>
                    <option value="EEE">Electronics and Electrical</option>
                    <option value="CIVIL">Civil</option>
                    <option value="MECH">Mechanical</option>
                    <option value="MISC">Miscellaneous</option>
                </select>
                </div>
        <div class="col-md-8"> 

            <button type="submit"class="btn btn-success" name='ques'> Submit Question </button>
        </div>
</div>
        </form>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </body>
</html>