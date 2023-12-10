<?php

class Application
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

    public function selectAllPublishedBlog()
    {
        $sql = "SELECT * FROM tbl_blog WHERE publication_status='1' ORDER BY blog_id DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function selectBlogInfoById($blog_id)
    {
        $sql = "SELECT * FROM tbl_blog WHERE blog_id='$blog_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
}
