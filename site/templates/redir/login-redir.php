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
            if (is_loggedin(session_id(), false)) {
                $session->loc = $pages->get('/user/')->url;
            } else {
                $session->loc = $pages->get('/user/login/')->url;
            }
            break;
        }

	header('Location: '. $session->loc);
	exit;
