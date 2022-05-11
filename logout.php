<?php

require "../private/autoload.php";

if(isset($_SESSION['url_address']))
{
	unset($_SESSION['url_address']);
}

if(isset($_SESSION['consumerid']))
{
	unset($_SESSION['consumerid']);
}

header("Location: index.php");