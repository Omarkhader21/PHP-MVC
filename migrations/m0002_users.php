<?php

use omarkhader\phpmvccore\Application;

class m0002_users
{
    public function up()
    {
        $db = Application::$app->database;

        $SQL = "CREATE TABLE users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->database;

        $SQL = "DROP TABLE users;";

        $db->pdo->exec($SQL);
    }
}
