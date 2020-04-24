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
    for ($i = 0; $i < 2; $i ++) {
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
    $arr = $itemResult->fetch_assoc();

    $firstDate = strtotime($arr['start_date']);
    $lastDate = strtotime($arr['end_date']);

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
                $temp['start'] = strtotime($row['start_date']);
                $temp['end'] = strtotime($row['end_date']);
                array_push($unavailDates, $temp);
            }
        }
    }

    if (! empty($id) && ! empty($dates) && ! empty($ccID) && ! empty($addrID)) {
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
        if ($startDate < $firstDate || $lastDate < $endDate) {
            $isValidDateRange = false;
        }

        foreach ($unavailDates as $dateRange) {
            if ($startDate > $dateRange['start'] && $startDate < $dateRange['end']) {
                $isValidDateRange = false;
            }
            if ($endDate > $dateRange['start'] && $endDate < $dateRange['end']) {
                $isValidDateRange = false;
            }
            if ($startDate < $dateRange['start'] && $endDate > $dateRange['end']) {
                $isValidDateRange = false;
            }
            if ($startDate > $dateRange['start'] && $endDate < $dateRange['end']) {
                $isValidDateRange = false;
            }
        }
        unset($dateRange);

        if ($userHasAddr && $userHasCC && ! $item->isDeleted() && $item->isListed() && $isValidDateRange) {
            if (chargeCard($thisCard, $user->getFirstName() . " " . $user->getLastName(), $thisAddr, $cost)) {
                $st = $dates[0];
                $end = $dates[1];
                $stmt = $con->prepare("INSERT INTO borrows (start_date, end_date, item_ID, user_ID) VALUES (?,?,?,?)");
                $stmt->bind_param("ssss", $st, $end, $item->getID(), $user->getUserID());
                $stmt->execute();
                // $result = $stmt->get_result();
                $stmt->close();
                sendEmail();
                header("Location: " . __HOST__ . "user/myrentals.php");
            } else {}
        }
    } else {}
}

function sendEmail() {
  global $user, $item;
  $emaddr = $user->getEmail();
  $itemn = $item->getTitle();

  $msg = "You have successfully rented the following:" . $itemn . " Thanks for using YouLendToMe";

  $msg = wordwrap($msg,70);

  mail("prithik2000@gmail.com","Item Rental Notice",$msg);
}

function chargeCard($card, $name, $address, $amount)
{
    // here we would submit the card information to the card processor
    return true;
}



?>
