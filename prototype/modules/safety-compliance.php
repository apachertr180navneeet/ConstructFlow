<?php
$page_title = "Safety &amp; Compliance (HSE)";
$active_page = "safety-compliance";
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
            <span>Quality &amp; Safety</span>
            <i class="bi bi-chevron-right"></i>
            <span>HSE Compliance</span>
          </div>
          <h1>Health, Safety &amp; Environment (HSE) Management</h1>
          <p class="erp-page-desc">Track safe man-hours without Lost Time Injury (LTI), daily toolbox talks (TBT), PPE compliance audits and incident investigations.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#reportIncidentModal">
            <i class="bi bi-shield-plus"></i> Report Incident / Near-Miss
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('safety-table', 'BuildPro_HSE_Incident_Register')">
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
                <div class="erp-stat-title">Safe Man-Hours (LTI Free)</div>
                <div class="erp-stat-value">3.42 Million</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-shield-check"></i> 380 Consecutive Safe Days</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-shield-fill-check"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Toolbox Talks (TBT Today)</div>
                <div class="erp-stat-value">15 Sessions</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-megaphone"></i> 1,397 Labour Briefed</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-megaphone"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">PPE Compliance Audit</div>
                <div class="erp-stat-value">98.6%</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> Harness, Boots, Helmets</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-person-check"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Open Near-Miss Items</div>
                <div class="erp-stat-value">1 Near-Miss</div>
                <div class="erp-stat-trend trend-neutral">Scaffolding toe-board fixed</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-exclamation-octagon"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search safety report, type, site...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Incident Types</option>
              <option value="Near-Miss">Near-Miss Reporting</option>
              <option value="First Aid">First Aid Case</option>
              <option value="Environmental">Environmental Audit</option>
            </select>
          </div>
        </div>

        <!-- Safety Register Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="safety-table">
            <thead>
              <tr>
                <th>Incident Ref</th>
                <th>Date &amp; Time</th>
                <th>Site &amp; Location</th>
                <th>Incident Classification</th>
                <th>Hazard Description</th>
                <th>Root Cause Identified</th>
                <th>Immediate Corrective Action (CAPA)</th>
                <th>Investigating Officer</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">HSE-2024-038</td>
                <td>
                  <div class="fw-bold text-dark">26-Oct-2024, 03:15 PM</div>
                  <div class="small text-muted">Skylark Heights</div>
                </td>
                <td>Tower 1 (27th Floor Edge)</td>
                <td><span class="badge bg-warning text-dark">Near-Miss Hazard</span></td>
                <td>Plywood shuttering runner dropped onto safety net.</td>
                <td>Improper lashing during stripping.</td>
                <td>Toe boards installed; workers retrained on tethering.</td>
                <td>Arjun Rawat (HSE Lead)</td>
                <td><span class="badge-status completed">CAPA Implemented</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('HSE-2024-038 Near-Miss', {'Classification': 'Near-Miss', 'CAPA': 'Toe boards installed', 'Status': 'Closed'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">HSE-2024-037</td>
                <td>
                  <div class="fw-bold text-dark">20-Oct-2024, 11:20 AM</div>
                  <div class="small text-muted">NH48 Expressway</div>
                </td>
                <td>Pier 12 Rebar Fabrication Yard</td>
                <td><span class="badge bg-info-subtle text-info">Minor First-Aid</span></td>
                <td>Superficial finger abrasion while handling tie wire.</td>
                <td>Worn-out leather safety gloves.</td>
                <td>First-aid antiseptic dressing; new heavy gloves issued.</td>
                <td>K. B. Vaghela (Safety Insp)</td>
                <td><span class="badge-status completed">Resolved</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('HSE-2024-037 First-Aid', {'Worker': 'Ramlal (Treated)', 'CAPA': 'New gloves issued'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">HSE-2024-036</td>
                <td>
                  <div class="fw-bold text-dark">14-Oct-2024, 08:30 AM</div>
                  <div class="small text-muted">CyberTower B</div>
                </td>
                <td>Basement 2 Water Tank Pit</td>
                <td><span class="badge bg-success-subtle text-success">Toolbox Talk Audit</span></td>
                <td>Confined space entry pre-briefing &amp; gas testing.</td>
                <td>Oxygen levels 20.9% certified before entry.</td>
                <td>Exhaust blowers deployed with tripod rescue harness.</td>
                <td>N. Swaminathan (HSE)</td>
                <td><span class="badge-status active">Fully Compliant</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('HSE-2024-036 Confined Space', {'Gas Level': '20.9% Normal', 'Compliance': '100%'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Report Incident Modal -->
      <div class="modal fade" id="reportIncidentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-shield-plus text-danger me-2"></i>Report HSE Incident or Near-Miss</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="reportIncidentForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label class="form-label">Incident Serial</label>
                    <input type="text" class="form-control" value="HSE-2024-039" readonly>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Project / Site <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Skylark Heights, Worli</option>
                      <option>CyberTower B, Bengaluru</option>
                      <option>LogisticHub Pune</option>
                      <option>NH48 Expressway</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Classification Severity <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Near-Miss (No Injury / Property Damage)</option>
                      <option>Minor First Aid Case</option>
                      <option>Environmental Spill (Oil / Chemical)</option>
                      <option>Property / Equipment Damage</option>
                    </select>
                  </div>

                  <div class="col-md-12">
                    <label class="form-label">Incident Description &amp; Location <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="2" placeholder="Describe precisely what occurred, exact location and personnel involved" required></textarea>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Root Cause Analysis</label>
                    <input type="text" class="form-control" placeholder="Underlying unsafe act or condition">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Immediate Corrective Action (CAPA)</label>
                    <input type="text" class="form-control" placeholder="Action taken to eliminate hazard">
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger">Log HSE Incident &amp; Alert Officers</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('reportIncidentForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('reportIncidentModal')).hide();
      BuildProApp.showToast('HSE Incident reported, emergency broadcast sent to site officers!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
