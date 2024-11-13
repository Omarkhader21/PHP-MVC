<?php

namespace omarkhader21/phpcoremvc;

use omarkhader21/phpcoremvc\db\DbModel;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName (): string;
}
