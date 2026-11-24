<?php
ob_start();
$products = $products ?? [];
$editingProduct = $editingProduct ?? null;
$isEditing = is_array($editingProduct) && !empty($editingProduct);

$editId = $editingProduct['id'] ?? '';
$editProductNum = $editingProduct['product_num'] ?? '';
$editProductName = $editingProduct['product_name'] ?? '';
$editProductPrice = $editingProduct['product_price'] ?? '';
$editProductBrand = $editingProduct['product_brand'] ?? '';
$editProductCondition = $editingProduct['product_condition'] ?? '';
$editProductYear = $editingProduct['product_year'] ?? '';
$editProductQuantity = $editingProduct['product_quantity'] ?? '';
$editProductImage = $editingProduct['product_image'] ?? '';
?>

<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Products</h2>
        <p class="text-muted mb-0">Manage and track all your portable tire inflators</p>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <!-- Form Header -->
        <div class="row g-0 align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    <?= $isEditing ? 'Edit Product' : 'Product Form' ?>
                </h5>
                <small class="text-muted">
                    <?= $isEditing ? 'Update the selected portable tire inflator' : 'Fill in the details of a portable tire inflator' ?>
                </small>
            </div>
            <div class="col-auto">
                <span class="badge bg-primary">* Required fields</span>
            </div>
        </div>

        <hr>

        <form action="index.php?url=products" method="post" class="needs-validation" novalidate>
            <?php if ($isEditing): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars((string) $editId) ?>">
            <?php endif; ?>

            <div class="row g-3">
                <div class="col-md-3">
                    <label for="pid" class="form-label">Product ID <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_num" id="pid" type="text" class="form-control" placeholder="Enter Product ID" value="<?= htmlspecialchars((string) $editProductNum) ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label">Name <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_name" id="name" type="text" class="form-control" placeholder="Enter Product Name" value="<?= htmlspecialchars((string) $editProductName) ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="price" class="form-label">Price (RM) <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_price" id="price" type="number" class="form-control" placeholder="Enter Price" value="<?= htmlspecialchars((string) $editProductPrice) ?>" required min="0" step="0.01">
                </div>
                <div class="col-md-3">
                    <label for="brand" class="form-label">Brand <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="product_brand" id="brand" class="form-select" required>
                        <option value="">Select Brand</option>
                        <?php foreach (['Xiaomi', 'Baseus', 'Michelin', 'Black+Decker'] as $brandOption): ?>
                            <option value="<?= htmlspecialchars($brandOption) ?>" <?= $editProductBrand === $brandOption ? 'selected' : '' ?>>
                                <?= htmlspecialchars($brandOption) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="product_condition" class="form-label">Max Pressure <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="product_condition" id="product_condition" class="form-select" required>
                        <option value="">Select Max Pressure</option>
                        <?php foreach (['120 PSI', '150 PSI'] as $pressureOption): ?>
                            <option value="<?= htmlspecialchars($pressureOption) ?>" <?= $editProductCondition === $pressureOption ? 'selected' : '' ?>>
                                <?= htmlspecialchars($pressureOption) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="year" class="form-label">Battery Capacity <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="product_year" id="year" class="form-select" required>
                        <option value="">Select Battery</option>
                        <?php foreach (['4000 mAh', '6000 mAh'] as $batteryOption): ?>
                            <option value="<?= htmlspecialchars($batteryOption) ?>" <?= $editProductYear === $batteryOption ? 'selected' : '' ?>>
                                <?= htmlspecialchars($batteryOption) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="quantity" class="form-label">Quantity <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_quantity" id="quantity" type="number" class="form-control" placeholder="Enter Quantity" value="<?= htmlspecialchars((string) $editProductQuantity) ?>" required min="0">
                </div>
                <div class="col-md-3">
                    <label for="product_image" class="form-label">Image</label>
                    <input name="product_image" id="product_image" type="text" class="form-control" placeholder="Enter image filename" value="<?= htmlspecialchars((string) $editProductImage) ?>">
                </div>
            </div>

            <hr class="mt-4 mb-3">

            <div>
                <?php if ($isEditing): ?>
                    <button type="submit" name="update" class="btn btn-success">
                        <i class="bi bi-check-lg me-1"></i>Update
                    </button>
                    <a href="index.php?url=products" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i>Cancel
                    </a>
                <?php else: ?>
                    <button type="submit" name="create" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Create
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>Clear
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-table text-primary me-2"></i>
                    Product List
                </h5>
                <small class="text-muted">View and manage all portable tire inflators in inventory</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-success">Total: <?= count($products) ?> items</span>
            </div>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Price (RM)</th>
                        <th>Brand</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <?php
                            $id = $product['id'] ?? '';
                            $productNum = $product['product_num'] ?? $id;
                            $name = $product['product_name'] ?? '';
                            $price = $product['product_price'] ?? 0;
                            $brand = $product['product_brand'] ?? '';
                            ?>
                            <tr>
                                <td><?= htmlspecialchars((string) $productNum) ?></td>
                                <td><?= htmlspecialchars((string) $name) ?></td>
                                <td>RM <?= number_format((float) $price, 2) ?></td>
                                <td><?= htmlspecialchars((string) $brand) ?></td>
                                <td>
                                    <a href="index.php?url=products&edit=<?= urlencode((string) $id) ?>" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-info text-white" title="Image">
                                        <i class="bi bi-image"></i>
                                    </button>
                                    <a href="index.php?url=products&delete=<?= urlencode((string) $id) ?>" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Delete this product?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">No products found in the database.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>