<?php
/**
 * ============================================================================
 * BuildPro ERP - Starter Module Boilerplate Template
 * ============================================================================
 * Use this starter template to quickly build ANY new ERP module or feature page.
 * 
 * Instructions:
 * 1. Copy this file into your target directory (e.g., prototype/modules/new-feature.php).
 * 2. Set $page_title and $active_menu below.
 * 3. Update the sample table headers and rows with your module's data.
 * 4. Add your module link to prototype/includes/config.php in $navigation_groups.
 */

// Step 1: Page Configuration
$page_title = 'New Module Title';
$active_menu = 'new-module'; // Match code in config.php navigation

// Step 2: Include Core Architecture
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- ==========================================================================
     PAGE HEADER & BREADCRUMBS
     ========================================================================== -->
<div class="erp-page-header">
  <div class="erp-page-title-group">
    <div class="erp-breadcrumb">
      <a href="<?= $root_path ?>dashboard.php"><i class="bi bi-house-door me-1"></i>Dashboard</a>
      <i class="bi bi-chevron-right small text-muted"></i>
      <span>Operations</span>
      <i class="bi bi-chevron-right small text-muted"></i>
      <span class="text-dark fw-semibold"><?= htmlspecialchars($page_title) ?></span>
    </div>
    <h1><?= htmlspecialchars($page_title) ?></h1>
    <p class="erp-page-desc">Manage, track, and monitor operational records for project <strong><?= htmlspecialchars($current_project) ?></strong>.</p>
  </div>
  <div class="d-flex align-items-center gap-2">
    <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1" onclick="BuildProApp.exportTableToCSV('sample-module-table', 'module-export')">
      <i class="bi bi-download"></i> <span class="d-none d-md-inline">Export CSV</span>
    </button>
    <button type="button" class="btn btn-sm btn-erp-primary" data-bs-toggle="modal" data-bs-target="#createRecordModal">
      <i class="bi bi-plus-lg"></i> <span>Add New Record</span>
    </button>
  </div>
</div>

<!-- ==========================================================================
     MAIN CONTENT WRAPPER
     ========================================================================== -->
<div class="erp-content">

  <!-- ROW 1: KPI Stat Metrics -->
  <div class="row g-3 mb-4">
    <?= render_stat_card('Total Records', '142', 'Active in current FY', 'bi-folder-check', 'primary') ?>
    <?= render_stat_card('Total Value', '₹ 18.45 Cr', '+12.4% vs last quarter', 'bi-cash-stack', 'orange') ?>
    <?= render_stat_card('Pending Approval', '7 Items', 'Requires Director sign-off', 'bi-hourglass-split', 'warning') ?>
    <?= render_stat_card('Completed Tasks', '98.5%', 'On track with SLA', 'bi-check2-circle', 'success') ?>
  </div>

  <!-- ROW 2: Search & Filter Toolbar -->
  <div class="erp-toolbar">
    <div class="erp-toolbar-filters">
      <div class="input-group input-group-sm" style="min-width: 260px;">
        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
        <input type="text" class="form-control border-start-0" id="table-search-input" placeholder="Search records by code, title, party..." onkeyup="BuildProApp.initTableSearch('table-search-input', 'sample-module-table')">
      </div>
      <select class="form-select form-select-sm" style="width: auto;">
        <option selected value="">All Statuses</option>
        <option value="active">Active</option>
        <option value="pending">Pending</option>
        <option value="completed">Completed</option>
      </select>
    </div>
    <div class="erp-toolbar-actions">
      <span class="small text-muted me-2">Showing 4 sample records</span>
      <button class="btn btn-sm btn-outline-secondary" onclick="window.location.reload()"><i class="bi bi-arrow-clockwise"></i></button>
    </div>
  </div>

  <!-- ROW 3: Responsive Data Table -->
  <div class="erp-table-responsive shadow-sm">
    <table class="table erp-table mb-0" id="sample-module-table">
      <thead>
        <tr>
          <th>Reference #</th>
          <th>Description &amp; Scope</th>
          <th>Responsible Party</th>
          <th>Target Date</th>
          <th>Amount (₹)</th>
          <th>Status</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span class="fw-bold text-primary font-monospace">REC-2024-001</span></td>
          <td>
            <div class="fw-semibold text-dark">Foundation Raft Structural Casting</div>
            <div class="text-muted small">Wing A - Tower 1 Basement Level</div>
          </td>
          <td>Apex Construction Infra</td>
          <td>15-Nov-2024</td>
          <td class="fw-bold">₹ 42,50,000</td>
          <td><?= status_badge('active') ?></td>
          <td class="text-end">
            <button class="btn-action-sm view" title="View Details" onclick="viewSampleDetails('REC-2024-001', 'Foundation Raft Structural Casting', '₹ 42,50,000', 'Active')"><i class="bi bi-eye"></i></button>
            <button class="btn-action-sm edit" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="btn-action-sm delete" title="Delete" onclick="BuildProApp.confirmDelete('REC-2024-001')"><i class="bi bi-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="fw-bold text-primary font-monospace">REC-2024-002</span></td>
          <td>
            <div class="fw-semibold text-dark">Procurement of High-Grade Cement OPC 53</div>
            <div class="text-muted small">1,200 Bags delivery to CyberTower Store</div>
          </td>
          <td>UltraTech Cement Ltd.</td>
          <td>18-Nov-2024</td>
          <td class="fw-bold">₹ 5,16,000</td>
          <td><?= status_badge('pending') ?></td>
          <td class="text-end">
            <button class="btn-action-sm view" title="View Details" onclick="viewSampleDetails('REC-2024-002', 'Cement Procurement', '₹ 5,16,000', 'Pending')"><i class="bi bi-eye"></i></button>
            <button class="btn-action-sm edit" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="btn-action-sm delete" title="Delete" onclick="BuildProApp.confirmDelete('REC-2024-002')"><i class="bi bi-trash"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div><!-- /.erp-content -->

<!-- ==========================================================================
     MODALS
     ========================================================================== -->
<!-- Add / Create Record Modal -->
<div class="modal fade" id="createRecordModal" tabindex="-1" aria-labelledby="createRecordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRecordModalLabel"><i class="bi bi-plus-circle text-primary me-2"></i>Create New Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="event.preventDefault(); bootstrap.Modal.getInstance(document.getElementById('createRecordModal')).hide(); BuildProApp.showToast('New record created successfully!', 'success');">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Record Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="e.g. Concrete Pouring Batch #4" required>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label">Estimated Value (₹)</label>
              <input type="number" class="form-control" placeholder="500000">
            </div>
            <div class="col-6">
              <label class="form-label">Target Completion</label>
              <input type="date" class="form-control" value="<?= date('Y-m-d') ?>">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Remarks / Description</label>
            <textarea class="form-control" rows="3" placeholder="Enter notes or specifications..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-sm btn-erp-primary"><i class="bi bi-check-lg me-1"></i>Save Record</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function viewSampleDetails(code, title, amount, status) {
    var html = '<div class="p-2">' +
      '<div class="mb-3"><span class="badge bg-primary-subtle text-primary font-monospace">' + code + '</span></div>' +
      '<h5 class="fw-bold mb-2">' + title + '</h5>' +
      '<div class="row g-2 small border rounded p-3 bg-light my-3">' +
      '  <div class="col-6"><strong>Project:</strong> <?= htmlspecialchars($current_project) ?></div>' +
      '  <div class="col-6"><strong>Status:</strong> ' + status + '</div>' +
      '  <div class="col-6"><strong>Amount:</strong> ' + amount + '</div>' +
      '  <div class="col-6"><strong>PMC Verified:</strong> Yes</div>' +
      '</div>' +
      '</div>';
    BuildProApp.viewDetails('Record Details - ' + code, html);
  }
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
