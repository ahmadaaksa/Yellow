<?php
// Memasukkan file header
include 'header.php';
?>

<div class="content">
    <h1>Sign Up</h1>
    <form action="sign_up.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" name="register" value="Register">
    </form>
</div>

<?php
// Memasukkan file footer
include 'footer.php';
?>
<?php
// Menyertakan file koneksi database
include 'db_connect.php'; // Pastikan file ini menghubungkan ke database Anda

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Memeriksa apakah username sudah ada
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p>Username sudah terdaftar, pilih username lain.</p>";
    } else {
        // Menyimpan pengguna baru ke database
        $insert_query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "<p>Registrasi berhasil! Silakan <a href='login.php'>login</a>.</p>";
        } else {
            echo "<p>Terjadi kesalahan, coba lagi.</p>";
        }
    }
}
?>


