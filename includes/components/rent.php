<?php 
$cards = $addrs = array();

foreach ($user->getCards() as $card) {
    $modified_num = $card->getRedactedNumber();
    $cards[$card->getID()] = ($modified_num . "<br>" . $card->getExpMonth() . "/" . $card->getExpYear());
}
unset($card);

foreach ($user->getAddresses() as $address) {
    $ret = $address->getLine1() . "<br>";
    if (!empty($address->getLine2()))
        $ret .= $address->getLine2() . "<br>";
    $ret .= $address->getCity() . ", " . $address->getState() . " " . $address->getZipcode();
    $addrs[$address->getID()] = $ret;
}
unset($address);
?>
<div class="row p-2" style="display: none" id="rentalFormContainer">

	<form method="post" action="">
		<div class="form-group">
				<div class="form-group">
					<input type="text" id="rentDateRange" class="form-control"
				name="dateRange"></input>
				</div>
				<div class="form-group">
					<select id="cardSelect" class="selectpicker form-control" name="cc">
						<?php 
						foreach($cards as $key=>$card) {
						    echo '<option value="'. $key . '">' . $card . '</option>';
						}
						unset($card);
						unset($key);
						?>
					</select>
				</div>
				<div class="form-group">
					<select id="addressSelect" class="selectpicker form-control" name="cc">
						<?php 
						foreach($addrs as $key=>$address) {
						    echo '<option value="'. $key . '">' . $address . '</option>';
						}
						unset($card);
						unset($key);
						?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Rent</button>
				</div>
		</div>
	</form>
</div>