<!DOCTYPE html>
<html>
<head>
<style>

  h2{
    padding-left:50px;
  }
  .mention{
    font-size:20px;
    padding-left:80px;
  }
  select{
    font-size:20px;
    overflow-y:auto;
  }
  .content{
    padding-left:50px;
  }
  input{
    padding-left:20px;
    padding-right:20px;
    margin-left:350px;
  }
  </style>
  <?php
  require 'database_manager.php';
  $db_m = new DatabaseManager();
  $member_list = $db_m->GetAllUserName();
  ?>
</head>
<body>
  <form action="test_posting.php" method="post">
  <div class="mention">
    @ <select size="1" name="users">
      <?php 
      foreach( $member_list as $user ){
        echo "<option value = \"$user\">{$user}</option>\n";
      }
      ?>
      </select>
  </div>
<h2>投稿内容</h2>
<div class="content">
<textarea name="submisssion_text" cols="100" rows="10"></textarea>
</div>
<br>
<input type="submit" value="投稿">
  </form>
</body>
</html>