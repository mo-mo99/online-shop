<?php

include_once ('database/User.php');
include_once ('database/DBController.php');

$db = new DBController();
$User = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['btn-submit'])){
        $users = $User->getUsers();
        $user_names = array();
        foreach ($users as $val){
            array_push($user_names, $val['user_name']);
        }


        if(! in_array($_POST['user_name'],$user_names)){
            $user =  "'".$_POST['user_name']."'";
            $pass =  "'".$_POST['password']."'";
            $User->addUser($user, $pass);
        }
        else{
            echo 'username is already taken ';
        }
    }
}


?>

<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" method="post">
                        <h3 class="text-center text-info">Register</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="" name="user_name" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">

                            <input type="submit" name="btn-submit" class="btn btn-info btn-md my-2" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
