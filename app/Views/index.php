<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

    <div class="container">
        <h2>Excel Data Manager</h2>

        <a href="<?= base_url('uploadExcel') ?>" class="btn btn-upload">📤 Upload Data</a>
        <a href="<?= base_url('/getData') ?>" class="btn btn-list">📄 View Data List</a>
    </div>

</body>
</html>
