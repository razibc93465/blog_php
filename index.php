<?php
//$blog_id=$_GET['id'];
require_once './class/application.php';
$blog = new Application();
$query_result = $blog->selectAllPublishedBlog();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Template for Bootstrap</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Blog Management</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <div class="container">
            <h1>Hello, Blog Mnagement!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $i = 1;
            while ($blog_info = mysqli_fetch_assoc($query_result)) {
            ?>
                <div class="col-md-4">
                    <div class="well"> <img src="../blog_info/admin/<?php echo $blog_info['blog_image']; ?>" alt="" width="320px" height="250px"></div>
                    <h2><?php echo $blog_info['blog_title']; ?><small>-<?php echo $blog_info['author_name']; ?></small></h2>
                    <p><?php echo mb_substr($blog_info['blog_description'], 0, 50); ?></p>
                    <p><a class="btn btn-default" href="blog_details.php?id=<?php echo $blog_info['blog_id']; ?>&&title=<?php echo $blog_info['blog_title']; ?>" role="button">View Blog details &raquo;</a></p>
                </div>
            <?php } ?>
        </div>
        <hr>
        <footer>
            <p>&copy; 2024 Company, Inc.</p>
        </footer>
    </div>
    <script>
        window.jQuery || document.write('<script src="asset/js/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="asset/js/bootstrap.min.js"></script>

</body>

</html>