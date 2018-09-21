<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('database.php');
require_once('model/user_model.php');

    //MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

session_start();

class MainController {

    private $layoutView;
    private $loginView;
    private $timeView;

    private $database;


    public function __construct() {
        $this->layoutView = new LayoutView();
        $this->loginView = new LoginView();
        $this->timeView = new DateTimeView();

        // $this->database = new Database();
    }

    public function run() {

        if ($this->loginView->isTryingToSignup()) {

            $credentials = $this->loginView->getCredentialsInForm();
            // debug_print_backtrace();
            if($credentials->username >=3 && $credentials->password >=6) {
                $_SESSION['username'] = $credentials->username;
                $_SESSION['password'] = $credentials->password;
                // echo $_SESSION['username'];
            }



        } else if ($this->loginView->isTryingToLogin()) {

            $credentials = $this->loginView->getCredentialsInForm();

            if($credentials->username == 'Admin' && $credentials->password == 'Admin') {
                $_SESSION['username'] = $credentials->username;
                $_SESSION['password'] = $credentials->password;
                // echo $_SESSION['username'];
            } else {
            }
            
        } else {
            
        }
        $this->renderHTML();
    }

    private function renderHTML() {
        $this->layoutView->render($this->loginView->isAuthorised(), $this->loginView, $this->timeView);
    }

    public function killSession() {
        session_destroy();
    }
}


$controller = new MainController();

$controller->run(); //renderHTML();