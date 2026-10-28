<?php
$page_title = "Estimation &amp; Tender Management";
$active_page = "estimation-tender";
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
            <span>Commercial &amp; Estimation</span>
            <i class="bi bi-chevron-right"></i>
            <span>Tender Management</span>
          </div>
          <h1>Estimation &amp; Tender Bid Management</h1>
          <p class="erp-page-desc">Track bid submissions, Earnest Money Deposits (EMD), rate analysis, win-loss probabilities and pre-bid queries.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#newTenderModal">
            <i class="bi bi-plus-circle"></i> Create Tender Bid
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('tenders-table', 'BuildPro_Tenders_Registry')">
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
                <div class="erp-stat-title">Tender Bid Pipeline</div>
                <div class="erp-stat-value">â‚¹ 540.00 Cr</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-graph-up-arrow"></i> 4 Active Tenders</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-briefcase"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Committed EMD Guarantees</div>
                <div class="erp-stat-value">â‚¹ 6.45 Cr</div>
                <div class="erp-stat-trend trend-neutral"><i class="bi bi-shield-check"></i> Bank Guarantee / FDR</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-bank"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Tender Success Rate</div>
                <div class="erp-stat-value">42.8%</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-trophy"></i> L1 in 3 of 7 bids</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-trophy"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Average Gross Margin Bid</div>
                <div class="erp-stat-value">14.8%</div>
                <div class="erp-stat-trend trend-neutral"><i class="bi bi-percent"></i> Internal Rate Analysis</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-calculator"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search tender ref, client, scope...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Tenders</option>
              <option value="Submitted">Submitted Bids</option>
              <option value="L1">L1 Lowest Bidder</option>
              <option value="Awarded">Awarded Contract</option>
              <option value="Evaluation">Under Evaluation</option>
            </select>
          </div>
        </div>

        <!-- Tenders Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="tenders-table">
            <thead>
              <tr>
                <th>Tender Reference</th>
                <th>Project Scope &amp; Authority</th>
                <th>Client Type</th>
                <th>Estimated Cost</th>
                <th>Quoted Bid Amount</th>
                <th>EMD Amount</th>
                <th>Submission Date</th>
                <th>Bid Margin</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">TND-2024-041</td>
                <td>
                  <div class="fw-bold text-dark">Metro Rail Elevated Viaduct Package EV-04 (8.2 km)</div>
                  <div class="small text-muted">Bengaluru Metro Rail Corporation (BMRCL)</div>
                </td>
                <td>Govt. PSU Infrastructure</td>
                <td>â‚¹ 260.00 Cr</td>
                <td class="fw-bold text-dark">â‚¹ 248.50 Cr</td>
                <td>â‚¹ 2.50 Cr</td>
                <td>14-Oct-2024</td>
                <td><span class="badge bg-success-subtle text-success">14.2%</span></td>
                <td><span class="badge bg-warning text-dark">L1 Shortlisted</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('TND-2024-041 : BMRCL Viaduct', {'Authority': 'BMRCL', 'Quoted': 'â‚¹ 248.50 Cr', 'EMD': 'â‚¹ 2.50 Cr', 'Status': 'L1 Shortlisted'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit tender bid', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">TND-2024-042</td>
                <td>
                  <div class="fw-bold text-dark">Godrej Horizon Luxury Residential Towers (3 Towers, G+35)</div>
                  <div class="small text-muted">Godrej Properties Ltd., Wadala, Mumbai</div>
                </td>
                <td>Private Tier-1 Developer</td>
                <td>â‚¹ 190.00 Cr</td>
                <td class="fw-bold text-dark">â‚¹ 182.20 Cr</td>
                <td>â‚¹ 1.80 Cr</td>
                <td>20-Oct-2024</td>
                <td><span class="badge bg-success-subtle text-success">15.5%</span></td>
                <td><span class="badge bg-info text-dark">Under Evaluation</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('TND-2024-042 : Godrej Horizon', {'Quoted': 'â‚¹ 182.20 Cr', 'Client': 'Godrej Properties'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit tender bid', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">TND-2024-043</td>
                <td>
                  <div class="fw-bold text-dark">Amazon Mega Fulfillment Center Grade-A Warehouse (11 Lakh Sq.ft)</div>
                  <div class="small text-muted">ESR Logistics Developers, Bhiwandi, MH</div>
                </td>
                <td>Industrial PEB</td>
                <td>â‚¹ 110.00 Cr</td>
                <td class="fw-bold text-dark">â‚¹ 104.50 Cr</td>
                <td>â‚¹ 1.05 Cr</td>
                <td>24-Oct-2024</td>
                <td><span class="badge bg-success-subtle text-success">13.8%</span></td>
                <td><span class="badge bg-primary">Submitted</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('TND-2024-043 : Amazon Bhiwandi', {'Quoted': 'â‚¹ 104.50 Cr', 'Client': 'ESR Logistics'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit tender bid', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- New Tender Modal -->
      <div class="modal fade" id="newTenderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-calculator text-primary me-2"></i>Create New Tender Estimate &amp; Bid</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="newTenderForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label class="form-label">Tender Notice Ref <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="TND-2024-044" required>
                  </div>
                  <div class="col-md-8">
                    <label class="form-label">Project Scope Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Construction of Multi-Specialty Hospital" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Client / Tendering Authority</label>
                    <input type="text" class="form-control" placeholder="Client Name" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Sector</label>
                    <select class="form-select">
                      <option>High-Rise Residential</option>
                      <option>Commercial IT Offices</option>
                      <option>Industrial Warehouse</option>
                      <option>Highway &amp; Bridges</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Client Estimated Cost (â‚¹)</label>
                    <input type="number" class="form-control" placeholder="150000000">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Internal Quoted Bid Amount (â‚¹) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="142000000" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">EMD Amount (â‚¹)</label>
                    <input type="number" class="form-control" placeholder="1500000">
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Save Tender Bid</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('newTenderForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('newTenderModal')).hide();
      BuildProApp.showToast('Tender bid recorded in estimation pipeline!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
