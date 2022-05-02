<?php
    $request_uri = explode("?", $_SERVER["REQUEST_URI"], 2);

    switch ($request_uri[0]) {
        case "/Portfolio":
            loadsite("views/portfolio.php");
            break;
        case "/Contact":
        case "/Kontakt":
            loadsite("views/contact.html");
            break;
        case "/mail":
            break;
        case "/service":
            if ($request_uri[1]=="q=mail") require("modules/redirect.php");
            break;
        case "/":
        case "/About":
        case "/Omnie":
        case "/O mnie":
        default :
            loadsite("views/aboutme.html");
            break;
    }

    function loadsite($addr) {
        $site = require("modules/navbar.html");
        $site += require($addr);
        $site += require("modules/footer.html");
        return $site;
    }
?>