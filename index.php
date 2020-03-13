<?php
    require("./controller/controller.php");
    /**
     * TODO: verify cookies, if cookies set, showAllPlaylists, if not showLandingPage
     */

    try {
        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
            if ($action === 'showMyList') {
                showAllPlaylists(1); //$_SESSION['memberId']
            } else {
                throw new PDOException("issue with showAllPlaylists(username) - unable to fetch the playlists!");
            }
        } else {
            showAllPlaylists(1);
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
    



