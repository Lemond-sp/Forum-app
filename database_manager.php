<?php
class DatabaseManager
{

    private $db; // データベース本体


    //データベースの起動
    public function OpenDB()
    {
        if ($this->db == null) {
            try {
                $this->db = new SQLite3("./database/userdata.db");
            } catch (Exception $e) {
                $errormessage = $e->getMessage();
                echo "$errormessage";
                return false;
            }
        }

        // テーブルがあるか確認
        $result = $this->db->query("SELECT COUNT(*) FROM sqlite_master WHERE TYPE='table' AND name='user_table'");



        $cols = $result->fetchArray();

        // テーブルが存在しないとき
        if ($cols[0] == "0") {
            // databaseテーブルの作成
            $this->db->query("CREATE TABLE user_table(
            username TEXT NOT NULL PRIMARY KEY,
            pass TEXT NOT NULL
            )");
        }

        return true;
    }

    public function SetUser($name, $pass)
    {
        if ($this->OpenDB() == false) {
            echo "データベースを開けませんでした";
            return false;
        }

        $prepare = $this->db->prepare("INSERT INTO user_table(username, pass) VALUES(:username, :pass)");
        $prepare->bindValue(':username', $name, SQLITE3_TEXT);
        $prepare->bindValue(':pass', $pass, SQLITE3_TEXT);

        $result = $prepare->execute();

        if ($result == false) {
            echo "データ登録失敗";
            return false;
        }
        return true;
    }

    public function GetAllUserName()
    {
        if ($this->OpenDB() == false) {
            echo "データベースを開けませんでした";
            return false;
        }

        $name_array = array();

        $result = $this->db->query("SELECT * FROM user_table;");

        while ($cols = $result->fetchArray()) {
            array_push($name_array, $cols[0]);
        }

        return $name_array;
    }

    public function CheckUserData($username, $pass){
        if ($this->OpenDB() == false) {
            echo "データベースを開けませんでした";
            return false;
        }

        $result = $this->db->query("SELECT EXISTS(SELECT * 
        FROM user_table 
        WHERE username = '$username'
        AND pass = '$pass');");
        
        if($result->fetchArray()[0] == "1"){
            return true;
        }
        return false;
    }
}