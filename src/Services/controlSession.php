<?php


namespace App\Services;


class controlSession
{

    public function __construct()
    {
        session_start();
    }

    public function isLogged()
    {
        if(isset($_SESSION['logged']) AND $_SESSION['logged'] == true)
        {
            return true;
        }
        return false;
    }

    public function setParams($params = [])
    {
        foreach($params as $key => $param)
        {
            $_SESSION[$key] = $param;
        }
    }


}