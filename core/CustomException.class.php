<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 07/05/2017
 * Time: 22:07
 */
class CustomException extends Exception
{
    public function errorMessage() {
        //error message
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
            .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}