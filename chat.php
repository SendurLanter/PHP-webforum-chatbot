<!DOCTYPE html>
<html>
<head>
	<title> prozac - chat block </title>
	<?php
        function connect(){
            $con = mysqli_connect("localhost","smyonlys","520520uu0");
            if (!$con){
                die('Could not connect: ' . mysql_error());
            }
            else{
                #echo "connected";
            }
            mysqli_select_db($con, 'chatbot');
            mysqli_query($con, "SET NAMES utf8");
            return $con;
        }
        function show($con){
            $sql = "select * from `conversation`";
            $result = mysqli_query($con, $sql);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($rows as $e) {
                echo "<FIELDSET>";
                echo "A:".$e['request']."<br>";
                echo "B:".$e['response']."<br>";
                echo "時間:".$e['date']."<br>";
                echo "</FIELDSET>";
            }
        }
        $con = connect();

    ?>
	
</head>
<body>
	
	<form action="index.php">
		<input style="font-size:24px" type="submit" name="" value="傳送至上一頁">
	</form>
	<fieldset>
		<legend><h1>說點甚麼</h1></legend>
		"偷偷告訴你其實1號跟2號是連到同個資料庫"
		<form action="chat.php" method="POST">
			<input style="font-size:28px" type="text" name="sentence" value="">
			<input style="font-size:28px" type="submit" name="submit" value="傳送">
		</form>
	</fieldset>
	<fieldset>
		<legend><h1>Response</h1></legend>
		<?php
			if(!empty($_POST['sentence'])){
        	$start=fopen('start.txt','w');
        	fwrite($start, "1");
        	fclose($start);
        	$file=fopen('request.txt','w');
        	$req=$_POST['sentence'];
        	fwrite($file,$req);
        	fclose($file);
        	sleep(3);
        	$file=fopen('response.txt','r');
        	$res=fread($file,30);
        	echo $res;
			fclose($file);
			$start=fopen('start.txt','w');
        	fwrite($start, "0");
        	fclose($start);
            date_default_timezone_set("Asia/Shanghai");
            $date =date("Y/m/d  h:i:sa");
            $sql = "INSERT INTO `conversation` (`request`, `response`, `date`) VALUES ('{$req}','{$res}','{$date}')";
            mysqli_query($con,$sql);
            
        }
		?>
	</fieldset>
	<fieldset>
		<legend><h1>歷史紀錄</h1></legend>
		<?php
		show($con);
		?>
	</fieldset>
</body>
</html>