<?php

class Login_Model
{
    
    public function run()
    {   
        $db = Database::getConnection();
        $result = $db->prepare("SELECT id FROM users WHERE login = :login AND password = :password"); //PDO commands, cleans query
        $result->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));
        
        $count =  $result->rowCount();
        if ($count > 0){
            //login
            Session::init();
            Session::set('loggedIn', true);
            Session::set('username', $_POST['login']); // extra
            header('Location: ../dashboard');
        } else {
            header('Location: ../login');
        }
        
    }
}