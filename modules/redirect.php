<?php 
    if ($_GET["q"]=="mail") $redir = "mailto:grendless@gmail.com";

    header("Location: ".$redir);
?>