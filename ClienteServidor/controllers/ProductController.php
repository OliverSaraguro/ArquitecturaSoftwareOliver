<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController
{
    private $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function index()
    {
        $products = $this->model->getAll();
        include __DIR__ . '/../views/products/index.php';
    }

    public function create()
    {
        include __DIR__ . '/../views/products/create.php';
    }

    public function store()
    {
        // EL MODELO REQUIERE UN ARRAY
        $this->model->create([
            'name'        => $_POST['name'],
            'description' => $_POST['description'],
            'price'       => $_POST['price'],
            'stock'       => $_POST['stock']
        ]);

        header("Location: /index.php?controller=product&action=index");
    }

    public function edit()
    {
        $id = $_GET['id'];
        $product = $this->model->getById($id);

        include __DIR__ . '/../views/products/edit.php';
    }

    public function update()
    {
        $this->model->update([
            'id'          => $_POST['id'],
            'name'        => $_POST['name'],
            'description' => $_POST['description'],
            'price'       => $_POST['price'],
            'stock'       => $_POST['stock']
        ]);

        header("Location: /index.php?controller=product&action=index");
    }

    public function delete()
    {
        $this->model->delete($_GET['id']);

        header("Location: /index.php?controller=product&action=index");
    }
}