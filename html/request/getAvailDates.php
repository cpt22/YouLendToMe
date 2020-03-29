<?php
if (! isUserLoggedIn()) {
    die();
}

$to_return = array();
$to_return['unavailDates'] = array();

if (isset($_POST['id'])) {
    $id = cleanData($_POST['id']);

    $stmt = $con->prepare("SELECT start_date, end_date FROM items WHERE ID=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $itemResult = $stmt->get_result();
    $stmt->close();

    if ($itemResult->num_rows == 1) {
        $itemResult = $itemResult->fetch_assoc();
        
        $to_return['start'] = date('m/d/Y', strtotime($itemResult['start_date']));
        $to_return['end'] = date('m/d/Y', strtotime($itemResult['end_date']));
        
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
                array_push($to_return['unavailDates'], $temp);
            }
        }
    }
} else {}

echo json_encode($to_return);
?>