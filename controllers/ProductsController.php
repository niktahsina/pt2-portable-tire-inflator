<?php

class ProductsController
{
    public function index(): void
    {
        require_once 'models/ProductModel.php';
        $productModel = new ProductModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create'])) {
                $productModel->createProduct($_POST);
                header('Location: index.php?url=products');
                exit;
            }

            if (isset($_POST['update']) && !empty($_POST['id'])) {
                $productModel->updateProduct((int) $_POST['id'], $_POST);
                header('Location: index.php?url=products');
                exit;
            }
        }

        if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
            $productModel->deleteProduct((int) $_GET['delete']);
            header('Location: index.php?url=products');
            exit;
        }

        $editingProduct = null;
        if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
            $editingProduct = $productModel->getProductById((int) $_GET['edit']);
        }

        $products = $productModel->getAllProducts();
        require_once 'views/products.php';
    }
}