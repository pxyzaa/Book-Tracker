<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Book Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="width: 450px;">
        <h2 class="text-center mb-4">Book Tracker Login</h2>

        <form id="registerForm" action="main.php" method="get">

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="full_name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Favorite Genre</label>
                <select class="form-select" name="genre" required>
                    <option value="" selected disabled>- Pilih Genre -</option>
                    <option>Fantasy</option>
                    <option>Action</option>
                    <option>Mystery</option>
                    <option>Horror</option>
                    <option>Sci-Fi</option>
                    <option>Romance</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login / Register
            </button>

        </form>
    </div>
</div>

<script>
document.getElementById("registerForm").addEventListener("submit", function(e) {
    if (document.getElementById("password").value.length < 8) {
        alert("Gagal: Password harus memiliki minimal 8 karakter!");
        e.preventDefault();
    } else {
        alert("Registration Successful!");
    }
});
</script>

</body>
</html>