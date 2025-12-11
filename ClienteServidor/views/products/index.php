<?php
/**
 * Vista: Lista de Productos
 * 
 * CLIENTE: Muestra la lista de productos enviados por el SERVIDOR
 */

require_once __DIR__ . '/../layouts/header.php';
?>

<h2>Gestión de Productos</h2>

<div class="actions mb-3">
    <a href="/index.php?controller=product&action=create" class="btn btn-primary">
        ➕ Nuevo Producto
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th style="width: 150px;">Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php if (empty($products)): ?>
            <tr>
                <td colspan="6" class="text-center">No hay productos registrados</td>
            </tr>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['id']) ?></td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['description']) ?></td>
                    <td>$<?= number_format($product['price'], 2) ?></td>
                    <td><?= htmlspecialchars($product['stock']) ?></td>

                    <td>
                        <a href="/index.php?controller=product&action=edit&id=<?= $product['id'] ?>" 
                           class="btn btn-sm btn-secondary">
                            Editar
                        </a>

                        <a href="/index.php?controller=product&action=delete&id=<?= $product['id'] ?>"
                           onclick="return confirm('¿Seguro que deseas eliminar este producto?');"
                           class="btn btn-sm btn-danger">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>