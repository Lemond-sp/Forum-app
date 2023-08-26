<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>投稿編集画面</title>
    <style>
      .button{
        width: 8em;
        height: 3em;
      }
    </style>
  </head>
  <body>
  <h1 align="center">質問機能付き掲示板</h1>
    <!-- insertDB.phpでデータベースに登録-->
    <form action="insertDB.php" method="post">
      ユーザー名<br>
      <select name="userselect">
	<option value="全員">ALL</option>
        <option value="h115kaji">h115kaji</option>
        <option value="taro">h001taro</option>
        <option value="ichiro">h002ichi</option>
        <option value="saburo">h003sabu</option>
      </select></br>
      メッセージ<br>
      <textarea name="message" rows="8" cols="80"></textarea><br>
      質問ボタン<br>
      <input type="checkbox" name="is_ask" value=""></br>
      <!-- ボタンを横並び　-->
      <table>
        <tr>
          <!-- 投稿一覧に戻る　もしくは投稿　-->
          <td><input type="button" class="button" onclick="location.href = 'talk.php'" value="キャンセル"></td></br>
          <td><input type="submit" class="button" value="投稿"></td>
        </tr>
      </table>
      
    </form>
  </body>
</html>
