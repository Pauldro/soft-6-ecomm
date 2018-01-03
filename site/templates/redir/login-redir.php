<?php
	if ($input->post->action) {
		$action = $input->post->text('action');
	} else {
		$action = $input->get->text('action');
	}

    switch ($action) {
        case 'login':
            $email = $input->post->text('email');
            $pass = $input->post->text('password');
			userlogin(session_id(), $email, $pass);
			if (empty($email) || empty($pass)) {
				$session->loginerror = 'One or more fields are empty.';
			} else {
				
			}

            if (is_loggedin(session_id(), false)) {
                $session->loc = $pages->get('/user/')->url;
            } else {
                $session->loc = $pages->get('/user/login/')->url;
            }
            break;
		case 'logout':
			if (is_loggedin(session_id(), false)) {
				userlogout(session_id());
				$session->loc = $pages->get('/user/logout/')->url;
			}
			break;
        }

	header('Location: '. $session->loc);
	exit;
