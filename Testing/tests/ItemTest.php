<?php
use PHPUnit\Framework\TestCase;
require_once SRC . "classes/Item.php";

final class ItemTest extends TestCase
{
    private $item;
    
    protected function setUp(): void
    {
        $this->item = new Item("f6f6f6f6f6");
    }
    
    protected function tearDown(): void
    {
       $this->item = NULL;
    }
    
    public function testTitle(): void {
        $this->assertEquals("test title", $this->item->getTitle());
    }
    
    public function testDesc(): void {
        $this->assertEquals("test description", $this->item->getDescription());
    }
 
}