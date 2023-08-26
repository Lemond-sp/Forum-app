<!DOCTYPE html>
<html>

<head>
  <style>
    h2 {
      padding-left: 80px;
    }

    .createuser {
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
  <h2>新規登録</h2>
  <div class="createuser">
    <form action="" method="post">
      <label>ユーザー名<br>
        <input type="text" name="user_name" size=20 required></label><br><br>
      <label>パスワード<br>
        <input type="password" name="user_password" size=20 required></label><br><br>
      <label>パスワード確認<br>
        <input type="password" name="user_password_re" size=20 required></label><br><br>
      <?php
      require 'database_manager.php';
      $db_m = new DatabaseManager();
      $is_add_name = true;

      // 入力されたあと
      if (isset($_POST["user_password"])) {

        // パスワード確認と一致してるかチェック
        if ($_POST["user_password"] != $_POST["user_password_re"]) {
          echo '<span>パスワードとパスワード確認が異なります</span>';
          $is_add_name = false;
        } else {
          // すでに使われいないかチェック
          foreach ($db_m->GetAllUserName() as $value) {
            if ($value == $_POST["user_name"]) {
              echo "すでに使われた名前です";
              $is_add_name = false;
              break;
            }
          }
        }

        if ($is_add_name == true) {
          $db_m->SetUser($_POST["user_name"], $_POST["user_password"]);
          header('Location:login_page.php');
        }
      }
      ?>
      <br>
      <input type="submit" value="作成"><br>
    </form>
  </div>

  <p>既にアカウントを持っていますか？<a href="login_page.php">ログイン</a></p>

</body>

</html>
