<?php

namespace App\Classes;

class Validator
{
    public static function validateServiceType(string $service_type): string
    {
        $allowed_types = ['services', 'products'];
        if (!in_array($service_type, $allowed_types, true)) {
            throw new \InvalidArgumentException("Invalid service type. Allowed values are: " . implode(', ', $allowed_types));
        }
        return $service_type;
    }

    public static function validateUserData(array $userData)
    {
        $errors = [];

        if (empty($userData['cover_image'])) {
            $errors['cover_image'] = 'Cover image is required.';
        }

        if (empty($userData['main_title'])) {
            $errors['main_title'] = 'Main title is required.';
        }

        if (empty($userData['subtitle'])) {
            $errors['subtitle'] = 'Subtitle is required.';
        }

        if (empty($userData['phone'])) {
            $errors['phone'] = 'Phone is required.';
        }

        if (empty($userData['location'])) {
            $errors['location'] = 'Location is required.';
        }

        if (!isset($userData['service_type']) || !in_array($userData['service_type'], ['services', 'products'])) {
            $errors['service_type'] = 'Service type must be products or services.';
        }

        if (empty($userData['linkedin_link'])) {
            $errors['linkedin_link'] = 'Linkedin link is required.';
        }

        if (empty($userData['facebook_link'])) {
            $errors['facebook_link'] = 'Facebook link is required.';
        }

        if (empty($userData['twitter_link'])) {
            $errors['twitter_link'] = 'Twitter link is required.';
        }

        if (empty($userData['google_link'])) {
            $errors['google_link'] = 'Google+ link is required.';
        }

        return $errors;
    }

    public static function validateServicesProductsData(array $servicesProductsData)
    {
        $errors = [];

        if (empty($servicesProductsData['img_url'])) {
            $errors['img_url'] = 'Img URL is required.';
        }

        if (empty($servicesProductsData['description'])) {
            $errors['description'] = 'Description is required.';
        }

        return $errors;
    }
}
