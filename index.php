<?php
    require("./controller/controller.php");

    try {
        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
        } else {
            showLandingPage();
        }
    }
    catch(PDOException $e) {
        $msg = $e->getMessage();
        $code = $e->getCode();
        $line = $e->getLine();
        $file = $e->getFile();
        require('./view/errorViewPDO.php');
    }
    catch(Exception $e) {
        $msg = $e->getMessage();
        $code = $e->getCode();
        $line = $e->getLine();
        $file = $e->getFile();
        require('./view/errorView.php');
    }
    


