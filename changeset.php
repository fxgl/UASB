<?php

$db = $_GET["db"];
$serial = $_GET["serial"];
$dbname = ucfirst($db);


include("_inc.php");

DB::getDB()->connect($db);

$render = new Render("index");

$render->setPageTitle(AServer::GetDatabaseProjectName($db));
$render->setHeaderLine(AServer::GetDatabaseProjectName($db), "/database.php?db=" . $db);
$render->setMetaDescription("Viewing details for asset server database " . AServer::GetDatabaseProjectName($db));

$render->addContent(new W_DatabaseUsers($db));
$render->addContent(new W_ScriptsTodo($db));
$render->addContent(new W_DatabaseUpdates($db, 0, 0, $serial));

$render->display();

?>