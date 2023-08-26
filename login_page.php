<!DOCTYPE html>
<html>

<head>
  <style>
    h2 {
      padding-left: 80px;
    }

    .login {
      padding-left: 80px;
    }

    p {
      padding-left: 80px;
    }

    span {
      color: #ff0000;
    }
  </style>
</head>

<body>
  <h2>ログイン</h2>
  <div class="login">
    <form action="" method="post">
      <label>ユーザー名<br>
        <input type="text" name="user_name" size=20 required></label><br><br>
      <label>パスワード<br>
        <input type="password" name="user_password" size=20 required></label><br><br>
      <input type="submit" value="ログイン"><br>
      <!--ボタンを押したら再度このページを呼び出す-->
    </form>
    <?php
    if ( isset($_POST['user_name']) ){
      $name = $_POST['user_name'];
      $pass = $_POST['user_password'];
      require 'database_manager.php';
      $db = new DatabaseManager();
      $flag = $db->CheckUserData($name, $pass);
      
      if ( $flag == true ) { //データベースでユーザー名とパスワードが一致した場合post.phpに飛ぶ
        //使用するユーザー名をセッション変数に格納
        session_start();
        $_SESSION['user_name'] = $name;
        header('Location:day.php');
        exit();
      } 
      else {
        echo '<span>ユーザー名またはパスワードが違います</span>';
      }
    }
    ?>
  </div>

  <p>アカウントを持っていませんか？<a href="create_user_page.php">新規登録</a></p>
  <!--新規登録ページへ-->


</body>

</html>