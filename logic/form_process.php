<?php

require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Validator.php';
require_once __DIR__ . '/../classes/Redirector.php';
require_once __DIR__ . '/../classes/SessionManager.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/UserService.php';
require_once __DIR__ . '/../classes/ServicesProducts.php';
require_once __DIR__ . '/../classes/ServicesProductsService.php';

use App\Classes\Database;
use App\Classes\Redirector;
use App\Classes\SessionManager;
use App\Classes\UserService;
use App\Classes\ServicesProductsService;
use App\Classes\Validator;
use App\Classes\User;
use App\Classes\ServicesProducts;

SessionManager::start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Redirector::redirect('start.php');
}

$data = $_POST;
$errors = Validator::validateUserData($data);

if (!empty($errors)) {
    SessionManager::set('errors', $errors);
    SessionManager::set('data', $data);
    Redirector::redirect('form.php');
}

$db = new Database();
$userService = new UserService($db->getConnection());
$servicesProductsService = new ServicesProductsService($db->getConnection());

$userId = $userService->create(new User(
    $data['cover_image'],
    $data['main_title'],
    $data['subtitle'],
    $data['about_you'],
    $data['phone'],
    $data['location'],
    $data['service_type'],
    $data['linkedin_link'],
    $data['facebook_link'],
    $data['twitter_link'],
    $data['google_link']
));

for ($i = 1; $i <= 3; $i++) {
    if (!empty($data["img_url_$i"]) && !empty($data["product_service_description_$i"])) {
        $servicesProductsService->create(new ServicesProducts(
            $userId,
            $data["img_url_$i"],
            $data["product_service_description_$i"]
        ));
    }
}

Redirector::redirect('./../public/custom_webpage.php?id=' . urlencode($userId));