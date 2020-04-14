<?php
use PHPUnit\Framework\TestCase;
require_once SRC . "classes/User.php";

final class UserTest extends TestCase
{

    private $user;

    protected function setUp(): void
    {
        $this->user = new User("test");
    }

    protected function tearDown(): void
    {
        $this->user = NULL;
    }
//test whether username is right
    public function testUsername(): void {
        $this->assertEquals("test", $this->user->getUsername());
    }
//test whether email is right
    public function testEmail(): void {
        $this->assertEquals("test@youlendto.me", $this->user->getEmail());
    }
//test whether first name is returned
    public function testFirstName(): void {
        $this->assertEquals("Test-First", $this->user->getFirstName());
    }

//test whether last name is returned

    public function testLastName(): void {
        $this->assertEquals("Test-Last", $this->user->getLastName());
    }
//test whether phone number is returned

    public function testPhone(): void {
        $this->assertEquals("0000000000", $this->user->getPhone());
      }

//test whether addresses are returned
    public function testAddress(): void {
        $this->assertEquals("test1", $this->user->getAddresses()[0]->getLine1());
        $this->assertEquals("test2", $this->user->getAddresses()[0]->getLine2());
        $this->assertEquals("testcity", $this->user->getAddresses()[0]->getCity());
        $this->assertEquals("teststate", $this->user->getAddresses()[0]->getState());
        $this->assertEquals("10101", $this->user->getAddresses()[0]->getZipcode());
      }
//test credit card information
    public function testCredit(): void {
        $this->assertEquals("0000000000000000", $this->user->getCards()[0]->getNumber());
        $this->assertEquals("1", $this->user->getCards()[0]->getExpMonth());
        $this->assertEquals("2024", $this->user->getCards()[0]->getExpYear());
        $this->assertEquals("123", $this->user->getCards()[0]->getCVV());
      }


}
