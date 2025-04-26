<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<h1 class="mb-4">All Photos</h1>

<div class="row">
<?php
$stmt = $pdo->query("SELECT * FROM images ORDER BY upload_date DESC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="col-md-4 mb-4">';
    echo '<div class="card">';
    echo '<img src="assets/images/' . htmlspecialchars($row['filename']) . '" class="card-img-top" alt="...">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
    echo '<p class="card-text"><small class="text-muted">Uploaded on ' . $row['upload_date'] . '</small></p>';
    echo '</div></div></div>';
}
?>
</div>

<?php include 'includes/footer.php'; ?>
