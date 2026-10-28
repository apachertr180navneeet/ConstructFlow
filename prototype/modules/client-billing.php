<?php
$page_title = "Client Billing &amp; Receivables";
$active_page = "client-billing";
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
            <span>Commercial &amp; Billing</span>
            <i class="bi bi-chevron-right"></i>
            <span>Client Invoices</span>
          </div>
          <h1>Client Billing, Running Account (RA) Bills &amp; Receivables</h1>
          <p class="erp-page-desc">Track Joint Measurement Sheet (JMS) certifications, GST tax invoicing, mobilization advance amortization, and aging collections.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#createRABillModal">
            <i class="bi bi-receipt-cutoff"></i> Generate Client RA Bill
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('billing-table', 'BuildPro_Client_RA_Bills')">
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
                <div class="erp-stat-title">Cumulative Billed to Date</div>
                <div class="erp-stat-value">â‚¹ 482.40 Cr</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-graph-up-arrow"></i> 59.8% Portfolio Certified</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-receipt"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Accounts Receivable (AR)</div>
                <div class="erp-stat-value">â‚¹ 48.75 Cr</div>
                <div class="erp-stat-trend trend-down"><i class="bi bi-clock-history"></i> â‚¹ 18.20 Cr Due &lt; 15 Days</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-wallet2"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Collections Realized (MTD)</div>
                <div class="erp-stat-value">â‚¹ 62.10 Cr</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> RTGS / Escrow Clearance</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-cash-coin"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Client Retention Held</div>
                <div class="erp-stat-value">â‚¹ 24.12 Cr</div>
                <div class="erp-stat-trend trend-neutral"><i class="bi bi-shield-lock"></i> 5% Contractual Retention</div>
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
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search RA bill #, client, project...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Bill Statuses</option>
              <option value="Certified">Certified by Client PMC</option>
              <option value="Submitted">Submitted (Review)</option>
              <option value="Paid">Fully Received</option>
            </select>
          </div>
        </div>

        <!-- Client Invoices Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="billing-table">
            <thead>
              <tr>
                <th>Bill Reference No.</th>
                <th>Client / Developer Entity</th>
                <th>Project Name</th>
                <th>Gross Work Measured</th>
                <th>18% GST (â‚¹)</th>
                <th>Retention (5%)</th>
                <th>Mob Advance Recovery</th>
                <th>Net Certified Amount</th>
                <th>Payment Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">RA-SKL-008</td>
                <td>
                  <div class="fw-bold text-dark">Prestige Urban Realty Ltd.</div>
                  <div class="small text-muted">GSTIN: 27AAACP9921M1Z5</div>
                </td>
                <td>Skylark Heights, Worli</td>
                <td class="fw-bold text-dark">â‚¹ 14,80,00,000</td>
                <td>â‚¹ 2,66,40,000</td>
                <td>- â‚¹ 74,00,000</td>
                <td>- â‚¹ 1,48,00,000</td>
                <td class="fw-bold text-dark">â‚¹ 15,24,40,000</td>
                <td><span class="badge bg-warning text-dark">Certified (Due 05-Nov)</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('RA-SKL-008 Client Bill', {'Client': 'Prestige Urban', 'Gross': 'â‚¹ 14.80 Cr', 'Net Payable': 'â‚¹ 15.24 Cr', 'Status': 'Certified'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">RA-CYB-012</td>
                <td>
                  <div class="fw-bold text-dark">Nexus InfraTech Spaces</div>
                  <div class="small text-muted">GSTIN: 29AAACN8421K1Z2</div>
                </td>
                <td>CyberTower B, Bengaluru</td>
                <td class="fw-bold text-dark">â‚¹ 21,50,00,000</td>
                <td>â‚¹ 3,87,00,000</td>
                <td>- â‚¹ 1,07,50,000</td>
                <td>- â‚¹ 2,15,00,000</td>
                <td class="fw-bold text-dark">â‚¹ 22,14,50,000</td>
                <td><span class="badge-status active">Certified by PMC</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('RA-CYB-012 CyberTower', {'Gross': 'â‚¹ 21.50 Cr', 'Net': 'â‚¹ 22.14 Cr'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">RA-LOG-006</td>
                <td>
                  <div class="fw-bold text-dark">TransLogix Logistics Ltd.</div>
                  <div class="small text-muted">GSTIN: 27AAACT1192P1Z0</div>
                </td>
                <td>LogisticHub Pune</td>
                <td class="fw-bold text-dark">â‚¹ 8,40,00,000</td>
                <td>â‚¹ 1,51,20,000</td>
                <td>- â‚¹ 42,00,000</td>
                <td>- â‚¹ 84,00,000</td>
                <td class="fw-bold text-success">â‚¹ 8,65,20,000</td>
                <td><span class="badge-status completed">Paid / Cleared</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('RA-LOG-006 TransLogix', {'Status': 'Paid', 'Cleared': 'â‚¹ 8.65 Cr'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Create Client RA Bill Modal -->
      <div class="modal fade" id="createRABillModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-receipt-cutoff text-primary me-2"></i>Generate Client Running Account (RA) Bill</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createRABillForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label class="form-label">RA Invoice Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="RA-SKL-009" readonly>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Client Entity <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Prestige Urban Realty Ltd.</option>
                      <option>Nexus InfraTech Spaces</option>
                      <option>TransLogix Logistics Ltd.</option>
                      <option>NHAI (Govt. of India)</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Project</label>
                    <input type="text" class="form-control" value="PRJ-2024-001 : Skylark Heights" readonly>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Current Measured Work (â‚¹) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="125000000" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">GST Rate</label>
                    <select class="form-select">
                      <option selected>18% GST (Works Contract)</option>
                      <option>12% GST</option>
                      <option>5% GST</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Contractual Retention</label>
                    <input type="text" class="form-control" value="5% (Deducted)" readonly>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Submit Bill to Client PMC</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('createRABillForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('createRABillModal')).hide();
      BuildProApp.showToast('Client Running Account bill submitted for PMC joint measurement certificate!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
