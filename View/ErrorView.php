<?php
/**
 * Created by PhpStorm.
 * User: kolo
 * Date: 03/03/14
 * Time: 17:02
 */


class ErrorView {
    public $errorCode;
    public $message;

    function __construct($errorCode, $message)
    {
        $this->errorCode = $errorCode;
        $this->message = $message;
    }
    function show(){
        $htmlResult="<div class='error'><h1>".$this->errorCode."</h1>";
        $htmlResult.="<pre>".$this->message."</pre>";
        return $htmlResult;
    }

}