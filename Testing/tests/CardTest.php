<?php
use PHPUnit\Framework\TestCase;
require_once SRC . "classes/Card.php";

final class CardTest extends TestCase
{

    private $card;

    protected function setUp(): void
    {
        $this->card = new Card("12345678", 01, 22, 123, "f6f6f6f6f6");
    }

    protected function tearDown(): void
    {
        $this->card = NULL;
    }

    public function testGetNumber() {
          $this->assertEquals("12345678", $this->card->getNumber());
    }

    public function testGetRedactedNumber() {
      $this->assertEquals("****5678", $this->card->getRedactedNumber());

    }

    public function testGetExpMonth() {
      $this->assertEquals(01, $this->card->getExpMonth());
    }

    public function testGetExpYear() {

        $this->assertEquals(22, $this->card->getExpYear());
    }

    public function testGetCVV() {

        $this->assertEquals(123, $this->card->getCVV());
    }

    public function testGetID() {

        $this->assertEquals("f6f6f6f6f6", $this->card->getID());
    }
}
