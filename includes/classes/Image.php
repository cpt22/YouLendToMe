<?php
class Image {
    private $filename;
    private $item_ID;
    
    public function __construct($filename, $item_ID) {
        $this->filename = $filename;
        $this->item_ID = $item_ID;
    }
    
    public function getFile() {
        return $this->filename;
    }
    
    public function getItemID() {
        return $this->item_ID;
    }
}
?>