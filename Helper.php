<?php

class Helper
{

    public static function notEmpty($input,$table, $attribute, $direct)
    {
       
            if ($input == "") {
                $_SESSION['error'] = $table ." ". $attribute." can't be empty";

                header("Location: /{$direct}");
                return true;
            }
        }
    
}
