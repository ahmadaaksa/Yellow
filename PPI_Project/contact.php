<?php
// Memasukkan file header
include 'header.php';
?>

<div class="content">
    <h1>Kontak Kami</h1>
    <p>Anda dapat menghubungi kami melalui form di bawah ini:</p>
    
    <form action="submit_contact.php" method="post">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Pesan:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Kirim">
    </form>
</div>

<?php
// Memasukkan file footer
include 'footer.php';
?>

