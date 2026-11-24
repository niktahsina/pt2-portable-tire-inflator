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
}