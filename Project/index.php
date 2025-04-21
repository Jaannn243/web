<?php
// Memanggil file koneksi database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Dinamis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="navbar-brand">Blog Dinamis</a>
            <ul class="navbar-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Kategori</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <!-- Konten Artikel -->
    <?php
    // Query untuk mengambil data artikel beserta gambar dari database
    $sql = "SELECT a.title AS title, a.date AS publish_date, au.nickname AS author, c.name AS category, a.content AS content, a.picture AS picture
            FROM article a
            JOIN article_author aa ON a.id = aa.article_id
            JOIN author au ON aa.author_id = au.id
            JOIN article_category ac ON a.id = ac.article_id
            JOIN category c ON ac.category_id = c.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='container'>";
            echo "<div class='article-header'>";
            echo "<h1>" . $row["title"] . "</h1>";
            echo "<p>Dipublikasikan pada <span class='date'>" . $row["publish_date"] . "</span> oleh <span class='author'>" . $row["author"] . "</span></p>";
            echo "</div>";

            // Kategori artikel yang terpusat
            echo "<div class='article-category'>";
            echo "<span class='category'>Kategori: " . $row["category"] . "</span>";
            echo "</div>";

            // Menampilkan gambar artikel dari database
            if (!empty($row["picture"])) {
                echo "<div class='article-image'>";
                echo "<img src='img/" . $row["picture"] . "' alt='Gambar Artikel' class='article-img'>";
                echo "</div>";
            } else {
                echo "<div class='article-image'>";
                echo "<img src='img/download.jpeg' alt='Gambar Artikel Default' class='article-img'>";
                echo "</div>";
            }

            // Konten artikel
            echo "<div class='article-content'>";
            echo "<p>" . $row["content"] . "</p>";
            echo "</div>";

            // Footer artikel
            echo "<div class='article-footer'>";
            echo "<p>© Copyright By Fauzan.com</p>";
            echo "</div>";

            echo "</div>"; // Penutupan kontainer
        }
    } else {
        echo "Tidak ada artikel ditemukan.";
    }

    // Menutup koneksi database
    $conn->close();
    ?>

</body>
</html>
