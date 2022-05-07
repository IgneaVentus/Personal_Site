<?php
    $request_uri = explode("?", $_SERVER["REQUEST_URI"], 2);

    switch ($request_uri[0]) {
        case "/Portfolio":
            loadsite("./views/portfolio.php");
            break;
        case "/Contact":
        case "/Kontakt":
            loadsite("./views/contact.html");
            break;
        case "/mail":
            break;
        case "/service":
            if ($request_uri[1]=="q=mail") include("./modules/redirect.php");
            break;
        case "/":
        case "/About":
        case "/Omnie":
        case "/O mnie":
        default :
            loadsite("./views/aboutme.html");
            break;
    }

    function loadsite($addr) {
        $site = include("./modules/navbar.html");
        $site += include($addr);
        $site += include("./modules/footer.html");
        return $site;
    }
?>