<html> 
<head>
    <title>ACboard</title>    
    <form action = "index.php">
    	<input type="submit" name="previous" value="PREVIOUS" style="font-size:28px">
    </form>

    <?php
        function connect(){
            $con = mysqli_connect("localhost","smyonlys","520520uu0");
            if (!$con){
                die('Could not connect: ' . mysql_error());
            }
            else{
                #echo "connected";
            }
            mysqli_select_db($con, 'comments');
            mysqli_query($con, "SET NAMES utf8");
            return $con;
        }
        function show($con){
            $sql = "select * from `comment`";
            $result = mysqli_query($con, $sql);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $i=0;
            foreach ($rows as $e) {
                $i--;
                echo "<FIELDSET>";
                echo (string)$i."樓:".$e['username']."<br>";
                echo "表示:".$e['content']."<br>";
                echo "時間:".$e['dates']."<br>";
                echo "</FIELDSET>";
            }
        }
    ?>
</head>

<body>

    <?php       
        $con = connect();
        if(!empty($_POST['username'])){
            date_default_timezone_set("Asia/Shanghai");
            $date =date("Y/m/d  h:i:sa");
            $sql = "INSERT INTO `comment` (`username`, `content`, `dates`) VALUES ('{$_POST["username"]}','{$_POST["content"]}','{$date}')";
            mysqli_query($con,$sql);
        }
    ?>

<fieldset>
    <legend><h1>留言板</h1></legend>
    <?php
        show($con);
    ?>
    </fieldset>>
    </p>
<p>
    <form action="ACboard.php" method="post">
        <FIELDSET>           
            <b style="font-size:30px;">你的名字:</b><input type="text" name="username">
            <br>
            <br>
            <b style="font-size:30px;">內容:</b>
            <input type="text" name="content" value="">
            <input type="file" id="上傳" name="upload" /> <br />
            <input type="submit" name="submit" value="提交" style="font-size:30px;">
        </FIELDSET>
        
        
    </form>
</p>
</body>
<p>
<iframe width="400" height="315" src="https://www.youtube.com/embed/IEPv31_E__4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<iframe width="400" height="315" src="https://www.youtube.com/embed/IEPv31_E__4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<iframe width="400" height="315" src="https://www.youtube.com/embed/IEPv31_E__4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</p>
</html>