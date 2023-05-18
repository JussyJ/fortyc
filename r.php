<?php

    if (isset($_GET['page'])) {
		switch ($_GET['page']) {
		
				case "register"; { require_once 'views/register.php'; break; }
				case "registerw"; { require_once 'views/registerwelc.php'; break; }
				case "msglist"; { require_once 'views/msglist.php'; break; }
				case "userprofile"; { require_once 'views/userprofile.php'; break; }
				case "post"; { require_once 'post/post.php'; break; }
				
		}
	}



?>
