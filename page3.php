<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['email'] = $_POST['email'] ?? '';
    $_SESSION['fullname'] = $_POST['fullname'] ?? '';
    $_SESSION['address'] = $_POST['address'] ?? '';
    $_SESSION['organization'] = nl2br($_POST['organization'] ?? '');
    $_SESSION['experience'] = nl2br($_POST['experience'] ?? '');
    $_SESSION['education_smp'] = $_POST['education_smp'] ?? '';
    $_SESSION['education_sma'] = $_POST['education_sma'] ?? '';
    $_SESSION['education_college'] = $_POST['education_college'] ?? '';
    $_SESSION['achievements'] = nl2br($_POST['achievements'] ?? '');
    $_SESSION['skills'] = nl2br($_POST['skills'] ?? '');
    $_SESSION['birth_place'] = $_POST['birth_place'] ?? '';
    $_SESSION['birth_date'] = $_POST['birth_date'] ?? '';

    
    // Simpan foto
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $photo_path = $upload_dir . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);
        $_SESSION['photo'] = $photo_path;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION['fullname'] ? $_SESSION['fullname'] . " - CV" : "Curriculum Vitae"; ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="cv-container">
        <?php if (!empty($_SESSION['photo'])): ?>
        <div class="photo-container">
            <img src="<?php echo $_SESSION['photo']; ?>" alt="Foto Profil" class="profile-photo">
        </div>
        <?php endif; ?>
        
        <h1><?php echo $_SESSION['fullname'] ?: "Curriculum Vitae"; ?></h1>
        <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
        <p><strong>Alamat:</strong> <?php echo $_SESSION['address']; ?></p>
        <p><strong>Tempat, Tanggal Lahir:</strong> <?php echo $_SESSION['birth_place'] . ", " . date('d F Y', strtotime($_SESSION['birth_date'])); ?></p>

        
        <?php if (!empty($_SESSION['organization'])): ?>
        <h2>Pengalaman Organisasi</h2>
        <p><?php echo $_SESSION['organization']; ?></p>
        <?php endif; ?>
        
        <?php if (!empty($_SESSION['experience'])): ?>
        <h2>Pengalaman Kerja</h2>
        <p><?php echo $_SESSION['experience']; ?></p>
        <?php endif; ?>
        
        <h2>Pendidikan</h2>
        <ul>
            <li><strong>SMP:</strong> <?php echo $_SESSION['education_smp']; ?></li>
            <li><strong>SMA:</strong> <?php echo $_SESSION['education_sma']; ?></li>
            <li><strong>Kuliah:</strong> <?php echo $_SESSION['education_college']; ?></li>
        </ul>
        
        <h2>Prestasi</h2>
        <p><?php echo $_SESSION['achievements']; ?></p>
        
        <h2>Skill</h2>
        <p><?php echo $_SESSION['skills']; ?></p>
    </div>
</body>
</html>
