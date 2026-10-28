<?php
$page_title = "HR &amp; Staff Payroll";
$active_page = "hr-payroll";
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
            <span>Corporate &amp; Staff</span>
            <i class="bi bi-chevron-right"></i>
            <span>HR &amp; Payroll</span>
          </div>
          <h1>Human Resources (HR) &amp; Engineering Staff Payroll</h1>
          <p class="erp-page-desc">Manage site engineers, project managers, statutory PF / ESI / Professional Tax compliance, leaves and monthly salary processing.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#processPayrollModal">
            <i class="bi bi-cash-stack"></i> Process Monthly Payroll
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('payroll-table', 'BuildPro_Staff_Payroll')">
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
                <div class="erp-stat-title">Corporate &amp; Site Staff</div>
                <div class="erp-stat-value">64 Engineers</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-people"></i> Across 4 State Regions</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-person-lines-fill"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Monthly Payroll Outflow</div>
                <div class="erp-stat-value">â‚¹ 58.40 Lakh</div>
                <div class="erp-stat-trend trend-neutral"><i class="bi bi-bank"></i> Disbursed on 1st of Month</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-cash-coin"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">PF / ESI Compliance</div>
                <div class="erp-stat-value">100% Filed</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-patch-check"></i> ECR Electronic Challan Return</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-shield-check"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Field Site Allowance Pool</div>
                <div class="erp-stat-value">â‚¹ 8.20 Lakh</div>
                <div class="erp-stat-trend trend-neutral">Accommodation &amp; Travel</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-house"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search staff name, EMP code, project...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Departments</option>
              <option value="Project Management">Project Management</option>
              <option value="Billing">Billing &amp; QS</option>
              <option value="QA/QC">QA/QC Quality</option>
              <option value="Safety">Safety HSE</option>
            </select>
          </div>
        </div>

        <!-- Payroll Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="payroll-table">
            <thead>
              <tr>
                <th>Emp Code &amp; Name</th>
                <th>Designation &amp; Dept</th>
                <th>Project Deployment</th>
                <th>Gross CTC (â‚¹/mo)</th>
                <th>Basic + HRA</th>
                <th>Provident Fund (PF)</th>
                <th>Prof. Tax (PT)</th>
                <th>Net Payable (â‚¹)</th>
                <th>Bank Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">
                  <div class="text-dark">Rajeshwar Rao</div>
                  <div class="small text-muted">EMP-2020-045</div>
                </td>
                <td>
                  <div class="fw-semibold">Sr. Vice President (Civil)</div>
                  <div class="small text-muted">Project Management</div>
                </td>
                <td>Skylark Heights, Worli</td>
                <td class="fw-bold text-dark">â‚¹ 2,75,000</td>
                <td>â‚¹ 2,20,000</td>
                <td>- â‚¹ 1,800</td>
                <td>- â‚¹ 200</td>
                <td class="fw-bold text-success">â‚¹ 2,38,500</td>
                <td><span class="badge-status active">Bank Processed</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Rajeshwar Rao - Salary Slip', {'Gross': 'â‚¹ 2,75,000', 'Net Salary': 'â‚¹ 2,38,500', 'Bank': 'HDFC Sal A/c'})"><i class="bi bi-file-earmark-text"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">
                  <div class="text-dark">Manoj V. Sharma</div>
                  <div class="small text-muted">EMP-2021-089</div>
                </td>
                <td>
                  <div class="fw-semibold">Chief Billing &amp; QS Engineer</div>
                  <div class="small text-muted">Commercial Department</div>
                </td>
                <td>Skylark &amp; CyberTower B</td>
                <td class="fw-bold text-dark">â‚¹ 1,45,000</td>
                <td>â‚¹ 1,16,000</td>
                <td>- â‚¹ 1,800</td>
                <td>- â‚¹ 200</td>
                <td class="fw-bold text-success">â‚¹ 1,28,400</td>
                <td><span class="badge-status active">Bank Processed</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Manoj Sharma - Salary Slip', {'Net': 'â‚¹ 1,28,400'})"><i class="bi bi-file-earmark-text"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">
                  <div class="text-dark">Arjun Rawat</div>
                  <div class="small text-muted">EMP-2022-114</div>
                </td>
                <td>
                  <div class="fw-semibold">HSE Safety Lead Officer</div>
                  <div class="small text-muted">Safety &amp; Compliance</div>
                </td>
                <td>NH48 Expressway (Gujarat)</td>
                <td class="fw-bold text-dark">â‚¹ 95,000</td>
                <td>â‚¹ 76,000</td>
                <td>- â‚¹ 1,800</td>
                <td>- â‚¹ 200</td>
                <td class="fw-bold text-success">â‚¹ 84,200</td>
                <td><span class="badge-status active">Bank Processed</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Arjun Rawat - Salary Slip', {'Net': 'â‚¹ 84,200'})"><i class="bi bi-file-earmark-text"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">
                  <div class="text-dark">Mahesh Kadam</div>
                  <div class="small text-muted">EMP-2023-182</div>
                </td>
                <td>
                  <div class="fw-semibold">Senior Resident Civil Engineer</div>
                  <div class="small text-muted">Site Operations</div>
                </td>
                <td>Skylark Heights (Tower 1)</td>
                <td class="fw-bold text-dark">â‚¹ 82,000</td>
                <td>â‚¹ 65,600</td>
                <td>- â‚¹ 1,800</td>
                <td>- â‚¹ 200</td>
                <td class="fw-bold text-success">â‚¹ 72,800</td>
                <td><span class="badge-status active">Bank Processed</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Mahesh Kadam - Salary Slip', {'Net': 'â‚¹ 72,800'})"><i class="bi bi-file-earmark-text"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Process Monthly Payroll Modal -->
      <div class="modal fade" id="processPayrollModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-cash-stack text-primary me-2"></i>Process Engineering Staff Payroll</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="processPayrollForm">
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Salary Month / Cycle</label>
                  <select class="form-select">
                    <option selected>October 2024 (Active Cycle)</option>
                    <option>September 2024 (Closed)</option>
                  </select>
                </div>
                <div class="border rounded p-3 bg-light mb-3">
                  <div class="d-flex justify-content-between small mb-1">
                    <span>Total Staff on Roll:</span>
                    <strong>64 Employees</strong>
                  </div>
                  <div class="d-flex justify-content-between small mb-1">
                    <span>Gross Salary Sum:</span>
                    <strong>â‚¹ 58,40,000</strong>
                  </div>
                  <div class="d-flex justify-content-between small mb-1">
                    <span>Statutory PF &amp; PT:</span>
                    <strong>â‚¹ 1,28,000</strong>
                  </div>
                  <hr class="my-2">
                  <div class="d-flex justify-content-between small fw-bold text-success">
                    <span>Net Bank Disbursable:</span>
                    <span>â‚¹ 57,12,000</span>
                  </div>
                </div>
                <div class="mb-2">
                  <label class="form-label">Disbursement Bank Account</label>
                  <input type="text" class="form-control" value="HDFC Bank BKC Operations Pool (Balance: â‚¹ 28.45 Cr)" readonly>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Authorize &amp; Generate Bank File</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('processPayrollForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('processPayrollModal')).hide();
      BuildProApp.showToast('Monthly engineering staff payroll authorized and corporate salary files released!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
