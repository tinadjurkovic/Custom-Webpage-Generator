<?php

namespace App\Classes;

require_once __DIR__ . '/User.php';

use PDO;
use RuntimeException;

class UserService
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(User $user): int
    {
        $query = 'INSERT INTO users (cover_image, main_title, subtitle, about_you, phone, location, service_type, linkedin_link, facebook_link, twitter_link, google_link) 
                  VALUES (:cover_image, :main_title, :subtitle, :about_you, :phone, :location, :service_type, :linkedin_link, :facebook_link, :twitter_link, :google_link)';

        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':cover_image' => $user->getCoverImage(),
                ':main_title' => $user->getMainTitle(),
                ':subtitle' => $user->getSubtitle(),
                ':about_you' => $user->getAboutYou(),
                ':phone' => $user->getPhone(),
                ':location' => $user->getLocation(),
                ':service_type' => $user->getServiceType(),
                ':linkedin_link' => $user->getLinkedinLink(),
                ':facebook_link' => $user->getFacebookLink(),
                ':twitter_link' => $user->getTwitterLink(),
                ':google_link' => $user->getGoogleLink()
            ]);
        } catch (\PDOException $e) {
            throw new RuntimeException("Failed to create user: " . $e->getMessage());
        }

        return (int) $this->db->lastInsertId();
    }

    public function getUserById($id): array
    {
        $query = 'SELECT * FROM users WHERE id = :id';

        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $user = [];
        }

        return $user;
    }

    public function getAllUsers(): array
    {
        $query = 'SELECT * FROM users';

        $stmt = $this->db->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function updateUser(int $id, array $userData): void
    {
        $data = [
            'cover_image' => $userData['cover_image'],
            'main_title' => $userData['main_title'],
            'subtitle' => $userData['subtitle'],
            'about_you' => $userData['about_you'],
            'phone' => $userData['phone'],
            'location' => $userData['location'],
            'service_type' => $userData['service_type'],
            'linkedin_link' => $userData['linkedin_link'],
            'facebook_link' => $userData['facebook_link'],
            'twitter_link' => $userData['twitter_link'],
            'google_link' => $userData['google_link'],
            'id' => $id,
        ];


        $query = 'UPDATE users SET cover_image=:cover_image, main_title=:main_title, subtitle=:subtitle, about_you=:about_you, phone=:phone, location=:location, service_type=:service_type, linkedin_link=:linkedin_link, facebook_link=:facebook_link, twitter_link=:twitter_link, google_link=:google_link WHERE id=:id';

        $stmt = $this->db->prepare($query);
        $stmt->execute($data);

    }

    public function deleteUser(int $id): void
    {
        $data = [
            'id' => $id,
        ];

        $query = 'DELETE FROM users WHERE id=:id';

        $stmt = $this->db->prepare($query);
        $stmt->execute($data);

    }
}
