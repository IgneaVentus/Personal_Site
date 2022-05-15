<?php
    $request_uri = explode("?", $_SERVER["REQUEST_URI"], 2);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        switch ($request_uri[0]) {
            case "/mail": 
                require("./controllers/mailer.php");
                break;
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        switch ($request_uri[0]) {
            case "/Portfolio":
                loadsite("./views/portfolio.php");
                break;
            case "/Contact":
            case "/Kontakt":
                loadsite("./views/contact.html");
                break;
            case "/mail":
                require("./controllers/redirect.php");
                break;
            case "/":
            case "/About":
            case "/Omnie":
            case "/O mnie":
            default :
                loadsite("./views/aboutme.html");
                break;
        }
    }

    function loadsite($addr) {
        $site = require("./modules/navbar.html");
        $site += require($addr);
        $site += require("./modules/footer.html");
        return $site;
    }
?>