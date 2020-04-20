<?php
if (isset($_POST['submit'])) {
    $unavailDates = array();
    
    $id = $item->getID();
    $dates = $_POST['dateRange'];
    $ccID = $_POST['cc'];
    $addrID = $_POST['address'];    
    
    $dates = cleanData($dates);
    $ccID = cleanAlphanumeric($ccID);
    $addrID = cleanAlphanumeric($addrID);
    
    $dates = explode('-', str_replace(" ", "", $dates));
    for ($i = 0; $i < 2; $i++) {
        $date = explode("/", $dates[$i]);
        $day = $date[1];
        $month = $date[0];
        $year = $date[2];
        $dates[$i] = $year . "-" . $month . "-" . $day;
    }
    
    $startDate = strtotime($dates[0]);
    $endDate = strtotime($dates[1]);
    
    $numDays = round(($endDate - $startDate) / (60 * 60 * 24));
    $cost = $numDays * $item->getRate();
    
    $stmt = $con->prepare("SELECT start_date, end_date FROM items WHERE ID=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $itemResult = $stmt->get_result();
    $stmt->close();
    
    $firstDate = $itemResult->fetch_assoc()['start_date'];
    $lastDate = $itemResult->fetch_assoc()['end_date'];
    
    if ($itemResult->num_rows == 1) {
        $itemResult = $itemResult->fetch_assoc();
        
        $stmt = $con->prepare("SELECT start_date,end_date FROM borrows WHERE item_ID=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array();
                $temp['start'] = $row['start_date'];
                $temp['end'] = $row['end_date'];
                array_push($unavailDates, $temp);
            }
        }
    }
    
    if (!empty($id) && !empty($dates) && !empty($ccID) && !empty($addrID)) {
        $thisCard = $thisAddr = null;
        $userHasCC = $userHasAddr = false;
        $isValidDateRange = true;
        foreach ($user->getCards() as $card) {
            if ($card->getID() == $ccID) {
                $thisCard = $card;
                $userHasCC = true;
            }
        }
        unset($card);
        foreach ($user->getAddresses() as $address) {
            if ($address->getID() == $addrID) {
                $thisAddr = $address;
                $userHasAddr = true;
            }
        }
        unset($address);
        
        if ($firstDate > $startDate || $lastDate < $endDate)
            //$isValidDateRange = false;
        
        foreach ($unavailDates as $dateRange) {
            if ($dateRange['start_date'] > $startDate && $dateRange['start_date'] < $endDate)
                $isValidDateRange = false;
            if ($dateRange['end_date'] > $startDate && $dateRange['end_date'] < $endDate)
                $isValidDateRange = false;
            if ($startDate > $dateRange['start_date'] && $endDate < $dateRange['end_date'])
                $isValidDateRange = false;
        }
        unset($dateRange);
        
        var_dump($isValidDateRange);
        if($userHasAddr && $userHasCC && !$item->isDeleted() && $item->isListed() && $isValidDateRange) {
            if (chargeCard($thisCard, $user->getFirstName() . " " . $user->getLastName(), $thisAddr, $cost)) {
                $stmt = $con->prepare("INSERT INTO borrows (start_date, end_date, item_ID, user_ID) VALUES (?,?,?,?)");
                $stmt->bind_param("ssss", $dates[0], $dates[1], $item->getID(), $user->getUserID());
                $stmt->execute();
                //$result = $stmt->get_result();
                $stmt->close();
                header("Location: " . __HOST__ . "user/myrentals.php");
            } else {
                
            }
        }
    } else {
        
    }
    
}


function chargeCard($card, $name, $address, $amount) {
    // here we would submit the card information to the card processor
    return true;
}


?>