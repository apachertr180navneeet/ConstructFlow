<?php
$page_title = "Approvals &amp; Workflow";
$active_page = "approvals-workflow";
require_once __DIR__ . '/../includes/config.php';
require_once $includes_path . 'header.php';
require_once $includes_path . 'sidebar.php';
?>

<div class="erp-main">
  <?php require_once $includes_path . 'topbar.php'; ?>



      <div class="erp-page-header">
        <div class="erp-page-title-group">
          <div class="erp-breadcrumb">
            <a href="../dashboard.php">Home</a>
            <i class="bi bi-chevron-right"></i>
            <span>Corporate &amp; System</span>
            <i class="bi bi-chevron-right"></i>
            <span>Approval Matrix</span>
          </div>
          <h1>Multi-Tier Approvals &amp; Governance Workflow</h1>
          <p class="erp-page-desc">Central governance inbox for high-value purchase orders, contractor RA bills, budget variation orders and site indents.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" onclick="BuildProApp.showToast('All pending requests in view approved!', 'success')">
            <i class="bi bi-check-all"></i> Batch Approve Eligible
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('approvals-table', 'BuildPro_Approval_Matrix')">
            <i class="bi bi-download"></i> Export CSV
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="window.print()">
            <i class="bi bi-printer"></i>
          </button>
        </div>
      </div>

      <main class="erp-content">
        <!-- 4 KPI Cards -->
        <div class="row g-3 mb-4">
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Pending In Your Inbox</div>
                <div class="erp-stat-value">5 Requests</div>
                <div class="erp-stat-trend trend-down"><i class="bi bi-clock-history"></i> â‚¹ 7.42 Cr Value Pending</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-inbox"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Average Approval TAT</div>
                <div class="erp-stat-value">4.2 Hours</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-speedometer2"></i> Target: &lt; 8 Hours</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-lightning-charge"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Approved (MTD)</div>
                <div class="erp-stat-value">148 Requests</div>
                <div class="erp-stat-trend trend-neutral">â‚¹ 68.90 Cr Authorized</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-check-circle"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Escalation Warnings</div>
                <div class="erp-stat-value">0 Escalations</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-shield-check"></i> Zero SLA Breaches</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-shield-check"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search request ref, requestor, scope...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Request Types</option>
              <option value="Purchase Order">Purchase Order (PO)</option>
              <option value="Contractor Bill">Contractor RA Bill</option>
              <option value="Variation">Variation Order (VO)</option>
              <option value="Indent">Material Indent</option>
            </select>
          </div>
        </div>

        <!-- Approvals Queue Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="approvals-table">
            <thead>
              <tr>
                <th>Request Ref</th>
                <th>Request Category</th>
                <th>Project Cost Center</th>
                <th>Subject / Description</th>
                <th>Initiated By</th>
                <th>Financial Impact</th>
                <th>Tier Hierarchy</th>
                <th>Queue Age</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">REQ-2024-419</td>
                <td><span class="badge bg-primary-subtle text-primary">Purchase Order (PO)</span></td>
                <td>Skylark Heights</td>
                <td>
                  <div class="fw-bold text-dark">Tata Steel 500 MT TMT Rebars (16mm/20mm)</div>
                  <div class="small text-muted">PO Ref: PO-2024-089</div>
                </td>
                <td>Vikas Jain (Procurement Lead)</td>
                <td class="fw-bold text-dark">â‚¹ 3,42,50,000</td>
                <td><span class="badge bg-danger text-white">Tier 3 (Director Signoff)</span></td>
                <td><span class="text-warning small fw-bold">1h 20m</span></td>
                <td><span class="badge bg-warning text-dark">Pending Your Approval</span></td>
                <td class="text-end">
                  <button type="button" class="btn btn-sm btn-success py-0 px-2" onclick="BuildProApp.showToast('PO-2024-089 approved successfully!', 'success')"><i class="bi bi-check-lg"></i> Approve</button>
                  <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2" onclick="BuildProApp.showToast('Request returned for commercial renegotiation', 'info')"><i class="bi bi-x"></i> Reject</button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">REQ-2024-418</td>
                <td><span class="badge bg-warning-subtle text-warning">Contractor RA Bill</span></td>
                <td>Skylark Heights</td>
                <td>
                  <div class="fw-bold text-dark">Modern Formwork LLP - RA Bill #04</div>
                  <div class="small text-muted">Bill Ref: CRA-2024-042</div>
                </td>
                <td>Manoj Sharma (QS Lead)</td>
                <td class="fw-bold text-dark">â‚¹ 44,82,600</td>
                <td><span class="badge bg-info text-dark">Tier 2 (Commercial GM)</span></td>
                <td><span class="text-muted small">3h 45m</span></td>
                <td><span class="badge bg-warning text-dark">Pending Your Approval</span></td>
                <td class="text-end">
                  <button type="button" class="btn btn-sm btn-success py-0 px-2" onclick="BuildProApp.showToast('Contractor RA bill approved for payment!', 'success')"><i class="bi bi-check-lg"></i> Approve</button>
                  <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2" onclick="BuildProApp.showToast('Bill returned to QS engineer', 'info')"><i class="bi bi-x"></i> Reject</button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">REQ-2024-417</td>
                <td><span class="badge bg-danger-subtle text-danger">Variation Order (VO)</span></td>
                <td>CyberTower B</td>
                <td>
                  <div class="fw-bold text-dark">High-Specification DGU Facade Acoustic Upgrade</div>
                  <div class="small text-muted">VO Ref: VO-CYB-008</div>
                </td>
                <td>Vikram Malhotra (PD)</td>
                <td class="fw-bold text-dark">â‚¹ 35,00,000</td>
                <td><span class="badge bg-danger text-white">Tier 3 (Director Signoff)</span></td>
                <td><span class="text-muted small">5h 10m</span></td>
                <td><span class="badge bg-warning text-dark">Pending Your Approval</span></td>
                <td class="text-end">
                  <button type="button" class="btn btn-sm btn-success py-0 px-2" onclick="BuildProApp.showToast('Variation order authorized!', 'success')"><i class="bi bi-check-lg"></i> Approve</button>
                  <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2" onclick="BuildProApp.showToast('Clarification requested', 'info')"><i class="bi bi-question"></i> Query</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      



<?php require_once $includes_path . 'footer.php'; ?>
