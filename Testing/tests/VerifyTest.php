<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once SRC . "misc/verify.php";

final class VerifyTest extends TestCase
{
    public function setUp(): void {

    }

    public function tearDown(): void {

    }

    public function testIsValidEmail(): void {
        $this->assertEquals(true, verifyEmail("ctingle18@gmail.com"));
        $this->assertEquals(false, verifyEmail("c@"));
        $this->assertEquals(false, verifyEmail("@gmail.com"));
        $this->assertEquals(false, verifyEmail("christian@g"));
        $this->assertEquals(false, verifyEmail("ˆ˚¨∆@gmail.com"));
    }

    public function testVerifyUsername(): void {
        $this->assertEquals(true, verifyUsername("ctingle18"));
        $this->assertEquals(false, verifyUsername("ctin2@"));
        $this->assertEquals(true, verifyUsername("ASFRG"));
    }

    public function testVerifyDate(): void {
      $this->assertEquals(true, verifyDate("12/12/2020"));
      $this->assertEquals(false, verifyDate("12/12/20"));
    }

    public function testVerifyPhone(): void {
        $this->assertEquals(true, verifyPhone("1234567890"));
        $this->assertEquals(false, verifyPhone("11234567890"));
    }

    public function testVerifyAddress(): void {

          $this->assertEquals(true, verifyAddress("123 Oak Dr."));
          $this->assertEquals(false, verifyAddress("123 Oak Dr?"));

    }

    public function testVerifyState(): void {

    }

    public function testVerifyZipcode(): void {

    }

    public function testVerifyPasscode(): void {

    }

    public function testVerifyMoney(): void{

    }

    public function testVerifyDate(): void{

    }

    public function testCheckIfRecordExists(): void{

    }

    //should we test the clean functions
}
