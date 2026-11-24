<?php

class ProductModel
{
    /** @var PDO|null */
    private ?PDO $db = null;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getAllProducts(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM products");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getProductById(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        return $product ?: null;
    }

    /**
     * @param array<string, mixed> $data
     */
    public function createProduct(array $data): bool
    {
        $sql = "INSERT INTO products (
                    product_num,
                    product_name,
                    product_price,
                    product_brand,
                    product_condition,
                    product_year,
                    product_quantity,
                    product_image
                ) VALUES (
                    :product_num,
                    :product_name,
                    :product_price,
                    :product_brand,
                    :product_condition,
                    :product_year,
                    :product_quantity,
                    :product_image
                )";

        $stmt = $this->db->prepare($sql);

        $image = isset($data['product_image']) && trim((string) $data['product_image']) !== ''
            ? trim((string) $data['product_image'])
            : null;

        return $stmt->execute([
            ':product_num'       => trim((string) ($data['product_num'] ?? '')),
            ':product_name'      => trim((string) ($data['product_name'] ?? '')),
            ':product_price'     => $data['product_price'] ?? 0,
            ':product_brand'     => trim((string) ($data['product_brand'] ?? '')),
            ':product_condition' => trim((string) ($data['product_condition'] ?? '')),
            ':product_year'      => trim((string) ($data['product_year'] ?? '')),
            ':product_quantity'  => $data['product_quantity'] ?? 0,
            ':product_image'     => $image,
        ]);
    }

    /**
     * @param array<string, mixed> $data
     */
    public function updateProduct(int $id, array $data): bool
    {
        $sql = "UPDATE products SET
                    product_num = :product_num,
                    product_name = :product_name,
                    product_price = :product_price,
                    product_brand = :product_brand,
                    product_condition = :product_condition,
                    product_year = :product_year,
                    product_quantity = :product_quantity,
                    product_image = :product_image
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        $image = isset($data['product_image']) && trim((string) $data['product_image']) !== ''
            ? trim((string) $data['product_image'])
            : null;

        return $stmt->execute([
            ':id'                => $id,
            ':product_num'       => trim((string) ($data['product_num'] ?? '')),
            ':product_name'      => trim((string) ($data['product_name'] ?? '')),
            ':product_price'     => $data['product_price'] ?? 0,
            ':product_brand'     => trim((string) ($data['product_brand'] ?? '')),
            ':product_condition' => trim((string) ($data['product_condition'] ?? '')),
            ':product_year'      => trim((string) ($data['product_year'] ?? '')),
            ':product_quantity'  => $data['product_quantity'] ?? 0,
            ':product_image'     => $image,
        ]);
    }

    public function deleteProduct(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}