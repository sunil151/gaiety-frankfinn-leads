<!DOCTYPE html>
<html>
<head>
    <title>Upload Excel</title>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
</head>
<body>

<div class="card">
    <h2>📤 Upload Excel File</h2>

    <!-- SUCCESS MESSAGE -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="message success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <!-- ERROR MESSAGE -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="message error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- ERRORS LIST -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="message error">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- UPLOAD FORM -->
    <form action="<?= base_url('excelimport/upload') ?>" method="post" enctype="multipart/form-data">
        <label for="excel_file">Choose Excel File:</label>
        <input type="file" name="excel_file" id="excel_file" required>

        <button type="submit" class="upload-btn">Upload</button>
    </form>

    <!-- DOWNLOAD CSV TEMPLATE -->
    <div class="download-link">
        <a href="<?= base_url('public/sample_file.csv') ?>" download>⬇ Download Sample CSV</a>
    </div>

    <!-- ACTION BUTTONS -->
    <div class="actions">
        <a href="<?= base_url('/') ?>" class="btn btn-back">⬅ Back</a>
        <a href="<?= base_url('/getData') ?>" class="btn btn-view">📄 View Data</a>
    </div>
</div>

</body>
</html>
