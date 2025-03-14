<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Ambil bagian setelah "@" pada email
    $email_parts = explode('@', $email);
    if (count($email_parts) == 2) {
        $expected_password = trim($email_parts[1]);
    } else {
        $expected_password = '';
    }

    // Validasi password
    if ($password !== $expected_password) {
        echo "<script>alert('Password salah! Harus sesuai dengan domain email Anda.'); window.location.href='page1.php';</script>";
        exit();
    }

    $_SESSION['email'] = $email;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="page3.php" method="post" enctype="multipart/form-data">
        <h2>Input Biodata</h2>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" readonly>
        <label>Nama Lengkap:</label>
        <input type="text" name="fullname" required>
        <label>Alamat:</label>
        <textarea name="address" required></textarea>
        <label>Pengalaman Organisasi (Opsional):</label>
        <textarea name="organization" placeholder="Pisahkan dengan enter"></textarea>
        <label>Pengalaman Kerja (Opsional):</label>
        <textarea name="experience"></textarea>
        <label>Pendidikan:</label>
        <input type="text" name="education_smp" placeholder="SMP" required>
        <input type="text" name="education_sma" placeholder="SMA" required>
        <input type="text" name="education_college" placeholder="Kuliah" required>
        <label>Prestasi:</label>
        <textarea name="achievements" required></textarea>
        <label>Skill:</label>
        <textarea name="skills" required></textarea>
        <label>Unggah Foto:</label>
        <input type="file" name="photo" accept="image/*" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>