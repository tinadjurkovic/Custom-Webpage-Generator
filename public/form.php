<?php

require_once __DIR__ . '/../classes/SessionManager.php';

use App\Classes\SessionManager;

SessionManager::start();

$data = SessionManager::get('data') ?? [];
$errors = SessionManager::get('errors') ?? [];
$user = SessionManager::get('user') ?? [];
$serviceProduct = SessionManager::get('service_product') ?? [];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customise your Web Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./../styles/main.css" rel="stylesheet">
    <style>
        .form-page {
            background-image: url("./../assets/form-background.jpeg");
        }
    </style>
</head>

<body class="form-page">
    <div class="form-wrapper">
        <h3 class="text-center mb-5">You are one step away from your webpage</h3>
        <form action="./../logic/form_process.php" method="POST">
            <div class="box d-flex">
                <div class="inner d-flex flex-column">
                    <div class="group d-flex flex-column mb-3">
                        <label class="form-label" for="cover_image">Cover Image URL</label>
                        <input class="form-input" id="cover_image" type="text" name="cover_image"
                            value="<?= htmlspecialchars($data['cover_image'] ?? $user['cover_image'] ?? '') ?>">
                        <?= !empty($errors['cover_image']) ? '<small class="text-danger">' . htmlspecialchars($errors['cover_image']) . '</small>' : '' ?>

                        <label class="form-label" for="main_title">Main Title of Page</label>
                        <input class="form-input" id="main_title" name="main_title" type="text"
                            value="<?= htmlspecialchars($data['main_title'] ?? $user['main_title'] ?? '') ?>">
                        <?= !empty($errors['main_title']) ? '<small class="text-danger">' . htmlspecialchars($errors['main_title']) . '</small>' : '' ?>

                        <label class="form-label" for="subtitle">Subtitle of Page</label>
                        <input class="form-input" id="subtitle" name="subtitle" type="text"
                            value="<?= htmlspecialchars($data['subtitle'] ?? $user['subtitle'] ?? '') ?>">
                        <?= !empty($errors['subtitle']) ? '<small class="text-danger">' . htmlspecialchars($errors['subtitle']) . '</small>' : '' ?>

                        <label class="form-label" for="about_you">Something About You</label>
                        <textarea class="form-input" id="about_you"
                            name="about_you"><?= htmlspecialchars($data['about_you'] ?? $user['about_you'] ?? '') ?></textarea>
                        <?= !empty($errors['about_you']) ? '<small class="text-danger">' . htmlspecialchars($errors['about_you']) . '</small>' : '' ?>

                        <label class="form-label" for="phone">Your Telephone Number</label>
                        <input class="form-input" id="phone" name="phone" type="tel"
                            value="<?= htmlspecialchars($data['phone'] ?? $user['phone'] ?? '') ?>">
                        <?= !empty($errors['phone']) ? '<small class="text-danger">' . htmlspecialchars($errors['phone']) . '</small>' : '' ?>

                        <label class="form-label" for="location">Location</label>
                        <input class="form-input" id="location" name="location" type="text"
                            value="<?= htmlspecialchars($data['location'] ?? $user['location'] ?? '') ?>">
                        <?= !empty($errors['location']) ? '<small class="text-danger">' . htmlspecialchars($errors['location']) . '</small>' : '' ?>
                    </div>

                    <div class="group d-flex flex-column mt-3">
                        <label for="service_type">Do you provide services or products?</label>
                        <select id="service_type" name="service_type">
                            <option value="services" <?= ($data['service_type'] ?? $user['service_type'] ?? '') === 'services' ? 'selected' : '' ?>>Services</option>
                            <option value="products" <?= ($data['service_type'] ?? $user['service_type'] ?? '') === 'products' ? 'selected' : '' ?>>Products</option>
                        </select>
                    </div>
                </div>

                <div class="group d-flex flex-column">
                    <span class="mb-5">Provide URLs for images and descriptions of your service/product</span>
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <label for="img_url_<?= $i ?>">Image URL</label>
                        <input id="img_url_<?= $i ?>" name="img_url_<?= $i ?>" type="text"
                            value="<?= htmlspecialchars($data["img_url_$i"] ?? $serviceProduct["img_url_$i"] ?? '') ?>">
                        <label for="product_service_description_<?= $i ?>">Description of service/product</label>
                        <input id="product_service_description_<?= $i ?>" name="product_service_description_<?= $i ?>"
                            type="text"
                            value="<?= htmlspecialchars($data["description_$i"] ?? $serviceProduct["description_$i"] ?? '') ?>">
                    <?php endfor; ?>
                </div>

                <div class="group d-flex flex-column">
                    <span class="mb-5">Provide your social media links:</span>
                    <label for="linkedin_link">LinkedIn</label>
                    <input id="linkedin_link" name="linkedin_link" type="text"
                        value="<?= htmlspecialchars($data['linkedin_link'] ?? $user['linkedin_link'] ?? '') ?>">
                    <label for="facebook_link">Facebook</label>
                    <input id="facebook_link" name="facebook_link" type="text"
                        value="<?= htmlspecialchars($data['facebook_link'] ?? $user['facebook_link'] ?? '') ?>">
                    <label for="twitter_link">Twitter</label>
                    <input id="twitter_link" name="twitter_link" type="text"
                        value="<?= htmlspecialchars($data['twitter_link'] ?? $user['twitter_link'] ?? '') ?>">
                    <label for="google_link">Google+</label>
                    <input id="google_link" name="google_link" type="text"
                        value="<?= htmlspecialchars($data['google_link'] ?? $user['google_link'] ?? '') ?>">
                </div>
            </div>
            <div class="button">
                <button type="submit" class="btn btn-primary" target="blank">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>