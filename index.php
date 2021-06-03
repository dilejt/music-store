<?php
session_start();
require_once "Cart.php";
$cartItems = new Cart();
?>
<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">e<span class="text-danger">M</span>usic</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2">
                <?php
                    require_once "connect.php";
                    $conn = new mysqli($host, $db_user, $db_password, $db_name);
                    $sql = "select * from produkt";
                    $result = $conn->query($sql);
                    while($row = mysqli_fetch_row($result)){
                        echo "<li class='nav-item'><a class='nav-link active' href='#'>$row[1]</a></li>";
                    }
                    $conn->close();
                ?>
                </ul>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <header class="position-relative overflow-hidden text-center bg-light">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
                <div class="col-md-6"><img class="img-fluid sale position-relative" src="img/sale.png"><img class="img-fluid bgheader" src="img/halloween.png"></div>
                <div class="col-md-2"><img class="img-fluid notes d-none d-md-block d-lg-block d-xl-block" src="img/notes.png"></div>
                <div class="col-md-1"></div>
            </div>
        </header>

        <section class="bg-dark text-light">
            <div class="container library">
                <?php
                    require_once "connect.php";
                    $conn = new mysqli($host, $db_user, $db_password, $db_name);
                    $sql = "select * from produkt";
                    $result = $conn->query($sql);
                    $i = 0;
                    $page = "";
                    while($row = mysqli_fetch_row($result)){
                        $page=trim($row[4],'./img/.pngjpg').'.php';
                        if ($i%2==0) echo "<div class='row'>";
                        echo "<div class='col-md-6'>";
                        echo "<div class='row'>";
                        if ($i%2==0) echo "<div class='col-md-6'><img src='$row[4]' class='img-fluid'><button class='btn' href='$page'>Sprawdź</button></div>";
                        else echo "<div class='col-md-6'><img src='$row[4]' class='img-fluid'><button class='btn' href='$page'>Sprawdź</button></div>";
                        echo "<div class='col-md-6'>$row[1]<br> $row[2]<br>Cena: $row[3]zł<br>Ilość: $row[5]</div>";
                        echo "</div>";
                        echo "</div>";
                        if ($i%2!=0) echo "</div>";
                        $i = $i + 1;
                        
                    }
                    $conn->close();
                ?>
            </div>
        </section>

        <footer class="container py-5">
            <div class="row">
                <div class="col-12 col-md">
                <h5>e<span class="text-danger">M</span>usic</h5>
                    <small class="d-block mb-3 text-muted">&copy; 2020</small>
                </div>
                <?php
                    require_once "connect.php";
                    $conn = new mysqli($host, $db_user, $db_password, $db_name);
                    $sql = "select * from produkt";
                    $result = $conn->query($sql);
                    $cond = "";
                    while($row = mysqli_fetch_row($result)){
                        if($cond!=$row[1]){
                            echo "</ul></div>";
                            echo "<div class='col-6 col-md'>
                            <h5>$row[1]</h5>
                            <ul class='list-unstyled text-small'>";
                        }
                        echo "<li><a class='text-muted' href='#'>$row[2]</a></li>";
                        $cond=$row[1];
                        if($cond!=$row[1]){
                            echo "</ul></div>";
                        }
                        
                    }
                    $conn->close();
                ?>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>