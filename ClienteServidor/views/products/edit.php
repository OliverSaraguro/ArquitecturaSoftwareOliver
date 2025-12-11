<?php
/**
 * Vista: Editar Producto
 * 
 * CLIENTE: Formulario que muestra datos del SERVIDOR y permite editarlos
 */

require_once __DIR__ . '/../layouts/header.php';
?>

<h2>Editar Producto</h2>

<form method="POST" action="/index.php?controller=product&action=update" class="form">

    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">

    <!-- Nombre -->
    <div class="form-group">
        <label for="name">Nombre *</label>
        <input 
            type="text" 
            id="name" 
            name="name" 
            required
            value="<?php echo htmlspecialchars($product['name']); ?>"
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
        ><?php echo htmlspecialchars($product['description']); ?></textarea>
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
            value="<?php echo htmlspecialchars($product['price']); ?>"
            class="<?php echo isset($errors['price']) ? 'error' : ''; ?>"
        >
        <?php if (isset($errors['price'])): ?>
            <span class="error-message"><?php echo htmlspecialchars($errors['price']); ?></span>
        <?php endif; ?>
    </div>

    <!-- Stock -->
    <div class="form-group">
        <label for="stock">Stock *</label>
        <input 
            type="number" 
            id="stock" 
            name="stock" 
            required
            value="<?php echo htmlspecialchars($product['stock']); ?>"
            class="<?php echo isset($errors['stock']) ? 'error' : ''; ?>"
        >
        <?php if (isset($errors['stock'])): ?>
            <span class="error-message"><?php echo htmlspecialchars($errors['stock']); ?></span>
        <?php endif; ?>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="/index.php?controller=product&action=index" class="btn btn-secondary">Cancelar</a>
    </div>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>