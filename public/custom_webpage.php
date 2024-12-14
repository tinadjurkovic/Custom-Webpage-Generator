<?php

require_once __DIR__ . '/../classes/SessionManager.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/UserService.php';
require_once __DIR__ . '/../classes/ServicesProductsService.php';

use App\Classes\SessionManager;
use App\Classes\Database;
use App\Classes\UserService;
use App\Classes\ServicesProductsService;

SessionManager::start();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('User ID is missing or invalid.');
}

$userId = (int) $_GET['id'];

$db = new Database();
$userService = new UserService($db->getConnection());
$servicesProductsService = new ServicesProductsService($db->getConnection());

$user = $userService->getUserById($userId);

if (!$user) {
    die('User not found.');
}

$service_product = $servicesProductsService->getServicesProductsById($userId);

$db->closeConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./../styles/main.css" rel="stylesheet">
    <style>
        .home .home-content {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('<?= $user["cover_image"] ?>');
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><?= $user['main_title'] ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#about-us">About Us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link"
                            href="#services"><?= $user['service_type'] == 'products' ? 'Products' : 'Services' ?></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main>
        <section id="home" class="home">
            <div class="home-content d-flex flex-column align-items-center justify-content-center">
                <h1 class="title"><?= $user['main_title'] ?></h1>
                <h4><?= $user['subtitle'] ?></h4>
            </div>

        </section>
        <section id="about-us" class="about-us">
            <div class="container align-items-center text-center justify-content-center p-3">
                <h2>About us</h2>
                <p><?= $user['about_you'] ?></p>
                <hr />
                <span>Telephone: <?= $user['phone'] ?></span><br>
                <span>Location: <?= $user['location'] ?></span>
            </div>

        </section>
        <section id="services" class="services">
            <div class="container">
                <h2 class="ms-3"><?= $user['service_type'] == 'products' ? 'Products' : 'Services' ?></h2>
                <div class="cards d-flex justify-content-between p-3">
                    <?php
                    $count = 1;
                    foreach ($service_product as $value):
                        ?>
                        <div class="card" style="width: 18rem;">
                            <img src="<?= $value['img_url'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user['service_type'] == 'products' ? 'Product' : 'Service' ?>
                                    <?= $count == 1 ? 'One' : ($count == 2 ? 'Two' : 'Three') ?> Description
                                </h5>
                                <p class="card-text"><?= $value['description'] ?></p>
                                <span>Last updated 3 minutes ago.</span>
                            </div>
                        </div>
                        <?php
                        $count++;
                    endforeach;
                    ?>
                </div>
                <hr />
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container d-flex p-3">
                <div class="contact-info">
                    <h2>Contact</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit nihil alias
                        at? Explicabo saepe,
                        dolores provident ullam, voluptates mollitia molestias iste earum nam deleniti, nesciunt
                        voluptas excepturi nostrum. Error a, hic aperiam enim corrupti distinctio sit officia
                        necessitatibus tenetur modi aliquam maxime. Fuga iure sapiente commodi asperiores voluptates
                        amet quod, iste eius nisi perspiciatis, autem consequuntur est quibusdam inventore officiis
                        reprehenderit fugiat id odit iusto!</p>
                </div>
                <div class="contact-form">
                    <form action="" method="">
                        <label>Name:</label>
                        <input>
                        <label>Email:</label>
                        <input>
                        <label>Message:</label>
                        <textarea></textarea>
                        <div class="button-class text-center">
                            <button type="submit" class="btn">Send</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </main>
    <footer class="p-3 d-flex flex-column align-items-center justify-content-center">
        <p>Copyright by Konstantina @Brainster</p>
        <div class="links mt-2">
            <a target="_blank" href="<?= $user['linkedin_link'] ?>" class="me-3">Linkedin </a>
            <a target="_blank" href="<?= $user['facebook_link'] ?>" class="me-3">Facebook</a>
            <a target="_blank" href="<?= $user['twitter_link'] ?>" class="me-3">Twitter</a>
            <a target="_blank" href="<?= $user['google_link'] ?>">Google+</a>

        </div>
    </footer>
</body>

</html>