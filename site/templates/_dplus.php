<?php 
 /* =============================================================
   CART FUNCTIONS
 ============================================================ */
	function insertintocart($sessionID, $itemID, $qty, $price, $debug) {
		$recnbr = getcartmaxrecord($sessionID, false) + 1;
		$sql = wire('database')->prepare("INSERT INTO cart (sessionid, recordno, itemid, qty, price, amount) VALUES (:sessionid, :recnbr, :itemid, :qty, :price, :amount)");
		$switching = array(':sessionid' => $sessionID, ':itemid' => $itemID, ':qty' => $qty, ':recnbr' => $recnbr, ':price' => $price, ':amount' => ($price * $qty)); $withquotes = array(true, true, true, true, true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return array('sql' => returnsqlquery($sql->queryString, $switching, $withquotes), 'insertedid' => wire('database')->lastInsertId());
		}
	}

	function remove_cartline($sessionID, $linenbr, $debug) {
		$sql = wire('database')->prepare("DELETE FROM cart WHERE sessionid = :sessionid AND recordno = :linenbr");
		$switching = array(':sessionid' => $sessionID, ':linenbr' => $linenbr); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		}
	}

	function update_cartline($sessionID, $linenbr, $qty, $debug) {
		$sql = wire('database')->prepare("UPDATE cart SET qty = :qty WHERE sessionid = :sessionid AND recordno = :linenbr");
		$switching = array(':qty' => $qty, ':sessionid' => $sessionID, ':linenbr' => $linenbr); $withquotes = array(true, true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		}
	}

	function carthasitem($sessionID, $itemID, $debug) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM cart WHERE sessionid = :sessionid AND itemid = :itemID");
		$switching = array(':sessionid' => $sessionid, ':itemID' => $itemID); $withquotes = array(true, true);

		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function getitemline($sessionID, $itemID, $debug) {
		$sql = wire('database')->prepare("SELECT recordno FROM cart WHERE sessionid = :sessionid AND itemid = :itemID LIMIT 1");
		$switching = array(':sessionid' => $sessionid, ':itemID' => $itemID); $withquotes = array(true, true);

		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}


	function dplusaddtocart($sessionID, $itemID, $qty, $price, $debug) {
		if (carthasitem($sessionID, $itemID, $debug)) {
			$linenbr = getitemline($sessionID, $itemID, false);
			return update_cartline($sessionID, $linenbr, $qty, $debug);
		} else {
			return insertintocart($sessionID, $itemID, $qty, $price, $debug);
		}
	}