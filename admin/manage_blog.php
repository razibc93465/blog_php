<?php
session_start();
$message = '';

require_once '../class/blog.php';
$blog = new Blog();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = $blog->delete_blog_info($id);
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

$query_result = $blog->select_all_blog_info();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Blog</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Home</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="dashboard.php">Add Blog</a></li>
                    <li><a href="manage_blog.php">Manage Blog</a></li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center text-success">
                    <?php
                    echo $message;
                    ?>
                </h3>
                <hr />
                <div class="">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>SL NO</th>
                            <th>Blog ID</th>
                            <th>Blog Title</th>
                            <th>Author Name</th>
                            <th class="col-md-3">Blog Description</th>
                            <th>Blog Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $i = 1;
                        while ($blog_info = mysqli_fetch_assoc($query_result)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $blog_info['blog_id']; ?></td>
                                <td><?php echo $blog_info['blog_title']; ?></td>
                                <td><?php echo $blog_info['author_name']; ?></td>
                                <td><?php echo $blog_info['blog_description']; ?></td>
                                <td><img src="<?php echo $blog_info['blog_image']; ?>" alt="" width="100px" height="100px"></td>
                                <td><?php
                                    if ($blog_info['publication_status'] == 1) {
                                        echo 'Published';
                                    } else {
                                        echo 'Unpublished';
                                    }
                                    ?></td>
                                <td>
                                    <a href="edit_blog.php?id=<?php echo $blog_info['blog_id']; ?>" class="btn btn-success" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="?delete=<?php echo $blog_info['blog_id']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this!');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../asset/js/jquery-3.4.1.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
</body>

</html>