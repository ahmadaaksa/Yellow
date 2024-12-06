<?php
// Memasukkan file header
include 'header.php';
?>

<div class="content">
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" name="login" value="Login">
    </form>
</div>

<?php
// Memasukkan file footer
include 'footer.php';
?>
<?php
// Menyertakan file koneksi database
include 'db_connect.php'; // Pastikan file ini menghubungkan ke database Anda

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data pengguna
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah pengguna ditemukan
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Menyimpan informasi pengguna ke session
            $_SESSION['username'] = $user['username'];
            header("Location: index.php"); // Arahkan ke halaman utama
            exit;
        } else {
            echo "<p>Password salah!</p>";
        }
    } else {
        echo "<p>Username tidak ditemukan!</p>";
    }
}
?>

