<?php

class Twitter_DBConnect {

    static $db;
    private $dbh;

    private function Twitter_DBConnect() {
        try {
            $this->dbh = new PDO('sqlite:t_users');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "\n";
            die ();
        }
    }

    public static function getInstance() {
        if (!isset(Twitter_DBConnect::$db)) {
            Twitter_DBConnect::$db = new Twitter_DBConnect ( );
        }
        return Twitter_DBConnect::$db->dbh;
    }

}
?>
