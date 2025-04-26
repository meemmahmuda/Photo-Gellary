<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<h1 class="mb-4">Upload New Photo</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmp = $_FILES['image']['tmp_name'];
        $fileName = basename($_FILES['image']['name']);
        $fileSize = $_FILES['image']['size'];

        if ($fileSize <= 5000000) { // 5MB
            $targetPath = "assets/images/" . $fileName;
            if (move_uploaded_file($fileTmp, $targetPath)) {
                $stmt = $pdo->prepare("INSERT INTO images (title, description, filename) VALUES (?, ?, ?)");
                $stmt->execute([$title, $description, $fileName]);
                echo '<div class="alert alert-success">Image uploaded successfully!</div>';
            } else {
                echo '<div class="alert alert-danger">Error uploading file.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">File size must be under 5MB.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Please select a valid image.</div>';
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Choose Image</label>
    <input type="file" name="image" class="form-control" accept="image/*" required>
  </div>
  <button type="submit" class="btn btn-primary">Upload</button>
</form>

<?php include 'includes/footer.php'; ?>
