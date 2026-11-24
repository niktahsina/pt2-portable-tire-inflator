<?php

class ProductsController
{
    public function index(): void
    {
        require_once 'models/ProductModel.php';
        $productModel = new ProductModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
            $productModel->createProduct($_POST);
            header('Location: index.php?url=products');
            exit;
        }

        $products = $productModel->getAllProducts();
        require_once 'views/products.php';
    }
}