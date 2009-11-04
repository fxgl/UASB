<?php

$db = $_GET["db"];
$serial = $_GET["serial"];
$dbname = ucfirst($db);

include("_inc.php");

DB::getDB()->connect($db);

$render = new Render("index");

$render->setPageTitle(AServer::GetDatabaseProjectName($db));
$render->setHeaderLine(AServer::GetDatabaseProjectName($db), "/database.php?db=" . $db);
$render->setMetaDescription("Viewing user $serial on " . AServer::GetDatabaseProjectName($db));

$render->addContent(new W_PersonDetails($db, $serial));
$render->addContent(new W_DatabaseUpdates($db, $serial, 0));

$render->display();

?>