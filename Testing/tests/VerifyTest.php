<?php

declare(strict_types = 1);
use PHPUnit\Framework\TestCase;
require_once SRC . "misc/verify.php";

final class VerifyTest extends TestCase
{

    public function setUp(): void
    {}

    public function tearDown(): void
    {}

    public function testIsValidEmail(): void
    {
        $this->assertEquals(true, verifyEmail("ctingle18@gmail.com"));
        $this->assertEquals(false, verifyEmail("c@"));
        $this->assertEquals(false, verifyEmail("@gmail.com"));
        $this->assertEquals(false, verifyEmail("christian@g"));
        $this->assertEquals(false, verifyEmail("ˆ˚¨∆@gmail.com"));
    }

    public function testVerifyUsername(): void
    {
        $this->assertEquals(true, verifyUsername("ctingle18"));
        $this->assertEquals(false, verifyUsername("ctin2@"));
        $this->assertEquals(true, verifyUsername("ASFRG"));
    }

    public function testVerifyDate(): void
    {
        $this->assertEquals(true, verifyDate("2000-06-02"));
        $this->assertEquals(false, verifyDate("09-08-2000"));
        $this->assertEquals(false, verifyDate("12/12/2020"));
        $this->assertEquals(false, verifyDate("12/12/20"));
    }

    public function testVerifyPhone(): void
    {
        $this->assertEquals(true, verifyPhone("2177880822"));
        $this->assertEquals(true, verifyPhone("21778808221"));
        $this->assertEquals(false, verifyPhone("AB77880822"));
        $this->assertEquals(true, verifyPhone("11111111111"));
    }

    public function testVerifyAddress(): void
    {
        $this->assertEquals(true, verifyAddress("220C Michelson House Cleveland #44106"));
        $this->assertEquals(false, verifyAddress("%% mike l//,,"));

        $this->assertEquals(true, verifyAddress("123 Oak Dr."));
        $this->assertEquals(false, verifyAddress("123 Oak Dr?"));
    }

    public function testVerifyState(): void {
        $this->assertEquals(false, verifyState("home"));
        $this->assertEquals(true, verifyState("Illinois"));
    }

    public function testVerifyZipcode(): void
    {
        $this->assertEquals(true, verifyZipcode("44106"));
        $this->assertEquals(false, verifyZipcode("ABCDEF"));
        $this->assertEquals(false, verifyZipcode("4410676"));
    }

    public function testVerifyPassword(): void
    {
        $this->assertEquals(false, verifyPassword("michelson"));
        $this->assertEquals(false, verifyPassword("hello"));
        $this->assertEquals(false, verifyPassword("helloworld1"));
        $this->assertEquals(false, verifyPassword("h########1"));
        $this->assertEquals(true, verifyPassword("Helloworld1"));
        $this->assertEquals(true, verifyPassword("Helloworld@"));
        
    }

    public function testVerifyMoney(): void
    {
        $this->assertEquals(false, verifyMoney("USD0"));
        $this->assertEquals(true, verifyMoney("50"));
        $this->assertEquals(true, verifyMoney("25.25"));
    }

}
