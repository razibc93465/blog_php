<?php

class Login
{
    protected $connection;

    public function __construct()
    {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'portfolio';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->connection) {
            die('Connection Fail' . mysqli_error($this->connection));
        }
    }

    public function admin_login_check($data)
    {
        // echo '<pre>';
        // print_r($data);
        $password = md5($data['password']);
        // echo $password;
        $sql = "SELECT * FROM tbl_Admin WHERE email_address='$data[email_address]' and password='$password'";
        $query_result = mysqli_query($this->connection, $sql);
        $admin_info = mysqli_fetch_assoc($query_result);
        // echo '<pre>';
        // print_r($admin_info);

        if ($admin_info) {
            session_start();
            $_SESSION['admin_id'] = $admin_info['admin_id'];
            $_SESSION['admin_name'] = $admin_info['admin_name'];

            header('Location:dashboard.php');
        } else {
            // session_start();
            // $_SESSION['message'] = 'Your user id or password is not valid';
            // header('Location:index.php');
            $message = 'Your user id or password is not valid';
            return $message;
        }
    }

    public function admin_logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        header('Location:index.php');
    }
}
