<?php 

namespace Core;

class Request{
    static $postvalue;
    static $getvalue;
    public function securePost($postEmail, $postPwd){
      
        $email = substr(json_encode(htmlspecialchars(strip_tags(trim($_POST["email"])))), 1, -1);
        $pwd = substr(json_encode(htmlspecialchars(strip_tags(trim($_POST["password"])))), 1, -1);
        $postvalue = [$email,$pwd];
        self::$postvalue = $postvalue;
    }

    public function secureGet($getEmail, $getPwd){
        
        $email = substr(json_encode(htmlspecialchars(strip_tags(trim($_GET["email"])))), 1, -1);
        $pwd = substr(json_encode(htmlspecialchars(strip_tags(trim($_GET["password"])))), 1, -1);
        $getvalue = [$email,$pwd];
        self::$getvalue = $getvalue;
    }
}