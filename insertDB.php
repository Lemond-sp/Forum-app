<?php

	$message = $_POST['message'];
	$userselect = $_POST['userselect'];

	$db = new SQLite3("list.db");
	//投稿主をセット
	session_start();
	$poster = $_SESSION['user_name'];
	if(isset($_POST['is_ask'])){
		// データベースに追加
		$db->query("INSERT INTO postlist(src,ask,user,poster) VALUES('$message',1,'$userselect','$poster')");
	}
	else{
		$db->query("INSERT INTO postlist(src,ask,user,poster) VALUES('$message',0,'$userselect','$poster')");
	}
	echo '<script>alert("投稿を完了しました！")</script>';
	echo '<script>location.href="hello.php"</script>';

	$db->close();

?>