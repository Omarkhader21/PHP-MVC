<?php 

namespace omarkhader21/phpcoremvc\exception;

class NotFoundException extends \Exception
{
    protected $code = 404;
    protected $message = "The page not found.";
}
