<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once('twitter_db_connect.php');
session_start();

class Twitter_DB_Actions {

    private $dbh; //database handle

    public function __construct() {
        $this->dbh = Twitter_DBConnect::getInstance();
        $this->createTable();
    }

    public function createTable() {

        $query = "CREATE TABLE IF NOT EXISTS oauth_users(
            oauth_user_id INTEGER,
            oauth_screen_name TEXT,
            oauth_provider TEXT,
            oauth_token  TEXT,
            oauth_token_secret TEXT
        )";
        $this->dbh->exec($query);
    }

    public function saveUser($accessToken) {
        $users = $this->getTwitterUserByUID( intval($accessToken['user_id']) );
        if (count($users)) {
            $this->updateUser($accessToken, 'twitter');
        } else {
            $this->insertUser($accessToken, 'twitter');
        }
    }

    public function getTwitterUsers() {
        $query = "SELECT * from oauth_users WHERE oauth_provider = 'twitter'";
        $stmt = $this->dbh->query( $query );
        $rows = $stmt->fetchAll( PDO::FETCH_OBJ );
        return $rows;
    }

    public function getTwitterUserByUID($uid) {
        $query = "SELECT * from oauth_users WHERE oauth_provider= 'twitter' AND oauth_user_id = ?";
        $stmt = $this->dbh->prepare( $query );
        $stmt->execute( array( $uid ) );
        $rows = $stmt->fetchAll( PDO::FETCH_OBJ );
        return $rows;
    }

    public function insertUser($user_info, $provider = '') {
        $query = "INSERT INTO oauth_users (oauth_user_id, oauth_screen_name,
                oauth_provider, oauth_token, oauth_token_secret) VALUES (?, ?, ?, ?, ?)";
        $values = array(
                $user_info['user_id'], $user_info['screen_name'], $provider,
                $user_info['oauth_token'], $user_info['oauth_token_secret'] );
        $stmt = $this->dbh->prepare( $query );
        $stmt->execute( $values );
        echo "Inserted user: {$user_info['screen_name']}";
    }

    public function updateUser($user_info, $provider = '') {
        $query = "UPDATE oauth_users SET oauth_token = ?, oauth_token_secret = ?,
                oauth_screen_name = ?
                WHERE oauth_provider = ? AND oauth_user_id = ?";
        $values = array( $user_info['screen_name'], $user_info['oauth_token'],
        $user_info['oauth_token_secret'], $provider, $user_info['user_id'] );
        $stmt = $this->dbh->prepare( $query );
        $stmt->execute( $values );
        echo "Updated user: {$user_info['screen_name']}";
    }
}
?>