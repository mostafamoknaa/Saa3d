<?php
include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Saa3d</title>
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dokcpejo1/image/upload/v1648513749/Saa3d/logo-sm.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        <?php include "C:\AppServ\www\saa3d\stylesheets\home.css" ?>
    </style>
</head>

<body class="d-flex text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 mx-auto flex-column">
        <header class="mb-auto"></header>
        <img src="https://res.cloudinary.com/dokcpejo1/image/upload/v1648513749/Saa3d/logo.png" class="logo mx-auto" alt="..." />
        <main class="d-none d-md-block">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators m-auto">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner pb-3">
                    <div class="carousel-item active">
                        <p class="h3">Great opportunities to help others seldom come, but small ones surround us every day.</p>
                    </div>
                    <div class="carousel-item">
                        <p class="h3">We are a nonprofit organization, and our goal is to bring the good back to the world once more.</p>
                    </div>
                    <div class="carousel-item">
                        <p class="h3">Making a difference to even a single person, is what makes our efforts worthwhile.</p>
                    </div>
                </div>
            </div>
        </main>

        <div class="row">
            <div class="offset-3 col-6">
                <a href="login&logout.php" class="mt-3 btn btn-secondary btn-lg fw-bold">Join Us</a>
            </div>
        </div>

        <footer class="mt-auto text-white-50">
            <p class="h6">&copy; Saa3d-2022</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>