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

	function getstates() {
		$sql = wire('database')->prepare("SELECT * FROM states");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
    
    function is_loggedin($sessionID, $debug) {
        $sql = wire('database')->prepare("SELECT IF(validlogin = 'Y',1,0) as validlogin FROM login WHERE sessionid = :sessionid");
		$switching = array(':sessionid' => $sessionID); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
    }
    
    function get_loginrecord($sessionID, $debug) {
        $sql = wire('database')->prepare("SELECT * FROM login WHERE sessionid = :sessionid");
		$switching = array(':sessionid' => $sessionID); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetch(PDO::FETCH_ASSOC);
		}
    }
