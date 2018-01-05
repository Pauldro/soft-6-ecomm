<?php 
    trait ThrowErrorTrait {
        protected function error($error, $level = E_USER_ERROR) {
            $class = get_class($this);
			$error = (strpos($error, "DPLUSO [$class]: ") !== 0 ? "DPLUSO [$class]: " . $error : $error);
			trigger_error($error, $level);
			return;
		}
    }
