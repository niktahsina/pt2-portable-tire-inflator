<?php

class ProductsController {
    public function index() {
        require_once 'models/ProductModel.php';
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        require_once 'views/products.php';
    }
}