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

    public function testTitle(): void
    {
        $this->assertEquals("test title", $this->item->getTitle());
    }

    public function testDesc(): void
    {
        $this->assertEquals("test description", $this->item->getDescription());
    }

    public function testRate(): void
    {
        $this->assertEquals("280.00", $this->item->getRate());
    }

    public function testListed(): void
    {
        $this->assertEquals(1, $this->item->isListed());
    }

    public function testBorrowed(): void
    {
        $this->assertEquals(1, $this->item->isBorrowed());
    }

    public function testLocation(): void
    {
        $this->assertEquals(10101, $this->item->getLocation());
    }

    public function testCategory(): void
    {
        $this->assertEquals(6, $this->item->getCategory()['ID']);
    }

    public function testOwner(): void
    {
        $this->assertEquals(23, $this->item->getOwner());
    }

    public function testID(): void
    {
        $this->assertEquals("f6f6f6f6f6", $this->item->getID());
    }

    public function testImages(): void
    {
        $img = $this->item->getImages()[0];
        var_dump($img); 
        $this->assertEquals("thisisatestimage", $img->getFile());
        $this->assertEquals(__HOST__ . "images/item/thisisatestimage", $img->getURL());
    }

    public function testDeleted(): void
    {
        $this->assertEquals(1, $this->item->isDeleted());
    }

    public function testStartDate(): void
    {
        $this->assertEquals("2020-05-05", $this->item->getStartDate());
    }

    public function testEndDate(): void
    {
        $this->assertEquals("2020-06-06", $this->item->getEndDate());
    }
}