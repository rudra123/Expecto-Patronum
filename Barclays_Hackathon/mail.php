<?php

if(mail("rjpurswani@gmail.com", "Test", "Test text", "From: rudra.mishra35@gmail.com"))
	echo 'Done<br>';
else
	echo 'failed';

?>