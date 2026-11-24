<?php

class ProductController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model("productmodel");
    }

    public function index(): void
    {
        $records = $this->model->readAll();
        $this->view("products", ["products" => $records]);
    }

    public function save(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
        }

        header("Location: " . BASE_URL . "productcontroller");
        exit;
    }

    public function edit($id): void
    {
        $aproduct = $this->model->readById($id);

        if (!$aproduct) {
            exit;
        }

        $this->view("products", [
            "aproduct" => $aproduct,
            "products" => $this->model->readAll()
        ]);
    }

    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($_POST);
        }

        header("Location: " . BASE_URL . "productcontroller");
        exit;
    }

    public function delete($id): void
    {
        $aproduct = $this->model->readById($id);

        if (!$aproduct) {
            exit;
        }

        $this->model->delete($id);
        header("Location: " . BASE_URL . "productcontroller");
        exit;
    }
}