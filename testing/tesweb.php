<?php

use PHPUnit\Framework\TestCase;

require_once "login.php";

class TestLogin extends TestCase {
    public function testLogins() {
        $log = new login();
        $email = "tes@gmail.com";
        $password = "12345678";

        $login = $log->LoginSystem($email,$password);

        $this->assertTrue($login);
    }
}

?>