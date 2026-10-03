<?php
$books = [
    ["title" => "The Devotion of Suspect X", "author" => "Keigo Higashino", "status" => "Selesai"],
    ["title" => "Silent Parade", "author" => "Keigo Higashino", "status" => "Belum Selesai"]
];

$name = $_GET["full_name"] ?? "Yuki";
$genre = $_GET["genre"] ?? "Belum dipilih";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Book Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="main.php">Book Tracker</a>
        <div>
            <a class="btn btn-outline-light btn-sm" href="main.php">Main Page</a>
            <a class="btn btn-outline-light btn-sm" href="profile.php">Profile</a>
            <a class="btn btn-outline-light btn-sm" href="index.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container py-4">

    <h2>Halo, <?= htmlspecialchars($name) ?>!</h2>
    <p class="text-muted">Favorite Genre: <?= htmlspecialchars($genre) ?></p>

    <div class="row g-4">

        <!-- Form Tambah Buku -->
        <div class="col-md-5">
            <div class="card shadow-sm p-3">
                <h4>Tambah Buku Baru</h4>

                <form id="bookForm">
                    <input type="text" id="title" class="form-control mb-3"
                           placeholder="Judul Buku" required>

                    <input type="text" id="author" class="form-control mb-3"
                           placeholder="Penulis" required>

                    <select id="status" class="form-select mb-3" required>
                        <option value="" selected disabled>Status Baca</option>
                        <option>Selesai</option>
                        <option>Belum Selesai</option>
                    </select>

                    <button class="btn btn-success w-100">
                        + Tambah Buku
                    </button>
                </form>
            </div>
        </div>

        <!-- Daftar Buku -->
        <div class="col-md-7">
            <div class="card shadow-sm p-3">
                <h4>Daftar Buku Saya</h4>

                <div id="bookList">

                    <?php foreach ($books as $book): ?>
                        <div class="book border rounded p-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><?= $book["title"] ?></h5>
                                    <p class="text-muted mb-2">
                                        Penulis: <?= $book["author"] ?>
                                    </p>

                                    <?php if ($book["status"] == "Selesai"): ?>
                                        <span class="badge bg-success">Selesai</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">
                                            Belum Selesai
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <button class="btn btn-sm btn-outline-danger delete">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
document.getElementById("bookForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let title = document.getElementById("title").value;
    let author = document.getElementById("author").value;
    let status = document.getElementById("status").value;

    let book = document.createElement("div");
    book.className = "book border rounded p-3 mb-3";

    let badge = status == "Selesai"
        ? "bg-success"
        : "bg-warning text-dark";

    book.innerHTML = `
        <div class="d-flex justify-content-between">
            <div>
                <h5>${title}</h5>
                <p class="text-muted mb-2">Penulis: ${author}</p>
                <span class="badge ${badge}">${status}</span>
            </div>
            <button class="btn btn-sm btn-outline-danger delete">
                Hapus
            </button>
        </div>
    `;

    document.getElementById("bookList").appendChild(book);
    this.reset();

    book.querySelector(".delete").onclick = () => book.remove();
});

document.querySelectorAll(".delete").forEach(button => {
    button.onclick = () => button.closest(".book").remove();
});
</script>

</body>
</html>