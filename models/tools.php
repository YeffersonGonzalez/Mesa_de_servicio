<?php

class webtools{

    function userAuthorizad($rolActive, $rolAuthorized){
        if($rolActive == $rolAuthorized){
            return true;
        }else{
            return false;
        }
    }
}

?>