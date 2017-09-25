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
	
	function writeloginrecord($sessionid, $date, $time, $custid, $shiptoid, $name, $contact, $validlogin, $cconly, $ermes, $debug) {
		$sql = wire('database')->prepare("INSERT INTO login (sessionid, date, time, custid, shiptoid, name, contact, validlogin, cconly, ermes) VALUES (:sessionid, :date, :time, :custid, :shiptoid, :name, :contact, :validlogin, :cconly, :ermes)");
		$switching = array(':sessionid' => $sessionid, ':date' => $date, ':time' => $time, ':custid' => $custid, ':shiptoid' => $shiptoid, ':name' => $name, ':contact' => $contact, ':validlogin' => $validlogin, ':cconly' => $cconly, ':ermes' => $ermes); 
		$withquotes = array(true, true, true, true, true, true, true, true, true, true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		}
	}
	
	function userlogin($sessionID, $email, $password) {
		$date = date('Ymd');
		$time = date('his');
		$logins = array(
			'paul@cptechinc.com' => array(
				'email' => 'paul@cptechinc.com',
				'password' => 'apple10',
				'custid' => 'BECKER',
				'shiptoid' => '',
				'name' => 'Becker Golf Supply',
				'contact' => 'Paul Gomez',
				'cconly' => 'N'
			),
			'barbara@cptechinc.com' => array(
				'email' => 'paul@cptechinc.com',
				'password' => 'tinypants1',
				'custid' => 'BECKER',
				'shiptoid' => '123456',
				'name' => 'Becker Golf Supply',
				'contact' => 'Paul Gomez',
				'cconly' => 'Y'
			)
		);
		if (array_key_exists($email, $logins)) {
			if ($logins[$email]['password'] == $password) {
				if (!is_loggedin($sessionID, false)) {
					writeloginrecord($sessionID, $date, $time, $logins[$email]['custid'], $logins[$email]['shiptoid'], $logins[$email]['name'], $logins[$email]['contact'], 'Y', $logins[$email]['cconly'], '', false);
					wire('session')->remove('loginerror');
				}
			}
		} else {
			writeloginrecord($sessionID, $date, $time, '', '', '', '', 'Y', '', 'Invalid Email or Password', false);
			wire('session')->loginerror = true;
		}
	}
