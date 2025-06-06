<?php
// CONFIG
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasutajatugi</title>

    <!-- FONTAWESOME CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // NAVBAR
    include("nav.php");
    ?>

    <div class="container MAINCONTAINER">
        <!-- BREAKID SEST MUIDU NAVBAR ISTUB CONTENT'IL EES -->
        <br>
        <br>
        <br>
        <?php
        // DYNAMIC LEHED
        switch (true) {
            case !empty($_GET['p']):
                $page = 'lehed/' . $_GET['p'] . '.php';
                if (file_exists($page)) {
                    // KUI PAGE EKSISTEERIB INCLUDE
                    include($page);
                } else {
                    // KUI MITTE SIIS NÄITAB "POLE OLEMAS"
                    ?>
                    <div class="col-md-12">
                        <h1 class="valge-tekst">POLE OLEMAS</h1>
                    </div>
                    <?php
                }
                break;

            case !empty($_GET['info']):
                $page = 'lehed/info/' . $_GET['info'] . '.php';
                if (file_exists($page)) {
                    // KUI PAGE EKSISTEERIB INCLUDE
                    include($page);
                } else {
                    echo "<script>window.location.href = '/';</script>";
                }
                break;

            case !empty($_GET['kool']):
                // KOOLID
                include('lehed/kool.php');
                break;

            case isset($_GET['s']):
                // SEARCH
                include('lehed/s.php');
                break;

            case !empty($_GET['ops']):
                // OPSID
                include('lehed/ops.php');
                break;

            case !empty($_GET['hinnang']):
                // HINNANGUD
                include('lehed/hinnang.php');
                break;

            case !empty($_GET['muudahinnangut']):
                // MUUDA HINNANGUT
                include('lehed/muudahinnangut.php');
                break;

            case !empty($_GET['kasutaja']):
                // KASUTAJA
                include('lehed/kasutaja.php');
                break;

            case !empty($_GET['action']):
                // ACTIONS
                include('actions/' . $_GET['action'] . '.php');
                break;

            case !empty($_GET['admin']):
                // ADMIN
                include('lehed/admin/main.php');
                break;

            default:
                // AVALEHT
                include('lehed/avaleht.php');
                break;
        }
        ?>
    </div>
    
    <?php
    include("jalus.php");

    // SULEB MYSQL YHENDUSE
    $yhendus->close();
    ?>
</body>
</html>
<script>
    // AUTO RESIZE CONTAINER HEIGHT
    document.addEventListener("DOMContentLoaded", () => {
        const mainContainer = document.querySelector(".MAINCONTAINER");
        if (mainContainer) {
            const adjustHeight = () => {
                const viewportHeight = window.innerHeight;
                mainContainer.style.minHeight = `${viewportHeight}px`;
            };

            // Initial adjustment
            adjustHeight();

            // Adjust height on window resize
            window.addEventListener("resize", adjustHeight);
        }
    });
</script>

<script>
    // KONTROLL KAS SOOVID IKKA KUSTUTADA
    document.addEventListener("DOMContentLoaded", function() {
        const deleteIcon = document.querySelectorAll(".kustuta-ikoon");

        deleteIcon.forEach(icon => {
            icon.addEventListener("click", function(event) {
                const confirmDelete = confirm("Kas oled kindel, et soovid kustutada?");
                if (!confirmDelete) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
<script>
    // KONTROLL KAS SOOVID IKKA LUBADA
    document.addEventListener("DOMContentLoaded", function() {
        const allowIcon = document.querySelectorAll(".luba-ikoon");

        allowIcon.forEach(icon => {
            icon.addEventListener("click", function(event) {
                const confirmAllow = confirm("Kas oled kindel, et soovid lubada?");
                if (!confirmAllow) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
