<?php

 /* =============================================================
   CART FUNCTIONS
 ============================================================ */

 	function get_cart_count($sessionid, $debug) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM cart WHERE sessionid = :sessionid");
		$switching = array(':sessionid' => $sessionid); $withquotes = array(true);

		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function get_cart($sessionid, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM cart WHERE sessionid = :sessionid AND itemid != ''");
		$switching = array(':sessionid' => $sessionid); $withquotes = array(true);

		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function remove_cartline($sessionid, $linenbr, $debug) {
		$sql = wire('database')->prepare("DELETE FROM cart WHERE sessionid = :sessionid AND recordno = :linenbr");
		$switching = array(':sessionid' => $sessionid, ':linenbr' => $linenbr); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		}
	}

	function update_cartline($sessionid, $linenbr, $qty, $debug) {
		$sql = wire('database')->prepare("UPDATE cart SET qty = :qty WHERE sessionid = :sessionid AND recordno = :linenbr");
		$switching = array(':qty' => $qty, ':sessionid' => $sessionid, ':linenbr' => $linenbr); $withquotes = array(true, true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		}
	}


	function getcartmaxrecord($sessionid, $debug) {
		$sql = wire('database')->prepare("SELECT MAX(recordno) FROM cart WHERE sessionid = :sessionid");
		$switching = array(':sessionid' => $sessionid); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function insertintocart($sessionid, $itemID, $qty, $price, $debug) {
		$recnbr = getcartmaxrecord($sessionid, false) + 1;
		$sql = wire('database')->prepare("INSERT INTO cart (sessionid, recordno, itemid, qty, price, amount) VALUES (:sessionid, :recnbr, :itemid, :qty, :price, :amount)");
		$switching = array(':sessionid' => $sessionid, ':itemid' => $itemID, ':qty' => $qty, ':recnbr' => $recnbr, ':price' => $price, ':amount' => ($price * $qty)); $withquotes = array(true, true, true, true, true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return array('sql' => returnsqlquery($sql->queryString, $switching, $withquotes), 'insertedid' => wire('database')->lastInsertId());
		}
	}
