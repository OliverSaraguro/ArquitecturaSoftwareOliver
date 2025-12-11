<?php
/**
 * Modelo de Producto
 * 
 * Este modelo representa la capa de acceso a datos para los productos.
 * Sigue el diseño de Payment.php usando PDO y Singleton Database.
 */

require_once __DIR__ . '/../config/database.php';

class Product {
    private $db;

    public function __construct() {
        $database = Database::getInstance();
        $this->db = $database->getConnection();
    }

    /**
     * Obtiene todos los productos desde el SERVIDOR
     * 
     * @return array Lista de productos
     */
    public function getAll() {
        $sql = "SELECT * FROM products ORDER BY id ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    /**
     * Obtiene un producto por ID
     * 
     * @param int $id
     * @return array|false
     */
    public function getById($id) {
        $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    /**
     * Crea un nuevo producto
     * 
     * @param array $data
     * @return int ID del producto creado
     */
    public function create($data) {
        $sql = "INSERT INTO products (name, description, price, stock)
                VALUES (:name, :description, :price, :stock)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock']
        ]);

        return $this->db->lastInsertId();
    }

    /**
     * Actualiza un producto
     * 
     * @param array $data
     * @return bool
     */
    public function update($data) {
        $sql = "UPDATE products
                SET name = :name,
                    description = :description,
                    price = :price,
                    stock = :stock
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock']
        ]);
    }

    /**
     * Elimina un producto
     * 
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}