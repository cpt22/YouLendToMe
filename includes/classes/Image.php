<?php
class Image {
    private $filename;
    private $item_ID;
    private $url;
    
    public function __construct($filename, $item_ID) {
        $this->filename = $filename;
        $this->url = __HOST__ . "images/item/" . $filename;
        $this->item_ID = $item_ID;
    }
    
    public function getFile() {
        return $this->filename;
    }
    
    public function getURL() {
        return $this->url;
    }
    
    public function getItemID() {
        return $this->item_ID;
    }
}
?>