<?php

class Login{
    public function LoginSystem($email,$password)
    {
        $email = "tes@gmail.com";
        $pass = "12345678";
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {	
			if($email == $email && $password == $pass) {
                return true;
            } else 
            {
                return false;
            }
		} else {
            return false;
        }
    }
}

?>