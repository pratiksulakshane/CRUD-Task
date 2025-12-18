<?php
require "../config/db.php";
include "../includes/header.php";

$errors = [];

function clean($value) {
    return htmlspecialchars(trim($value));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = clean($_POST['name'] ?? '');
    $price = clean($_POST['price'] ?? '');
    $category = clean($_POST['category'] ?? '');

    // -------- SERVER SIDE VALIDATION --------

    if ($name === "" || strlen($name) < 3) {
        $errors['name'] = "Product name must be at least 3 characters";
    }

    if ($price === "" || !is_numeric($price) || $price <= 0) {
        $errors['price'] = "Enter a valid price greater than 0";
    }

    if ($category === "" || !preg_match("/^[a-zA-Z ]+$/", $category)) {
        $errors['category'] = "Category must contain letters only";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare(
            "INSERT INTO products (name, price, category) VALUES (?, ?, ?)"
        );
        $stmt->execute([$name, $price, $category]);
        header("Location: index.php");
        exit;
    }
}
?>

<h3>Add Product</h3>

<form method="post" onsubmit="return validateForm();">

    <input type="text" class="form-control mb-1" id="name" name="name"
           placeholder="Product Name" value="<?= $name ?? '' ?>">
    <small class="text-danger"><?= $errors['name'] ?? '' ?></small>

    <input type="text" class="form-control mt-2 mb-1" id="price" name="price"
           placeholder="Price" value="<?= $price ?? '' ?>">
    <small class="text-danger"><?= $errors['price'] ?? '' ?></small>

    <input type="text" class="form-control mt-2 mb-1" id="category" name="category"
           placeholder="Category" value="<?= $category ?? '' ?>">
    <small class="text-danger"><?= $errors['category'] ?? '' ?></small>

    <button class="btn btn-success mt-3">Save</button>
</form>

<!-- CLIENT SIDE VALIDATION -->
<script>
function validateForm() {

    let name = document.getElementById("name").value.trim();
    let price = document.getElementById("price").value.trim();
    let category = document.getElementById("category").value.trim();

    if (name.length < 3) {
        alert("Product name must be at least 3 characters");
        return false;
    }

    if (isNaN(price) || price <= 0) {
        alert("Please enter a valid price");
        return false;
    }

    if (!/^[a-zA-Z ]+$/.test(category)) {
        alert("Category must contain only letters");
        return false;
    }

    return true;
}
</script>

<?php include "../includes/footer.php"; ?>
