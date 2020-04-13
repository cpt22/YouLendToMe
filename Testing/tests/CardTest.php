<?php
use PHPUnit\Framework\TestCase;
require_once SRC . "classes/Card.php";

final class CardTest extends TestCase
{

    private $card;

    protected function setUp(): void
    {
        $this->item = new Card("12345678", 01, 22, 123, "f6f6f6f6f6");
    }

    protected function tearDown(): void
    {
        $this->item = NULL;
    }

    protected function TestGetNumber() {
          $this->assertEquals("12345678", $this->card->getNumber());
    }

    protected function TestGetRedactedNumber() {
      $this->assertEquals("*****678", $this->card->getNumber());

    }

    protected function TestGetExpMonth() {
      $this->assertEquals(01, $this->card->getExpMonth());
    }

    protected function TestGetExpYear() {

        $this->assertEquals(22, $this->card->getExpYear());
    }

    protected function TestGetCVV() {

        $this->assertEquals(123, $this->card->getCVV());
    }

    protected function TestGetID() {

        $this->assertEquals("f6f6f6f6f6", $this->card->getID());
    }
}
