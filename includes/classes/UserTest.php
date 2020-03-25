<?php
require 'User.php';

class UserTest extends PHPUnit_Framework_TestCase
{
    private $user;

    protected function setUp()
    {
        $this->user = new User();
    }

    protected function tearDown()
    {
        $this->user = NULL;
    }

    public function testLoadAddresses()
    {
        $result = $this->user->loadAddresses();
        $this->assertEquals($result, $result);
    }


    public function testLoadCards()
    {
        $result = $this->user->loadCards();
        $this->assertEquals($result, $result);
    }

}
