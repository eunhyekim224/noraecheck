<?php
    require("./controller/controller.php");
    /**
     * TODO: verify cookies, if cookies set, showAllPlaylists
     */

    try {
        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
            if ($action === 'showMyList') {
                $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
                showAllPlaylists($memberId); 
                showAllPlaylists(1); //$_SESSION['memberId']
            } else {
                throw new PDOException("issue with showAllPlaylists(username) - unable to fetch the playlists!");
            }
        } else {
            $error = isset($_GET['error']) ? $_GET['error'] : '';
            $status = isset($_GET['success']) ? $_GET['success'] : '';
            showLandingPage($error,$status);
        }
    }
    catch(PDOException $e) {
        $msg = $e->getMessage();
        $code = $e->getCode();
        $line = $e->getLine();
        $file = $e->getFile();
        require('./view/errorPDO.php');
    }
    catch(Exception $e) {
        $msg = $e->getMessage();
        $code = $e->getCode();
        $line = $e->getLine();
        $file = $e->getFile();
        require('./view/error.php');
    }
    



