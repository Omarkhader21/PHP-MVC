<?php

use app\core\Application;

class M0003_add_password_users_table
{
    public function up()
    {
        $db = Application::$app->database;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(521) NOT NULL;");
    }

    public function down()
    {
        $db = Application::$app->database;
        $db->pdo->exec("ALTER TABLE users DROP COLUMN password;");
    }
}
