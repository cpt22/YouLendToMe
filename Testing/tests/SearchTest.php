<?php

declare(strict_types = 1);
use PHPUnit\Framework\TestCase;
require_once SRC . "itemProc/searchItem.php";

final class SearchTest extends TestCase
{
    private $item;
    public function setUp(): void
    {
        $this->item = new Item("f6f6f6f6f6");
    }
    
    public function tearDown(): void
    {
        $this->item = NULL;
    }
    
    public function testSearch(): void
    {
        $items = getResults("test");
        $this->assertEquals(true, in_array($this->item, $items));
        $items = getResults("invalid");
        $this->assertEquals(false, in_array($this->item, $items));
    }
    
}
