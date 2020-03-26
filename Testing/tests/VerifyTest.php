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
}