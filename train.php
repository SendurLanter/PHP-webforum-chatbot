<!DOCTYPE html>
<html>
<head>
	<title>prozac - training block </title>
</head>
<body>
    <?php
        if(!empty($_POST['teachinput'])){
            $train=fopen('train.txt','a') or die("nooooooooo"); 
            fwrite($train, $_POST['teachinput']);
            fwrite($train, ',');
            fwrite($train, $_POST['teachoutput']);
            fwrite($train, ',');
            fclose($train);
        }
    ?>
    <form action="index.php">
        <input style="font-size:24px" type="submit" name="" value="傳送至上一頁">
    </form>
	
	<fieldset>
		<legend><h1>教我說話</h1></legend>
		訓練範例:
        <br>
        <h6>
        A:你好啊
        <br>
        B:你好
        <br>
        A:你叫甚麼名字?
        <br>
        B:......以下省略</h6>
        <form action="train.php" method="POST">
		    前一句話:<input type="text" name="teachinput">
		    <br>
            後一句話:<input type="text" name="teachoutput">
            <br>
            <br>
		    <input type="submit" name="submit" value="提交更多對話" onclick="alert('提交成功')" style="font-size:24px">
		</form>
	</fieldset>
</body>
</html>