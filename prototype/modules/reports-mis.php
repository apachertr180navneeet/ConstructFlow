<?php
$page_title = "Reports &amp; MIS Analytics";
$active_page = "reports-mis";
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
            <span>Management Information System</span>
          </div>
          <h1>Executive Reports &amp; Management Information System (MIS)</h1>
          <p class="erp-page-desc">Pre-configured operational reports, monthly project review (MPR) dossiers, material consumption variance and cash flow projections.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" onclick="BuildProApp.showToast('Compiling comprehensive MPR portfolio deck (PDF)...', 'success')">
            <i class="bi bi-file-earmark-pdf"></i> Generate Full Monthly Dossier
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="window.print()">
            <i class="bi bi-printer"></i>
          </button>
        </div>
      </div>

      <main class="erp-content">
        <!-- Report Categories Catalog -->
        <div class="row g-3 mb-4">
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="p-2 bg-primary-subtle text-primary rounded"><i class="bi bi-bar-chart-line fs-4"></i></div>
                <span class="badge bg-primary">Executive</span>
              </div>
              <h5 class="h6 fw-bold text-dark">Monthly Project Review (MPR)</h5>
              <p class="small text-muted mb-3">Consolidated executive performance pack: physical progress, billing vs spend, major milestones &amp; critical issues.</p>
              <div class="mt-auto d-flex gap-2">
                <button class="btn btn-sm btn-erp-outline w-100" onclick="BuildProApp.showToast('Downloading MPR Executive Deck (PDF)...', 'success')"><i class="bi bi-download me-1"></i> PDF Report</button>
                <button class="btn btn-sm btn-outline-secondary" onclick="BuildProApp.showToast('Exporting Excel Workbook...', 'info')"><i class="bi bi-file-earmark-excel"></i></button>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="p-2 bg-warning-subtle text-warning rounded"><i class="bi bi-boxes fs-4"></i></div>
                <span class="badge bg-warning text-dark">Stores &amp; QS</span>
              </div>
              <h5 class="h6 fw-bold text-dark">Material Consumption Variance</h5>
              <p class="small text-muted mb-3">Theoretical BOQ material consumption versus actual site store issue slips. Identifies wastage &amp; rebar scrap ratio.</p>
              <div class="mt-auto d-flex gap-2">
                <button class="btn btn-sm btn-erp-outline w-100" onclick="BuildProApp.showToast('Generating Material Reconciliation Report...', 'success')"><i class="bi bi-download me-1"></i> Excel XLS</button>
                <button class="btn btn-sm btn-outline-secondary" onclick="window.print()"><i class="bi bi-printer"></i></button>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="p-2 bg-success-subtle text-success rounded"><i class="bi bi-cash-stack fs-4"></i></div>
                <span class="badge bg-success">Commercial</span>
              </div>
              <h5 class="h6 fw-bold text-dark">Cash Flow &amp; Aging Receivables</h5>
              <p class="small text-muted mb-3">30/60/90 days client billing collection aging, supplier payables forecast, and bank escrow balances.</p>
              <div class="mt-auto d-flex gap-2">
                <button class="btn btn-sm btn-erp-outline w-100" onclick="BuildProApp.showToast('Generating Cash Flow Forecast Sheet...', 'success')"><i class="bi bi-download me-1"></i> Export Sheet</button>
                <button class="btn btn-sm btn-outline-secondary" onclick="window.print()"><i class="bi bi-printer"></i></button>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="p-2 bg-info-subtle text-info rounded"><i class="bi bi-people fs-4"></i></div>
                <span class="badge bg-info text-dark">Workforce</span>
              </div>
              <h5 class="h6 fw-bold text-dark">Labour Productivity &amp; Headcount</h5>
              <p class="small text-muted mb-3">Trades distribution, overtime hours analysis, subcontractor muster ratios and output per man-day benchmarks.</p>
              <div class="mt-auto d-flex gap-2">
                <button class="btn btn-sm btn-erp-outline w-100" onclick="BuildProApp.showToast('Generating Labour Productivity Metrics...', 'success')"><i class="bi bi-download me-1"></i> PDF Summary</button>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="p-2 bg-danger-subtle text-danger rounded"><i class="bi bi-shield-check fs-4"></i></div>
                <span class="badge bg-danger">HSE &amp; QA</span>
              </div>
              <h5 class="h6 fw-bold text-dark">HSE &amp; Quality Audit Register</h5>
              <p class="small text-muted mb-3">Safe man-hours without LTI milestones, open NCR snags, concrete cube 28-day compliance records.</p>
              <div class="mt-auto d-flex gap-2">
                <button class="btn btn-sm btn-erp-outline w-100" onclick="BuildProApp.showToast('Generating HSE & QA/QC Audit Register...', 'success')"><i class="bi bi-download me-1"></i> Audit Pack</button>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="p-2 bg-secondary-subtle text-secondary rounded"><i class="bi bi-tools fs-4"></i></div>
                <span class="badge bg-secondary">Plant &amp; Fleet</span>
              </div>
              <h5 class="h6 fw-bold text-dark">Equipment Utilization &amp; Fuel Log</h5>
              <p class="small text-muted mb-3">Running hours per machine, diesel consumption per Cum concrete, breakdown downtime and hire charges.</p>
              <div class="mt-auto d-flex gap-2">
                <button class="btn btn-sm btn-erp-outline w-100" onclick="BuildProApp.showToast('Generating Plant & Machinery Log...', 'success')"><i class="bi bi-download me-1"></i> Fleet Sheet</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Sample Report Preview -->
        <div class="erp-card">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-table text-primary"></i> Live Portfolio Progress &amp; Financial Summary (October 2024)</h5>
            <button class="btn btn-sm btn-erp-outline" onclick="BuildProApp.exportTableToCSV('mis-preview-table', 'BuildPro_Executive_MIS')"><i class="bi bi-download"></i> Export Table</button>
          </div>
          <div class="erp-card-body p-0">
            <div class="table-responsive">
              <table class="table erp-table mb-0" id="mis-preview-table">
                <thead>
                  <tr>
                    <th>Project ID &amp; Name</th>
                    <th>Contract Sum (â‚¹)</th>
                    <th>Certified Billed (â‚¹)</th>
                    <th>Expenditure (â‚¹)</th>
                    <th>Receivables Outstanding</th>
                    <th>Progress %</th>
                    <th>Schedule SPI</th>
                    <th>Cost CPI</th>
                    <th>Health Rating</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="fw-bold">PRJ-2024-001 Skylark Heights</td>
                    <td>â‚¹ 142.50 Cr</td>
                    <td>â‚¹ 108.60 Cr</td>
                    <td>â‚¹ 98.40 Cr</td>
                    <td class="text-danger fw-bold">â‚¹ 8.40 Cr</td>
                    <td>74.2%</td>
                    <td><span class="text-success fw-bold">1.02</span></td>
                    <td><span class="text-success fw-bold">1.04</span></td>
                    <td><span class="badge bg-success">Optimal</span></td>
                  </tr>
                  <tr>
                    <td class="fw-bold">PRJ-2024-002 CyberTower B</td>
                    <td>â‚¹ 210.00 Cr</td>
                    <td>â‚¹ 145.20 Cr</td>
                    <td>â‚¹ 135.20 Cr</td>
                    <td class="text-danger fw-bold">â‚¹ 14.20 Cr</td>
                    <td>64.0%</td>
                    <td><span class="text-success fw-bold">1.00</span></td>
                    <td><span class="text-success fw-bold">1.02</span></td>
                    <td><span class="badge bg-success">Optimal</span></td>
                  </tr>
                  <tr>
                    <td class="fw-bold">PRJ-2024-003 LogisticHub Pune</td>
                    <td>â‚¹ 68.75 Cr</td>
                    <td>â‚¹ 58.20 Cr</td>
                    <td>â‚¹ 54.10 Cr</td>
                    <td class="text-danger fw-bold">â‚¹ 4.15 Cr</td>
                    <td>88.0%</td>
                    <td><span class="text-warning fw-bold">0.98</span></td>
                    <td><span class="text-success fw-bold">1.01</span></td>
                    <td><span class="badge bg-primary">Normal</span></td>
                  </tr>
                  <tr>
                    <td class="fw-bold">PRJ-2024-004 NH48 Expressway</td>
                    <td>â‚¹ 385.00 Cr</td>
                    <td>â‚¹ 170.40 Cr</td>
                    <td>â‚¹ 142.60 Cr</td>
                    <td class="text-danger fw-bold">â‚¹ 22.00 Cr</td>
                    <td>38.0%</td>
                    <td><span class="text-success fw-bold">1.05</span></td>
                    <td><span class="text-success fw-bold">1.06</span></td>
                    <td><span class="badge bg-success">Optimal</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>

      



<?php require_once $includes_path . 'footer.php'; ?>
