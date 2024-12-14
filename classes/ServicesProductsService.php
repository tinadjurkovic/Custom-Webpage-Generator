<?php

namespace App\Classes;

require_once __DIR__ . '/ServicesProducts.php';

use PDO;
use RuntimeException;

class ServicesProductsService
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(ServicesProducts $services_products): int
    {
        $query = 'INSERT INTO services_products (user_id, img_url, description) 
                  VALUES (:user_id, :img_url, :description)';

        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':user_id' => $services_products->getUserId(),
                ':img_url' => $services_products->getImgUrl(),
                ':description' => $services_products->getDescription(),
            ]);
        } catch (\PDOException $e) {
            throw new RuntimeException("Failed to create service or product: " . $e->getMessage());
        }

        return (int) $this->db->lastInsertId();
    }

    public function getServicesProductsById($userId): array
    {
        $query = 'SELECT * FROM services_products WHERE user_id = :user_id LIMIT 3';

        $stmt = $this->db->prepare($query);
        $stmt->execute(['user_id' => $userId]);

        $service_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$service_products) {
            $service_products = [];
        }

        return $service_products;
    }


    public function getAllServicesProducts(): array
    {
        $query = 'SELECT * FROM services_products';

        $stmt = $this->db->query($query);
        $services_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $services_products;
    }

    public function updateServicesProducts(int $id, array $servicesProductsData): void
    {
        $data = [
            'user_id' => $servicesProductsData['user_id'],
            'img_url' => $servicesProductsData['img_url'],
            'description' => $servicesProductsData['description'],
            'id' => $id,
        ];


        $query = 'UPDATE services_products SET user_id=:user_id, img_url=:img_url, description=:description WHERE id=:id';

        $stmt = $this->db->prepare($query);
        $stmt->execute($data);

    }

    public function deleteServicesProducts(int $id): void
    {
        $data = [
            'id' => $id,
        ];

        $query = 'DELETE FROM services_products WHERE id=:id';

        $stmt = $this->db->prepare($query);
        $stmt->execute($data);

    }
}
