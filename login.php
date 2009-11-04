<?php
include("_inc.php");

$render = new Render("index");

$render->setPageTitle("Login");
$render->setHeaderLine("Welcome");
$render->setMetaDescription("Unity Asset Server");

// show all databases
$render->addContent(new W_Login());

$render->display();

?>