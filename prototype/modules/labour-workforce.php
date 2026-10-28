<?php
$page_title = "Labour &amp; Workforce Management";
$active_page = "labour-workforce";
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
            <span>Workforce &amp; Subcontractors</span>
            <i class="bi bi-chevron-right"></i>
            <span>Muster Roll</span>
          </div>
          <h1>Labour Muster Roll &amp; Daily Workforce Management</h1>
          <p class="erp-page-desc">Daily field headcount, trade muster (masons, bar benders, carpenters), biometric sync, overtime hours and wage disbursements.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#markAttendanceModal">
            <i class="bi bi-calendar-check"></i> Record Daily Muster
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('labour-table', 'BuildPro_Labour_Muster')">
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
                <div class="erp-stat-title">Today's Headcount</div>
                <div class="erp-stat-value">1,397 Labour</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> 98.4% Muster Present</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-people"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Skilled Tradesmen</div>
                <div class="erp-stat-value">720 Workers</div>
                <div class="erp-stat-trend trend-neutral">Bar Benders, Masons, Carpenters</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-tools"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Overtime Logged Today</div>
                <div class="erp-stat-value">480 OT Hours</div>
                <div class="erp-stat-trend trend-neutral">Evening Slab Pouring Shift</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-clock-history"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Daily Wage Liability</div>
                <div class="erp-stat-value">â‚¹ 11.24 Lakh</div>
                <div class="erp-stat-trend trend-up">Weekly Disbursed via Bank</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-cash-stack"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search worker code, name, trade...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Trades</option>
              <option value="Bar Bender">Bar Bender (Rebar)</option>
              <option value="Mason">Mason (Civil)</option>
              <option value="Carpenter">Shuttering Carpenter</option>
              <option value="Welder">Structural Welder</option>
              <option value="Helper">General Helper</option>
            </select>
          </div>
          <div class="erp-toolbar-actions">
            <button class="btn btn-sm btn-outline-primary" onclick="BuildProApp.showToast('Biometric attendance synced for all 15 sites!', 'success')">
              <i class="bi bi-fingerprint me-1"></i> Sync Biometric Machine
            </button>
          </div>
        </div>

        <!-- Muster Roll Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="labour-table">
            <thead>
              <tr>
                <th>Worker ID</th>
                <th>Worker Name &amp; Aadhaar Ref</th>
                <th>Trade Category</th>
                <th>Contractor / Agency</th>
                <th>Site Deployment</th>
                <th>Attendance</th>
                <th>Overtime (OT)</th>
                <th>Daily Rate (â‚¹)</th>
                <th>Today's Earning</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">LBR-2024-001</td>
                <td>
                  <div class="fw-bold text-dark">Ramlal Bihari</div>
                  <div class="small text-muted">Aadhaar: XXXX-XXXX-4819</div>
                </td>
                <td><span class="badge bg-primary-subtle text-primary">Bar Bender (Skilled)</span></td>
                <td>Shree Balaji Labour Works</td>
                <td>Skylark Heights (Tower 1)</td>
                <td><span class="badge bg-success-subtle text-success">Present (Full Day)</span></td>
                <td>2.0 hrs</td>
                <td>â‚¹ 850</td>
                <td class="fw-bold text-dark">â‚¹ 1,062</td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Ramlal Bihari', {'Trade': 'Bar Bender', 'Agency': 'Shree Balaji', 'Rate': 'â‚¹ 850/day', 'Wage Today': 'â‚¹ 1,062'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">LBR-2024-002</td>
                <td>
                  <div class="fw-bold text-dark">Dinesh Mahato</div>
                  <div class="small text-muted">Aadhaar: XXXX-XXXX-9182</div>
                </td>
                <td><span class="badge bg-warning-subtle text-warning">Shuttering Carpenter</span></td>
                <td>Modern Formwork Agency</td>
                <td>Skylark Heights (Tower 2)</td>
                <td><span class="badge bg-success-subtle text-success">Present (Full Day)</span></td>
                <td>3.0 hrs</td>
                <td>â‚¹ 900</td>
                <td class="fw-bold text-dark">â‚¹ 1,237</td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Dinesh Mahato', {'Trade': 'Carpenter', 'Wage': 'â‚¹ 1,237'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">LBR-2024-003</td>
                <td>
                  <div class="fw-bold text-dark">Santosh Gond</div>
                  <div class="small text-muted">Aadhaar: XXXX-XXXX-2194</div>
                </td>
                <td><span class="badge bg-info-subtle text-info">Mason (Block &amp; Plaster)</span></td>
                <td>Direct Company Muster</td>
                <td>CyberTower B (Bengaluru)</td>
                <td><span class="badge bg-success-subtle text-success">Present (Full Day)</span></td>
                <td>0.0 hrs</td>
                <td>â‚¹ 800</td>
                <td class="fw-bold text-dark">â‚¹ 800</td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Santosh Gond', {'Trade': 'Mason', 'Wage': 'â‚¹ 800'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">LBR-2024-004</td>
                <td>
                  <div class="fw-bold text-dark">Bablu Kumar</div>
                  <div class="small text-muted">Aadhaar: XXXX-XXXX-7128</div>
                </td>
                <td><span class="badge bg-secondary-subtle text-secondary">General Helper (Unskilled)</span></td>
                <td>Gujarat Infra Labour Hub</td>
                <td>NH48 Expressway (Vadodara)</td>
                <td><span class="badge bg-success-subtle text-success">Present (Full Day)</span></td>
                <td>1.0 hrs</td>
                <td>â‚¹ 650</td>
                <td class="fw-bold text-dark">â‚¹ 731</td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Bablu Kumar', {'Trade': 'Helper', 'Wage': 'â‚¹ 731'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Record Daily Muster Modal -->
      <div class="modal fade" id="markAttendanceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-calendar-check text-primary me-2"></i>Record Site Labour Attendance</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="markAttendanceForm">
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Site Wing / Project <span class="text-danger">*</span></label>
                  <select class="form-select" required>
                    <option>Skylark Heights - Tower 1 &amp; 2</option>
                    <option>CyberTower B - Core Zone</option>
                    <option>LogisticHub Pune - PEB Shed</option>
                    <option>NH48 Expressway - Pier 12 to 18</option>
                  </select>
                </div>
                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label class="form-label">Total Present Labour</label>
                    <input type="number" class="form-control" value="285" required>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Total Overtime Hours</label>
                    <input type="number" class="form-control" value="48" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Reporting Site Supervisor</label>
                  <input type="text" class="form-control" value="Mahesh Kadam (Resident Engineer)">
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Submit Daily Muster</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('markAttendanceForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('markAttendanceModal')).hide();
      BuildProApp.showToast('Daily labour muster verified and committed!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
