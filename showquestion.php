<?php    
    include('common.php');
    $arr1 = array();
    $arr2 = array();
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
    if(isset($_POST['home']))
    {
        header('location:welcome.php');
    }
    if(isset($_POST['showans']))
    {
        header('location:questionshow.php');
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
<!DOCTYPE html>
<html>
    <head>
        <title> My Questions </title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coiny|Lobster" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
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
    margin-bottom:-9px !important;
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
.button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            margin-left:33px;
            background: rgba(40, 168, 70, 0.884); /* this is a green */
            margin-bottom:10px;
            margin-top:-8px;
        }
        </style>
    </head>
    <body>
        <form action="" method='POST' id='upvote'> </form>
        <form action="" method='POST' id='downvote'> </form>
        <form action="" method='POST'>
            <ul class="topnav">
            <li><button id="brand"name='home'><span id="first">V</span><span id="second"> Answer </span></button></li> 
                <li><button name='qask'>Ask a Question&nbsp;<i class="far fa-question-circle"></i></button></li>
                <li><button name='showques'class="active">My Questions</button></li>
                <li><button name='showans'>My Answers</button></li>
                <li><button class="right" name='account'><?php echo $name; ?>&nbsp; <i class="fas fa-user"></i></button></li>  
                <li id="lout"class="right"><button name='logout'>Log Out&nbsp;<i class="fas fa-sign-out-alt"></i></button></li>
            </ul> </br> </br>
        </form>
        <div id="intro" style="font-family: 'Lobster', cursive;">Hi <?php echo $name ?>&nbsp;,<br>Here are the questions asked by you:</div>
        <?php
            $sql = "SELECT question,id from questions where askid='$regno'";
            $res = $conn->query($sql);
            while($row = $res->fetch_assoc())
            {
                $id = $row['id'];
                echo "<br><div class='quest'>Q. ".$row['question']."</div>";
                $sql2 = "SELECT ans,name,unanid,regno from answers a,info_acc i where aid='$id' and a.ansid=i.regno";
                $sqlno = "SELECT ans,name,unanid,regno from upvoteans u,answers a,info_acc i  where a.aid='$id' and a.aid=u.aid and a.ansid=i.regno and a.unanid=u.unan group by unan order by count(unan) desc;";
                $res2 = $conn->query($sql2);
                if($res2->num_rows==0)
                {
                    echo "<div class='negat' id='noans'>"."No answers till now"."</div><br><hr>";
                }
                else
                {
                    for($i=0;$i<2;$i++)
                    {
                        if($i==0)
                        {   
                            $res2 = $conn->query($sqlno);
                            while($row2=$res2->fetch_assoc())
                            {
                                array_push($arr1,$row2['unanid']);
                            }
                            $res2 = $conn->query($sqlno);
                        }
                        else
                        {
                            $res2 = $conn->query($sql2);
                            $arr2 = $arr1;
                        }
                        while($row2 = $res2->fetch_assoc())
                        {
                            $cheid = $row2['unanid'];
                            if(!in_array($cheid,$arr2))
                            {
                                $str = $row2['ans'];
                                echo "<span class='showans'><span> Answered By: ".$row2['name']."<br><br><span>".$str."</span></span></span><br><br>";
                                $q1 = "SELECT unan from upvoteans where unan='$cheid' and aid='$id' and reg='$regno'";
                                $r1 = $conn->query($q1);
                                $newarr = array($id,$cheid);
                                $serial = serialize($newarr);

                                $q2 = "select count(reg) from upvoteans where unan='$cheid'";
                                $resyes = ($conn->query($q2));
                                $holona = $resyes->fetch_assoc();
                                $num = $holona['count(reg)'];
                                echo "<span class='show' style='margin-left:60px;font-size:16px;font-style:italic;font-family: 'Times New Roman', Times, serif;'>$num Upvote(s).</span></br><br>";


                                if($row2['regno']!=$regno)
                                {
                                    if($r1->num_rows==0)
                                    {
                                        echo "<span class='buttspan'><button class='pure-button button-success' style='margin-left:60px;' name='uphow' value='$serial' form='upvote'>"."Upvote"."&nbsp;<i class='fas fa-thumbs-up'></i></button></span></br><br><br><hr>";
                                    }
                                else
                                    {
                                        echo "<span class='buttspan'><button class='pure-button button-success' name='upcan' value='$serial' form='downvote'>"."Downvote"."&nbsp;<i class='fas fa-thumbs-down'></i></button></span></br><br><br><hr>";
                                    }
                                }
                            }
                        }
                    }
                    echo "</br>";
                }
            }
            if($res->num_rows==0)
            {
                echo "<div id='intro'> You haven't Asked any questions till now <br><br></div><hr>";
            }
        ?>
    </body>
</html>
