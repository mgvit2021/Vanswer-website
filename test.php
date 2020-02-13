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
        $q3 = "select question,name,q.askid,id,regno from questions q,followques f,info_acc i where q.id=f.qid and q.askid=i.regno and field='$hihi' group by question order by count(id) desc";
        $count = 0;
    }
    else
    {
        $qsql = "SELECT question,name,q.askid,id,regno from questions q, info_acc i where q.askid=i.regno";
        $q3 = "select question,name,q.askid,id,regno from questions q,followques f,info_acc i where q.id=f.qid and q.askid=i.regno group by question order by count(id) desc";
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
?>

<!DOCTYPE htmL>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SwegPage</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type=text/javascript>
        </script>    
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coiny|Lobster" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    </head>
    <body>
        <div class="outbox">
            <div class="inbox">
                <span id="first"> Welcome <?php echo $name ?> &nbsp;!</span>
            </div>
        </div>
        <form action="" method='POST' id='butfor'> </form>
        <form action="" method='POST' id='qshow'> </form>
        <form action="" method='POST' id='follow'> </form>
        <form action="" method='POST' id='unfollow'> </form>
        <form action="" method='POST'>
            <ul class="topnav">
                <li><button class="active" name='home'>Home</button></li> 
                <li><button name='qask'>Ask a Question</button></li>
                <li><button name='showques'>My Questions</button></li>
                <li><button name='showans'>My Answers</button></li>
                <li><button name='help'>Help</button></li>
                <li><button name='account'>My Account</button></li>  
                <li class="right"><button name='logout'>Log Out</button></li>
            </ul> </br> </br>
        </form>
        <form action="" method='POST'> 
            <p class="pref"> Filter Questions </p>
            <div class="custom-select">
                <select name="cat">
                    <option value="0">Choose Category</option>
                    <option value="CSE">Computer Science</option>
                    <option value="ECE">Electronics and Communication</option>
                    <option value="EEE">Electronics and Electrical</option>
                    <option value="CIVIL">Civil</option>
                    <option value="MECH">Mechanical</option>
                    <option value="MISC">Miscellaneous</option>
                </select>
            </div>
        </form>
        <div class="pref"> <button class="filter but" name='filter'> Filter </button></div>
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
                if(!in_array($new,$arr2))
                {
                    $sqln = "SELECT ans,name from answers a,info_acc i where aid='$new' and a.ansid=i.regno";
                    $q1 = "SELECT * from followques where regq='$regno' and qid='$new'";
                    $r1 = $conn->query($q1);
                    $res3 = $conn->query($sqln);
                    if($res3->num_rows>0)
                    {
                        echo "<button class='quest' name='anshow' value='".$row['id']."' form='qshow'>Q. ".$row['question']."</button>";
                        echo "<div id='askb'>"."Asked by: ".$row['name']."</div></br>";

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
                        if($r1->num_rows==0) 
                        {
                            echo "<span class='buttspan'><button class='filter but' name='folhow' value='".$new."' form='follow'>"."Follow"."</button></span>";
                        }
                        else
                        {
                            echo "<span class='buttspan'><button class='filter but' name='folcan' value='".$new."' form='unfollow'>"."Unfollow"."</button></span>";
                        }
                        if($row['regno']!=$regno)
                        {
                            echo "<span class='buttspan'><button class='filter but' name='submit' value='".$row['id']."' form='butfor'>"."Answer</button></span><br><br><br>";
                        }
                        
                    }
                    else
                    {
                        echo "<div class='quest'>Q. ".$row['question']."</div>";
                        echo "<div id='askb'>"."Asked by: ".$row['name']."</div></br>";
                        echo "<div class='negat'>"."No Answers Till now"."</div>";
                        if($row['regno']!=$regno)
                        {
                            echo "<span class='buttspan'><button class='filter but' name='submit' value='".$row['id']."' form='butfor'>"."Answer</button></span>";
                        }
                        if($r1->num_rows==0)
                        {
                            echo "<span class='buttspan'><button class='filter but' name='folhow' value='".$new."' form='follow'>"."Follow"."</button></span><br><br><br>";
                        }
                        else
                        {
                            echo "<span class='buttspan'><button class='filter but' name='folcan' value='".$new."' form='unfollow'>"."Unfollow"."</button></span><br><br><br>";
                        }
                    }
                }
                echo "</br> </br>";
            }
        }           
        ?>
    </body>
<html>
