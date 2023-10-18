<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <style>
        .dropdown:hover .dropdown-menu{
            display: block;
        }
    </style>
    <body>
        <?php
include_once('connect.php');
$c = new Connect();
$dbLink = $c->connectToMySQL();
// $sql = 'SELECT * FROM category';
// $re=$dbLink->query($sql);


        ?>
        <!-- navbar -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="allproduct.php" class="navbar-brand">Logo here</a>

                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsup">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navsup">
                    <!-- Left -->
                    <div class="navbar-nav">
                        <a href="allnexproduct.php" class="nav-link">All products from NexGen</a>
                        <a href="index.php" class="nav-link">Add a new product from NexGen</a>
                        
                    </div>
                    <!-- Right -->
                    <div class="navbar-nav ms-auto">
                        <a href="#" class="nav-link">Welcome, Khanh</a>
                        <a href="#" class="nav-link">Logout</a>
                    </div>
                </div>
            </div>
        </nav>

        
    <div class="b-example-divider"></div>
    