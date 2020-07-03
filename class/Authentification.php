<?php 
namespace App;
use App\DelightBase;
use App\EmailServer;

class Authentification{

    public $database;
    public $token;
    public $selector;

    public function __construct(){

        $this->database = new DelightBase();
            
    }

    public function register()
    {
        if( !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username']) ){

            try {
                
                $tok= '';
                $select = '';
                $userId = $this->database->auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
                    echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';

                    
                    header('Location: verifyEmail.php?selector=' . \urlencode($selector) . '&token=' . \urlencode($token)); 

                });
                
                
               // echo 'We have signed up a new user with the ID ' . $userId;
            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                die('Invalid email address');
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Invalid password');
            }
            catch (\Delight\Auth\UserAlreadyExistsException $e) {
                die('User already exists');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
        
    }

   

    public function verifEmail(){

        if( !empty($_GET['selector']) && !empty($_GET['token']) ){

            try {

                $this->database->auth->confirmEmail($_GET['selector'], $_GET['token']);
                header('Location: login.php'); 
                
            }
            catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
                die('Invalid token');
            }
            catch (\Delight\Auth\TokenExpiredException $e) {
                die('Token expired');
            }
            catch (\Delight\Auth\UserAlreadyExistsException $e) {
                die('Email address already exists');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
    }

    public function login(){

        if( !empty($_POST['email']) && !empty($_POST['password']) ){

            try {

                $this->database = new DelightBase();
                $this->database->auth->login($_POST['email'], $_POST['password']);   

                header ('Location: index.php'); 

            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                die('Wrong email address');
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Wrong password');
            }
            catch (\Delight\Auth\EmailNotVerifiedException $e) {
                die('Email not verified');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
    }


    public function isLoggedIn(){

        $this->database = new DelightBase();

        if ($this->database->auth->isLoggedIn()) {
            return true;
        }
        else {
            return false;
        }
        
    }

    public function isLoggedOut(){


    }

    public function logout(){

        $this->database = new DelightBase();


        $this->database->auth->logout();
        $this->database->auth->destroySession();
        header('Location: login.php');
    }

    public function resetPassword(){

        if( !empty($_POST['email'])){

            try {

                $this->database = new DelightBase();

                $this->database->auth->forgotPassword($_POST['email'], function ($selector, $token) {
                    echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                    
                    $url = 'http://localhost/admin.freedomtarvel.tn/resetPassword.php?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
                    $email = new EmailServer();

                    $subject = "Email Verification : Reset votre mot de passe";
                    $message = '<a href="'.$url.'">Reset votre mot de passe</a>';
                    $email->envoieMail($_POST['email'], $subject, $message);
                    header ('Location: verifResetPassword.php'); 
                });
            
                //echo 'Request has been generated';
            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                die('Invalid email address');
            }
            catch (\Delight\Auth\EmailNotVerifiedException $e) {
                die('Email not verified');
            }
            catch (\Delight\Auth\ResetDisabledException $e) {
                die('Password reset is disabled');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }

        }
        
    }

    public function verifyResetPassword(){

        if( !empty($_GET['selector']) && !empty($_GET['token']) ){

            try {

                $this->database = new DelightBase();
                $this->database->auth->canResetPasswordOrThrow($_GET['selector'], $_GET['token']);

                
            }
            catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
                die('Invalid token');
            }
            catch (\Delight\Auth\TokenExpiredException $e) {
                die('Token expired');
            }
            catch (\Delight\Auth\ResetDisabledException $e) {
                die('Password reset is disabled');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
        
    }

    public function newPassword(){

        if( !empty($_POST['selector']) && !empty($_POST['token']) && !empty($_POST['password']) ){

            try {
                
                $this->database = new DelightBase();

                $this->database->auth->resetPassword($_POST['selector'], $_POST['token'], $_POST['password']);

                header('Location : login.php');
            }
            catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
                die('Invalid token');
            }
            catch (\Delight\Auth\TokenExpiredException $e) {
                die('Token expired');
            }
            catch (\Delight\Auth\ResetDisabledException $e) {
                die('Password reset is disabled');
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Invalid password');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
    }

    public function changeCurrentPassword(){

        
        if( !empty($_POST['oldPassword']) && !empty($_POST['newPassword'])){
            $this->database = new DelightBase();

        if ($this->database->auth->isLoggedIn()) {
            try {
                $this->database->auth->changePassword($_POST['oldPassword'], $_POST['newPassword']);
            
                echo 'Password has been changed';
                header('Location: espaceClient.php');
            }
            catch (\Delight\Auth\NotLoggedInException $e) {
                die('Not logged in');
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Invalid password(s)');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
        else {
            echo 'User is not signed in yet';
        }
            
        }        
    }




    

    
}
?>