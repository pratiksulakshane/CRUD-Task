<?php
require "../config/db.php";
include "../includes/header.php";

function clean($value) {
    return htmlspecialchars(trim($value));
}

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = clean($_POST['name']);
    $price = clean($_POST['price']);
    $category = clean($_POST['category']);

    // -------- SERVER SIDE VALIDATION --------

    if ($name === "" || strlen($name) < 3) {
        $errors['name'] = "Product name must be at least 3 characters";
    }

    if ($price === "" || !is_numeric($price) || $price <= 0) {
        $errors['price'] = "Enter a valid price";
    }

    if ($category === "" || !preg_match("/^[a-zA-Z ]+$/", $category)) {
        $errors['category'] = "Category must contain letters only";
    }

    if (empty($errors)) {
        $pdo->prepare(
            "UPDATE products SET name=?, price=?, category=? WHERE id=?"
        )->execute([$name, $price, $category, $id]);

        header("Location: index.php");
        exit;
    }
}
?>

<h3>Edit Product</h3>

<form method="post" onsubmit="return validateForm();">

    <input class="form-control mb-1" id="name" name="name"
           value="<?= $product['name'] ?>">
    <small class="text-danger"><?= $errors['name'] ?? '' ?></small>

    <input class="form-control mt-2 mb-1" id="price" name="price"
           value="<?= $product['price'] ?>">
    <small class="text-danger"><?= $errors['price'] ?? '' ?></small>

    <input class="form-control mt-2 mb-1" id="category" name="category"
           value="<?= $product['category'] ?>">
    <small class="text-danger"><?= $errors['category'] ?? '' ?></small>

    <button class="btn btn-primary mt-3">Update</button>
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
