<!DOCTYPE html>

<html lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>質問機能付き掲示板</title>
    <style>
        <!--https://125naroom.com/web/3737-->
            .body_design {
               position: fixed;
               top: 0;
               left: 0;
               width: 100vw;
               height: 100vh;
               background-color: #fff;
               z-index: -1;
            }
	      .paper {
              background-image:
             repeating-linear-gradient(to bottom,
             transparent 25px,
             rgba(0, 0, 0, 0.04) 26px,  rgba(0, 0, 0, 0.04) 26px,
             transparent 27px,  transparent 51px,
             rgba(0, 0, 0, 0.04) 52px,  rgba(0, 0, 0, 0.04) 52px,
             transparent 53px,  transparent 77px,
             rgba(0, 0, 0, 0.04) 78px,  rgba(0, 0, 0, 0.04) 78px,
             transparent 79px,  transparent 103px,
             rgba(0, 0, 0, 0.04) 104px,  rgba(0, 0, 0, 0.04) 104px,
             transparent 105px,  transparent 129px,
             rgba(0, 0, 0, 0.04) 130px,  rgba(0, 0, 0, 0.04) 130px),
             
             repeating-linear-gradient(to right,
             transparent 25px,
             rgba(0, 0, 0, 0.04) 26px,  rgba(0, 0, 0, 0.04) 26px,
             transparent 27px,  transparent 51px,
             rgba(0, 0, 0, 0.04) 52px,  rgba(0, 0, 0, 0.04) 52px,
             transparent 53px,  transparent 77px,
             rgba(0, 0, 0, 0.04) 78px,  rgba(0, 0, 0, 0.04) 78px,
             transparent 79px,  transparent 103px,
             rgba(0, 0, 0, 0.04) 104px,  rgba(0, 0, 0, 0.04) 104px,
             transparent 105px,  transparent 129px,
             rgba(0, 0, 0, 0.04) 130px,  rgba(0, 0, 0, 0.04) 130px);
            }
            body {
              text-align: center;
            }
    </style>
</head>
<body>
    <h1 style="text-align: center; color: white; text-decoration: underline;">質問機能付き掲示板</h1>
    <h3 style="text-align: center; color: white;"><a href="edit.php">新しく質問を投稿する</a></h3>
    <h3 style="text-align: center; color: white;">月曜日 講義名：PBL演習1</h3>
    <!-- 投稿内容-->
    <main>
    <?php
    $link = new SQLite3('list.db');
    if (!$link) {
    die('接続失敗です。'.$sqliteerror);
    }

    //print('接続に成功しました。<br>');
    $result = $link->query('SELECT * FROM postlist');
    while ( $sql = $result->fetchArray() ) {
      echo "<span>";
      echo '<hr color="lightblue" size=1>';
      echo $sql[0]."."."\n";
      echo '<font color="green">'.$sql[1].'</font>';
      echo "\t";
      echo $sql[2]."\n";
      if ( $sql[3] == 1 ){
        echo'<font color="red">'."質問". '</font>'."\n";
      }
      echo $sql[4]."\n";
      echo "<br>";
      echo "<br>";
      echo "</span>";
    }
    $link->close();

    $link = new SQLite3('user.db');
    if (!$link) {
    die('接続失敗です。'.$sqliteerror);
    }
    print('接続に成功しました。<br>');
    //$result = $link->query('SELECT * FROM userinfo');

    $link->close();

    ?>
    </main>
</body>
</html>