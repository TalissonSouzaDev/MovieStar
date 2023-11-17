<?php

class Message {
    private $url;

    protected $msg,$type;

    public function __construct($url)
    {
        $this->url = $url;
    }


    public function SetMessage($msg, $type, $redirect = "index.php")
    {
        $this->msg =  'msg';
        $this->type ='type';

        

        if($redirect != "back")
        {
            header("Location: $this->url".$redirect);
        }
        else {
            header("Location:". $_SERVER['HTTP_REFERER']);
        }
    }
    public function GetMessage()
    {


        if(!empty($_SESSION['msg'])){

            $_SESSION['msg'] = $this->msg;
            $_SESSION['type'] = $this->type;

            return [
                "msg" => $_SESSION['msg'],
                "type" => $_SESSION['type']

            ];
        }

        else{
            return false;
        }
    }
    public function ClearMessage()
    {
        $_SESSION['msg'] =  '';
        $_SESSION['type'] = '';

        session_destroy();

    }
}