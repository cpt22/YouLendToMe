<?php

require_once SRC . 'classes/Image.php';

class Item {
    private $title;
    private $description;
    private $rate;
    private $startDate;
    private $endDate;
    private $listed;
    private $borrowed;
    private $location;
    private $category = array();
    private $owner;
    private $ID;
    private $images = array();
    private $deleted;



    public function __construct($ID) {
        $this->ID = $ID;
        $this->initialize($ID);
    }


    private function initialize($ID) {
        global $con;        
        $sql = "SELECT * FROM items WHERE ID=?";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $ID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows == 1) {
            $item = $result->fetch_assoc();
            $this->title = $item['title'];
            $this->description = $item['description'];
            $this->rate = $item['rate'];
            $this->startDate = $item['start_date'];
            $this->endDate = $item['end_date'];
            $this->listed = $item['listed'];
            $this->borrowed = $item['borrowed'];
            $this->location = $item['location'];
            $this->category['ID'] = $item['category'];
            $this->owner = $item['owner_ID'];
            $this->deleted = $item['deleted'];
        } else {
            return;
        }

        $this->loadImages();
        $this->loadCategory();
    }


    /*
     * GETTERS
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function isListed()
    {
        return $this->listed == 1 ? true : false;
    }

    public function isBorrowed()
    {
        return $this->borrowed == 1 ? true : false;
    }

    public function isDeleted() {
        return $this->deleted == 1 ? true : false;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getID()
    {
        return $this->ID;
    }

    public function getImages()
    {
        return $this->images;
    }

    /**
     * Loads all images associated with this item from the database into this item object
     */
    protected function loadImages() {
        global $con;
        $id = $this->ID;
        $sql = "SELECT filename FROM images WHERE item_ID='$id'";
        $result = $con->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($this->images, new Image($row['filename'], $this->ID));
            }
        }
    }

    protected function loadCategory() {
        global $con;
        $cat_id = $this->category['ID'];
        $result = $con->query("SELECT name FROM categories WHERE ID='$cat_id'");
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $this->category['name'] = $row['name'];
            }
        }
    }

}
