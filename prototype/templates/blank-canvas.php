<?php
/**
 * ============================================================================
 * BuildPro ERP - Blank Canvas Page Template
 * ============================================================================
 * Minimal clean layout with standard header, sidebar, topbar, and footer.
 */

$page_title = 'Custom Page';
$active_menu = 'dashboard';

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<div class="erp-page-header">
  <div class="erp-page-title-group">
    <div class="erp-breadcrumb">
      <a href="<?= $root_path ?>dashboard.php"><i class="bi bi-house-door me-1"></i>Dashboard</a>
      <i class="bi bi-chevron-right small text-muted"></i>
      <span class="text-dark fw-semibold"><?= htmlspecialchars($page_title) ?></span>
    </div>
    <h1><?= htmlspecialchars($page_title) ?></h1>
    <p class="erp-page-desc">Custom workspace for project <strong><?= htmlspecialchars($current_project) ?></strong>.</p>
  </div>
</div>

<div class="erp-content">
  <div class="erp-card">
    <div class="erp-card-header">
      <h5 class="erp-card-title"><i class="bi bi-grid text-primary"></i> Main Container</h5>
    </div>
    <div class="erp-card-body">
      <p class="text-muted">Insert your custom content, forms, charts, or widgets here.</p>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
