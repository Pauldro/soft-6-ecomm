<?php
	if ($input->post->action) {
		$action = $input->post->text('action');
		$itemID = $input->post->text('itemID');
		$qty = $input->post->text('qty');
	} else {
		$action = $input->get->text('action');
		$itemID = $input->get->text('itemID');
		$qty = $input->get->text('qty');
	}

	if (empty($qty) && $qty != '0') {$qty = "1"; }

	/**
	* CART REDIRECT
	* @param string $action
	*
	*
	*
	* switch ($action) {
	*	case 'add-to-cart':
	*		DBNAME=$config->DBNAME
	*		CARTDET
	*		ITEMID=$itemID
	*		CUSTID=$custID
	*		SHIPTOID=$shipID
	*		WHSE=$whse  **OPTIONAL
	*		break;
	*/

	switch ($action) {
        case 'add-to-cart':
			$product = $pages->get("product_model=$itemID");
			insertintocart(session_id(), $itemID, $qty, $product->price, false);
            $session->addtocart = 'You added ' . $qty . ' of ' . $itemID . ' to your cart';
			$session->loc = $input->post->page;
            break;

		case 'remove-line':
			$linenbr = $input->post->text('linenbr');
			remove_cartline(session_id(), $linenbr, false);
			$session->loc = $input->post->page;
			break;

		case 'update-line':
			$product = $pages->get("product_model=$itemID");
			$linenbr = $input->post->text('linenbr');
			update_cartline(session_id(), $linenbr, $qty, $product->price, false);
			$session->loc = $input->post->page;
			break;
	}

	header('Location: '. $session->loc);
	break;
