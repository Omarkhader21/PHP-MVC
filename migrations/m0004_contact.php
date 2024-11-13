<?php

use omarkhader\phpmvccore\Application;

class m0004_contact
{
    public function up()
    {
        $db = Application::$app->database;

        $SQL = "CREATE TABLE contacts(
            id INT AUTO_INCREMENT PRIMARY KEY,
            subject VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            message LONGTEXT NOT NULL,
            status TINYINT NOT NULL DEFUALT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->database;

        $SQL = "DROP TABLE contacts;";

        $db->pdo->exec($SQL);
    }
}
