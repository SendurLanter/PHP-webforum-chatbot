<html>
<head bgcolor="black"  style="color:green;">
	<title>Prozac</title>
	<form action="ACboard.php">
    	<input style="font-size:28px" type="submit" name="" value="意見回饋區">
    </form>
	<?php
        define("file", "count.txt");
        $r = fopen(file,'r') or die("Unable to open file!");
        $count = (int)fread($r,filesize(file)) +1;
        date_default_timezone_set("Asia/Shanghai");
        $date =date("Y/m/d  h:i:sa");
        echo "<font color='white'>"."<h2>"."你是第".$count."位造訪這個網站的人"."【然而 重新整理會累加】"."............".$date."</h2>"."</font>";

        fclose($r);

        $w = fopen(file,'w') or die("Unable to open file!");
        fwrite($w, (string)$count );
        fclose($w);

    ?>
</head>
<body bgcolor="black" font color="green">
	<table border="1">
		<tr>
		  <td><img src="\sub\img\one.jpg" width="370" height="410" /></td>
		  <td><img src="\sub\img\two.jpg" width="370" height="410" /></td>
		  <td><img src="\sub\img\three.jpg" width="370" height="410" /></td>
		</tr>
		<tr>
			<td><b><font color="green"><h3>一號</h3>
				描述：在上電網時隨手畫出來的1號，
				<br>
				性別不明，看起來像一團混亂
				</font>
			</b>
			</td>
			<td><b><font color="green"><h3>二號</h3>
				描述：在上電網時隨手畫出來的2號，
				<br>
				意義不明，是唯一有臉的東西
				</font>
			</b>
			</td>
			<td><b><font color="green"><h3>三號</h3>
				描述：名義上的3號，
				<br>
				他死了，不具有任何功能
			</font>
			</b>
			</td>

		</tr>
		<tr>
			<td>
				<form action="chat.php">
				<input style="font-size:28px"  type="submit" name="chat" value="跟他說話">
				</form>
			</td>
			<td>
				<form action="chat.php">
				<input style="font-size:28px" type="submit" name="chat" value="跟他說話">
				</form>
			</td>
			<td>
				<form action="chat.php">
				<input style="font-size:28px" type="submit" name="chat" value="跟他說話">
				</form>				
			</td>
		</tr>
		<tr>
			<td>
				<form action="train.php">
					<input style="font-size:28px;color:green" type="submit" name="train" value="教我說話">
				</form>
			</td>
			<td>
				<form action="train.php">
					<input style="font-size:28px;color:green" type="submit" name="train" value="教我說話">
				</form>
			</td>
			<td>
				<form action="train.php">
					<input style="font-size:28px;color:green" type="submit" name="train" value="教我說話">
				</form>
			</td>	
		</tr>
	</table>
	
	<?php

	?>
</body>
</html>