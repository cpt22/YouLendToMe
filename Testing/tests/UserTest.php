<?php
use PHPUnit\Framework\TestCase;
require_once SRC . "classes/User.php";

final class UserTest extends TestCase
{

    private $user;

    protected function setUp(): void
    {
        $this->user = new User(/**FIX**/);
    }

    protected function tearDown(): void
    {
        $this->user = NULL;
    }

    
}