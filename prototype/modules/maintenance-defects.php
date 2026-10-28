<?php
$page_title = "Maintenance &amp; Defects (DLP)";
$active_page = "maintenance-defects";
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
            <span>Quality &amp; Maintenance</span>
            <i class="bi bi-chevron-right"></i>
            <span>Defect Liability (DLP)</span>
          </div>
          <h1>Defect Liability Period (DLP) &amp; Pre-Handover Snagging</h1>
          <p class="erp-page-desc">Track client snag list punch items, warranty liability periods, subcontractor rectification signoffs and final retention releases.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#newSnagModal">
            <i class="bi bi-plus-circle"></i> Log Snag Item
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('defects-table', 'BuildPro_DLP_Snag_List')">
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
                <div class="erp-stat-title">Active Snag Items</div>
                <div class="erp-stat-value">12 Snags</div>
                <div class="erp-stat-trend trend-neutral">LogisticHub Handover Stage</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-exclamation-triangle"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Rectified &amp; Signed Off</div>
                <div class="erp-stat-value">184 Snags</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> 93.8% Resolution Rate</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-check2-circle"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">DLP Warranty Coverage</div>
                <div class="erp-stat-value">24 Months</div>
                <div class="erp-stat-trend trend-neutral">Structural &amp; Waterproofing</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-shield-check"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Linked Retention Pool</div>
                <div class="erp-stat-value">â‚¹ 6.42 Cr</div>
                <div class="erp-stat-trend trend-neutral">Withheld till DLP Clearance</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-lock"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search snag code, location, contractor...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Snags</option>
              <option value="Open">Open Punch Item</option>
              <option value="In-Progress">Rectification In-Progress</option>
              <option value="Closed">Closed &amp; Certified</option>
            </select>
          </div>
        </div>

        <!-- Snag List Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="defects-table">
            <thead>
              <tr>
                <th>Snag ID</th>
                <th>Project &amp; Specific Location</th>
                <th>Defect Description</th>
                <th>Severity</th>
                <th>Responsible Subcontractor</th>
                <th>Target Rectification Date</th>
                <th>Client Signoff</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">SNG-2024-041</td>
                <td>
                  <div class="fw-bold text-dark">LogisticHub Pune</div>
                  <div class="small text-muted">Loading Dock Bay 4 &amp; 5</div>
                </td>
                <td>Expansion joint sealant gap needs elastomeric re-grouting.</td>
                <td><span class="badge bg-warning text-dark">Medium</span></td>
                <td>Apex Flooring Technologies</td>
                <td class="small text-danger fw-bold">02-Nov-2024</td>
                <td>TransLogix PM In-Charge</td>
                <td><span class="badge bg-warning text-dark">Rectification In-Progress</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('SNG-2024-041 Bay 4 Sealant', {'Location': 'Dock Bay 4', 'Defect': 'Expansion joint sealant', 'Subcontractor': 'Apex Flooring'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Signoff snag rectification', 'info')"><i class="bi bi-check-lg"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">SNG-2024-040</td>
                <td>
                  <div class="fw-bold text-dark">Skylark Heights</div>
                  <div class="small text-muted">Tower 1 - Flat 1802 Balcony</div>
                </td>
                <td>External UPVC sliding door track drainage weep-hole blocked.</td>
                <td><span class="badge bg-info-subtle text-info">Low Snag</span></td>
                <td>Skyline Glazing &amp; Facades</td>
                <td class="small text-muted">26-Oct-2024</td>
                <td>Prestige Urban Engineer</td>
                <td><span class="badge-status active">Closed &amp; Certified</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('SNG-2024-040 Balcony UPVC', {'Status': 'Closed & Certified'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">SNG-2024-039</td>
                <td>
                  <div class="fw-bold text-dark">CyberTower B</div>
                  <div class="small text-muted">10th Floor AHU Plant Room</div>
                </td>
                <td>Vibration isolator spring mounting adjustment for fan blower.</td>
                <td><span class="badge bg-warning text-dark">Medium</span></td>
                <td>Sterling HVAC MEP Services</td>
                <td class="small text-muted">22-Oct-2024</td>
                <td>Nexus PMC Inspector</td>
                <td><span class="badge-status active">Closed &amp; Certified</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('SNG-2024-039 AHU Room', {'Status': 'Closed'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Add Snag Modal -->
      <div class="modal fade" id="newSnagModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-exclamation-triangle text-primary me-2"></i>Log Pre-Handover Punch / Snag Item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="newSnagForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label class="form-label">Snag ID</label>
                    <input type="text" class="form-control" value="SNG-2024-042" readonly>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Project / Site <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Skylark Heights, Worli</option>
                      <option>CyberTower B, Bengaluru</option>
                      <option selected>LogisticHub Pune</option>
                      <option>NH48 Expressway</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Severity Level</label>
                    <select class="form-select">
                      <option>Low (Cosmetic / Touch-up)</option>
                      <option selected>Medium (Operational adjustment)</option>
                      <option>High (Must rectify prior to OC)</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Exact Room / Location <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Tower 2 12th Floor Lift Lobby" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Subcontractor Liable</label>
                    <input type="text" class="form-control" placeholder="Subcontractor name">
                  </div>

                  <div class="col-md-12">
                    <label class="form-label">Defect Technical Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="2" placeholder="Specify observations and required corrective action" required></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Commit Snag Ticket</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('newSnagForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('newSnagModal')).hide();
      BuildProApp.showToast('Snag item logged and assigned to subcontractor for rectification!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
