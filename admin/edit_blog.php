<?php
$blog_id = $_GET['id'];
require_once '../class/blog.php';
$blog = new Blog();
$query_result = $blog->select_blog_info_by_id($blog_id);
$blog_info = mysqli_fetch_assoc($query_result);

if (isset($_POST['btn'])) {
    $blog->update_blog_info($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Student</title>
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
                <h3 class="text-center text-success"><?php // echo  $message; 
                                                        ?></h3>
                <hr />
                <div class="well">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Blog Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="blog_title" class="form-control" required="" value="<?php echo $blog_info['blog_title']; ?>" placeholder="Blog Title">
                                <input type="hidden" name="blog_id" class="form-control" value="<?php echo $blog_info['blog_id']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Author Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="author_name" class="form-control" value="<?php echo $blog_info['author_name']; ?>" required="" placeholder="Author Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Blog Description</label>
                            <div class="col-sm-10">
                                <textarea name="blog_description" class="form-control" required=""><?php echo $blog_info['blog_description']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Publication Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="publication_status">
                                    <option>
                                        <?php
                                        echo $blog_info['publication_status'];
                                        // if ($blog_info['publication_status'] == '1') {
                                        //     echo 'Published';
                                        // } else {
                                        //     echo 'UnPublished';
                                        // }
                                        ?>
                                    </option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="btn" class="btn btn-success">Update Blog Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../asset/js/jquery-3.4.1.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
</body>

</html>