<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title ?? 'BuildPro ERP') ?> - Construction Management System</title>
  <link rel="stylesheet" href="<?= $root_path ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $root_path ?>assets/css/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= $root_path ?>assets/css/style.css">
</head>
<body class="erp-body" data-root="<?= $root_path ?>" data-page="<?= $active_page ?? 'dashboard' ?>">

  <div class="erp-wrapper">
