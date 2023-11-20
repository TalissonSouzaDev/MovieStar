<?php
class Message {

    protected $msg,$type;

    public function SetMessage($msg, $type, $redirect = "index.php")
    {

      // return print_r($_SESSION['msg']);

        if($redirect != "back")
        {
            $_SESSION['msg'] =  $msg;
            $_SESSION['type'] = $type;
            header("Location:".$redirect);
        }
        else {
            header("Location:". $_SERVER['HTTP_REFERER']);
        }
    }
    public function GetMessage(): array
    {
        $message = [];
           
        if(isset($_SESSION['msg']) && isset($_SESSION['type']))
        {
            $message = [
                "msg" => $_SESSION['msg'],
                "type" => $_SESSION['type']
            ];

            return $message;
        }
  

            return $message;
     
    }
    public function ClearMessage()
    {
        $_SESSION['msg'] =  '';
        $_SESSION['type'] = '';


    }
}