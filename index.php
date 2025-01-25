<?php
include 'db.php';

$sql = "SELECT * FROM photos ORDER BY created_at DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Photo Gallery</title>
 <?php include 'css.php'; ?>
 
</head>
<body>
    <h1>Photo Gallery</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Title: <input type="text" name="title" required>
        Select image: <input type="file" name="file" required>
        <input type="submit" value="Upload Image">
    </form>

    <?php if ($result->num_rows > 0): ?>
        <div>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div>
                    <h3><?php echo $row['title']; ?></h3>
                    <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['title']; ?>" width="200">
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No photos uploaded yet.</p>
    <?php endif; ?>

</body>
</html>
