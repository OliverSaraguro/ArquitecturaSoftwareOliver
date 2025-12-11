<?php
/**
 * Vista: Crear Producto
 * CLIENTE: Formulario que usa el mismo estilo que Members
 */
require_once __DIR__ . '/../layouts/header.php';
?>

<h2>Crear Nuevo Producto</h2>

<form method="POST" action="/index.php?controller=product&action=store" class="form">

    <!-- Nombre -->
    <div class="form-group">
        <label for="name">Nombre *</label>
        <input
            type="text"
            id="name"
            name="name"
            required
            class="<?php echo isset($errors['name']) ? 'error' : ''; ?>"
        >
        <?php if (isset($errors['name'])): ?>
            <span class="error-message"><?php echo htmlspecialchars($errors['name']); ?></span>
        <?php endif; ?>
    </div>

    <!-- Descripción -->
    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea
            id="description"
            name="description"
            rows="3"
        ></textarea>
    </div>

    <!-- Precio -->
    <div class="form-group">
        <label for="price">Precio *</label>
        <input
            type="number"
            id="price"
            name="price"
            step="0.01"
            required
        >
    </div>

    <!-- Stock -->
    <div class="form-group">
        <label for="stock">Stock *</label>
        <input
            type="number"
            id="stock"
            name="stock"
            required
        >
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Crear Producto</button>
        <a href="/index.php?controller=product&action=index" class="btn btn-secondary">Cancelar</a>
    </div>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>