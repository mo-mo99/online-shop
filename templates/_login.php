<?php

include_once ('database/User.php');
include_once ('database/DBController.php');

$db = new DBController();
$User = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['btn-submit'])){
        $user = $_POST['user_name'];
        $pass = $_POST['password'];


        $users = $User->getUsers();

        foreach ($users as $val){
            echo 'NOO';
            if ($val['user_name'] == $user && $val['password'] == $pass){

                session_start();
                $_SESSION['auth'] = $val['user_id'];

                header('location:index.php' );
            }
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
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="" name="user_name" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">

                            <input type="submit" name="btn-submit" class="btn btn-info btn-md my-3" value="submit">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="register.php" class="text-info">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
