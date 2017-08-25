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

	function family_exists($familyID, $debug) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM family WHERE famID = :famID");
		$switching = array(':famID' => $familyID); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function item_exists($itemID, $debug) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM im WHERE itemid = :itemID");
		$switching = array(':itemID' => $itemID); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function get_familymaxrecnbr($debug) {
		$sql = wire('database')->prepare("SELECT MAX(recno) FROM family");
		if ($debug) {
			return $sql->queryString;
		} else {
			$sql->execute();
			return $sql->fetchColumn();
		}
	}

	function get_itemim($itemID, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM im WHERE itemid = :itemID");
		$switching = array(':itemID' => $itemID); $withquotes = array(true);

		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetch(PDO::FETCH_ASSOC);
		}
	}

	function get_immaxrecnbr($debug) {
		$sql = wire('database')->prepare("SELECT MAX(recordno) FROM im");
		if ($debug) {
			return $sql->queryString;
		} else {
			$sql->execute();
			return $sql->fetchColumn();
		}
	}
	
	function insert_family($family, $debug) {
		$q = new atk4\dsql\Query();
		$q->mode('insert')->table('family');
		$q = makedsqlqueryinsert($q, $family);
		$sql = wire('database')->prepare($q->render());
		if ($debug) {
			return $q->getDebugQuery();
		} else {
			$sql->execute($q->params);
			return array('sql' => $q->getDebugQuery(), 'insertedid' => wire('database')->lastInsertId());
		}
	}

	function insert_product($product, $debug) {
		$q = new atk4\dsql\Query();
		$q->mode('insert')->table('im');
		$q = makedsqlqueryinsert($q, $product);
		$sql = wire('database')->prepare($q->render());
		if ($debug) {
			return $q->getDebugQuery();
		} else {
			$sql->execute($q->params);
			return array('sql' => $q->getDebugQuery(), 'insertedid' => wire('database')->lastInsertId());
		}
	}

	function makedsqlqueryinsert(atk4\dsql\Query $q, $insertvalues) {
		foreach ($insertvalues as $key => $value) {
			if (trim($value) != '') {
				$q->set($key, $value);
			}
			
		}
		return $q;
	}