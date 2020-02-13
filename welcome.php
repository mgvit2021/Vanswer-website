<?php
    include('common.php');
    $regno = $_SESSION["username"];
    $name = $_SESSION['name'];
    $arr = array();
    $arr2 = array();
    if(isset($_POST['filter']))
    {   
        $hihi = $_POST['cat'];
        $qsql = "SELECT question,name,q.askid,id,regno from questions q, info_acc i where q.askid=i.regno and field='$hihi'";
        $q3 = "SELECT question,name,q.askid,id,regno from questions q,followques f,info_acc i where q.id=f.qid and q.askid=i.regno and field='$hihi' group by question order by count(id) desc";
        $count = 0;
    }
    else
    {
        $qsql = "SELECT question,name,q.askid,id,regno from questions q, info_acc i where q.askid=i.regno";
        $q3 = "SELECT question,name,q.askid,id,regno from questions q,followques f,info_acc i where q.id=f.qid and q.askid=i.regno group by question order by count(id) desc";
        $count = 0;
    }
    $res2 = $conn->query($qsql);
    if(isset($_POST['submit']))
    {
        $_SESSION['qid'] = $_POST['submit'];
        header('location:answer.php');
    }
    if(isset($_POST['anshow']))
    {
        $_SESSION['ansid'] = $_POST['anshow'];
        header('location:answershow.php');
    }
    if(isset($_POST['qask']))
    {
        header('location:askques.php');
    }
    if(isset($_POST['logout']))
    {
        session_destroy();
        header('location:index.html');
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
    if(isset($_POST['folhow']))
    {
        $idval = $_POST['folhow'];
        $q2 = "INSERT into followques values('$idval','$regno')";
        $r2 = $conn->query($q2);
    } 
    if(isset($_POST['folcan']))
    {
        $idval = $_POST['folcan'];
        $q2 = "DELETE from followques where regq='$regno' and qid='$idval'";
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SwegPage</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coiny|Lobster" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
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
    margin-bottom:-10px;
    display: block;
    color: rgb(255, 255, 255);
    background-color: #333;
    text-align: center;
    text-decoration: none;
    font-size:16px;
    border: none;
    width:200px;
    padding: 20px;
}
.pure-form{
margin-left:64px;
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
            background: rgba(40, 168, 70, 0.884); /* this is a green */
        }
        
        </style>
    </head>
    <body>
        <form action="" method='POST' id='butfor'> </form>
        <form action="" method='POST' id='qshow'> </form>
        <form action="" method='POST' id='follow'> </form>
        <form action="" method='POST' id='unfollow'> </form>
        <form action="" method='POST'>
          <ul class="topnav">
                <li><button id="brand"class="active" name='home'><span id="first">V</span><span id="second"> Answer </span></button></li> 
                <li><button name='qask'>Ask a Question&nbsp;<i class="far fa-question-circle"></i></button></li>
                <li><button name='showques'>My Questions</button></li>
                <li><button name='showans'>My Answers</button></li>
                <li><button class="right" name='account'><?php echo $name; ?>&nbsp; <i class="fas fa-user"></i></button></li>  
                <li id="lout"class="right"><button name='logout'>Log Out&nbsp;<i class="fas fa-sign-out-alt"></i></button></li>
            </ul> </br> </br>
        </form>
        <form action="" method='POST' class="pure-form"> 
            <p style="text-align:left;"> Filter Questions </p>
           <!-- <div class="custom-select"> -->
                <select name="cat"class="pure-input-1-2">
                    <option value="0">Choose Category</option>
                    <option value="CSE">Computer Science</option>
                    <option value="ECE">Electronics and Communication</option>
                    <option value="EEE">Electronics and Electrical</option>
                    <option value="CIVIL">Civil</option>
                    <option value="MECH">Mechanical</option>
                    <option value="MISC">Miscellaneous</option>
                </select>
        <button class="pure-button button-success" name='filter'> Filter </button><br><br>
        </form>        
        <?php
        for($i=0;$i<2;$i++)
        {
            if($i==0)
            {
                $res2 = $conn->query($q3);
                while($row=$res2->fetch_assoc())
                {
                    $arr[$count] = $row['id'];
                    $count++;
                }
                $res2 = $conn->query($q3);
            }
            else
            {
                $res2 = $conn->query($qsql);
                $arr2 = $arr;
            }
            while($row=$res2->fetch_assoc())
            {
                $new = $row['id'];
                $folq = "select count(id) from questions q,followques f,info_acc i where q.id=f.qid and q.askid=i.regno and id='$new' group by question";
                $rest = $conn->query($folq);
                $rest1 = $rest->fetch_assoc();
                $foll = $rest1['count(id)'];
                if(!in_array($new,$arr2))
                {
                    $sqln = "SELECT ans,name from upvoteans u,answers a,info_acc i  where a.aid='$new' and a.aid=u.aid and a.ansid=i.regno and a.unanid=u.unan group by unan order by count(unan) desc;";
                    $q1 = "SELECT * from followques where regq='$regno' and qid='$new'";
                    $sqlnn = "SELECT ans,name from answers a,info_acc i where aid='$new' and a.ansid=i.regno";
                    $r1 = $conn->query($q1);
                    $res3 = $conn->query($sqln);
                    $res4 = $conn->query($sqlnn);
                    if($res3->num_rows>0 || $res4->num_rows>0)
                    {
                        if($res3->num_rows==0)
                        {
                            $res3 = $conn->query($sqlnn);
                        }
                        echo "<button class='quest' name='anshow' value='".$row['id']."' form='qshow'>Q. ".$row['question']."</button>";
                        echo "<div id='askb'>"."Asked by: ".$row['name']."</div></br>";
                        if($foll!=0)
                        {
                            echo "<div id='askb'>".$foll." follows"."</div></br>";
                        }
                        else
                        {
                            echo "<div id='askb'>"."No follows"."</div></br>";
                        }
                        $sqlnum = "SELECT count(ans) from answers a,info_acc i where aid='$new' and a.ansid=i.regno";
                        $total = $conn->query($sqlnum);
                        $total = $total->fetch_assoc();
                        echo "<span class='show'><span>"."Total Answers: ".$total['count(ans)']."</span></span></br>";
                        while($row2=$res3->fetch_assoc())
                        {
                            $str = $row2['ans'];
                            echo "<span class='showans'><span> Answered By: ".$row2['name']."<br><br><span>".$str."</span></span></span><br><br>";
                            break;
                        }
                        if($row['regno']!=$regno)
                        {
                            echo "<span class='buttspan'><button class='pure-button button-success' name='submit' value='".$row['id']."' form='butfor'>"."Answer"." &nbsp;<i class='fas fa-angle-double-right'></i></button></span>";
                        }
                        if($r1->num_rows==0) 
                        {
                            echo "<span class='buttspan'><button class='pure-button button-success' name='folhow' value='".$new."' form='follow'>"."Follow"."&nbsp;<i class='fas fa-arrow-alt-circle-up'></i></button></span><br><br><hr>";
                        }
                        else
                        {
                            echo "<span class='buttspan'><button class='pure-button button-success' name='folcan' value='".$new."' form='unfollow'>"."Unfollow"."&nbsp;<i class='fas fa-arrow-alt-circle-down'></i></button></span><br><br><hr>";
                        }
                        
                    }
                    else
                    {
                        echo "<br><div class='quest'>Q. ".$row['question']."</div>";
                        echo "<div id='askb'>"."Asked by: ".$row['name']."</div></br>";
                        if($foll!=0)
                        {
                            echo "<div id='askb'>".$foll." follows"."</div></br>";
                        }
                        else
                        {
                            echo "<div id='askb'>"."No follows"."</div></br>";
                        }
                        echo "<div class='negat'>"."No Answers Till now"."</div>";
                        if($row['regno']!=$regno)
                        {
                            echo "<span class='buttspan'><button class='pure-button button-success' name='submit' value='".$row['id']."' form='butfor'>"."Answer"." &nbsp;<i class='fas fa-angle-double-right'></i></button></span>";
                        }
                        if($r1->num_rows==0)
                        {
                            echo "<span class='buttspan'><button class='pure-button button-success' name='folhow' value='".$new."' form='follow'>"."Follow"."&nbsp;<i class='fas fa-arrow-alt-circle-up'></i></button></span><br><br><hr>";
                        }
                        else
                        {
                            echo "<span class='buttspan'><button class='pure-button button-success' name='folcan' value='".$new."' form='unfollow'>"."Unfollow"."&nbsp;<i class='fas fa-arrow-alt-circle-down'></i></button></span><br><br><hr>";
                        }
                    }
                }
                echo "</br>";
            }
        }           
        ?>
    </body>
<html>
