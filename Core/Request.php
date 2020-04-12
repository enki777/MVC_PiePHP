<?php 

namespace Core;

class Request{
    static $postvalue;
    static $getvalue;
    public function securePost(...$posts){
        
        $tab = [];
        foreach($posts[0] as $key => $value){
            $value = substr(json_encode(htmlspecialchars(strip_tags(trim($_POST[$key])))), 1, -1);
            array_push($tab, $value);
        }
        self::$postvalue = $tab;
    }

    public function secureGet(...$gets){
        
        $tab = [];
        foreach($gets[0] as $key => $value){
            $value = substr(json_encode(htmlspecialchars(strip_tags(trim($_GET[$key])))), 1, -1);
            array_push($tab, $value);
        }
        self::$getvalue = $tab;
    }
}