<?php
$page_title = "Project Directory";
$active_page = "project-list";
require_once __DIR__ . '/../includes/config.php';
require_once $includes_path . 'header.php';
require_once $includes_path . 'sidebar.php';
?>

<div class="erp-main">
  <?php require_once $includes_path . 'topbar.php'; ?>

  <div class="erp-page-header">
    <div class="erp-page-title-group">
      <div class="erp-breadcrumb">
        <a href="<?= $root_path ?>dashboard.php">Home</a>
        <i class="bi bi-chevron-right"></i>
        <span>Projects Directory</span>
      </div>
      <h1>Construction Projects Directory</h1>
      <p class="erp-page-desc">Centralized registry of all ongoing EPC contracts, commercial towers, infrastructure and industrial developments.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
      <a href="project-create.php" class="btn btn-erp-primary">
        <i class="bi bi-plus-circle"></i> Onboard New Project
      </a>
      <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('project-table', 'BuildPro_Project_Directory')">
        <i class="bi bi-download"></i> Export CSV
      </button>
      <button type="button" class="btn btn-erp-outline" onclick="window.print()">
        <i class="bi bi-printer"></i> Print
      </button>
    </div>
  </div>

  <main class="erp-content">
    <!-- KPI Cards -->
    <div class="row g-3 mb-4">
      <div class="col-sm-6 col-lg-3">
        <div class="erp-stat-card">
          <div>
            <div class="erp-stat-title">Total Active Projects</div>
            <div class="erp-stat-value">4 Contracts</div>
            <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> All On Schedule</div>
          </div>
          <div class="erp-stat-icon primary"><i class="bi bi-buildings"></i></div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="erp-stat-card">
          <div>
            <div class="erp-stat-title">Aggregate Contract Sum</div>
            <div class="erp-stat-value">₹ 806.25 Cr</div>
            <div class="erp-stat-trend trend-up"><i class="bi bi-cash-stack"></i> Backlog Orderbook</div>
          </div>
          <div class="erp-stat-icon orange"><i class="bi bi-currency-rupee"></i></div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="erp-stat-card">
          <div>
            <div class="erp-stat-title">Cumulative Spend</div>
            <div class="erp-stat-value">₹ 430.30 Cr</div>
            <div class="erp-stat-trend trend-neutral"><i class="bi bi-graph-up"></i> 53.4% Expended</div>
          </div>
          <div class="erp-stat-icon purple"><i class="bi bi-pie-chart"></i></div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="erp-stat-card">
          <div>
            <div class="erp-stat-title">Active Field Workers</div>
            <div class="erp-stat-value">1,397 Labour</div>
            <div class="erp-stat-trend trend-up"><i class="bi bi-people"></i> Across 15 Site Wings</div>
          </div>
          <div class="erp-stat-icon green"><i class="bi bi-person-walking"></i></div>
        </div>
      </div>
    </div>

    <!-- Filter Toolbar -->
    <div class="erp-toolbar">
      <div class="erp-toolbar-filters">
        <div class="input-group input-group-sm" style="width: 280px;">
          <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
          <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search project name, client, code...">
        </div>
        <select class="form-select form-select-sm" id="table-status-filter" style="width: 160px;">
          <option value="all">All Statuses</option>
          <option value="active">Active</option>
          <option value="in-progress">In-Progress</option>
        </select>
      </div>
    </div>

    <!-- Projects Table -->
    <div class="erp-table-responsive shadow-sm">
      <table class="table erp-table mb-0" id="project-table">
        <thead>
          <tr>
            <th>Code</th>
            <th>Project Name &amp; Sector</th>
            <th>Client / Developer</th>
            <th>Location</th>
            <th>Contract Value</th>
            <th>Progress %</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($erp_projects as $p): ?>
            <tr>
              <td class="fw-bold text-primary"><?= $p['id'] ?></td>
              <td>
                <a href="project-details.php?id=<?= $p['id'] ?>" class="text-decoration-none fw-bold text-dark"><?= htmlspecialchars($p['name']) ?></a>
                <div class="small text-muted"><?= htmlspecialchars($p['type']) ?></div>
              </td>
              <td><?= htmlspecialchars($p['client']) ?></td>
              <td><?= htmlspecialchars($p['location']) ?></td>
              <td class="fw-bold text-dark"><?= $p['value'] ?></td>
              <td style="min-width: 130px;">
                <div class="d-flex justify-content-between small fw-semibold mb-1">
                  <span><?= $p['progress'] ?>%</span>
                  <span class="text-success">On Schedule</span>
                </div>
                <div class="erp-progress"><div class="erp-progress-bar bg-success" style="width: <?= $p['progress'] ?>%;"></div></div>
              </td>
              <td><span class="badge-status active">Active</span></td>
              <td class="text-end">
                <a href="project-details.php?id=<?= $p['id'] ?>" class="btn-action-sm view" title="View 360 Details"><i class="bi bi-eye"></i></a>
                <a href="project-create.php?edit=<?= $p['id'] ?>" class="btn-action-sm edit" title="Edit Specs"><i class="bi bi-pencil"></i></a>
                <button type="button" class="btn-action-sm delete" title="Delete" onclick="BuildProApp.confirmDelete('<?= $p['id'] ?>')"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

<?php require_once $includes_path . 'footer.php'; ?>
