<?php
$page_title = "Finance &amp; Accounting";
$active_page = "finance-accounting";
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
            <span>Finance &amp; Accounts</span>
            <i class="bi bi-chevron-right"></i>
            <span>General Ledger</span>
          </div>
          <h1>Finance, General Ledger &amp; Accounting Vouchers</h1>
          <p class="erp-page-desc">Chart of accounts, double-entry financial ledger, journal vouchers, bank reconciliation and cost center postings.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#createVoucherModal">
            <i class="bi bi-plus-circle"></i> New Journal Voucher
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('ledger-table', 'BuildPro_General_Ledger')">
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
                <div class="erp-stat-title">Cash &amp; Bank Liquidity</div>
                <div class="erp-stat-value">â‚¹ 28.45 Cr</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-bank"></i> HDFC Escrow &amp; ICICI Accounts</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-bank"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Active Bank Guarantees</div>
                <div class="erp-stat-value">â‚¹ 42.00 Cr</div>
                <div class="erp-stat-trend trend-neutral"><i class="bi bi-shield-check"></i> PBG &amp; Mobilization BGs</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-safe"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Gross Operating Margin</div>
                <div class="erp-stat-value">16.4%</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-arrow-up-right"></i> FY 24-25 YTD</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-graph-up"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">GST Output Liability</div>
                <div class="erp-stat-value">â‚¹ 4.18 Cr</div>
                <div class="erp-stat-trend trend-neutral">Net after GSTR-2B Input ITC</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-receipt"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search voucher #, account, narration...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Voucher Types</option>
              <option value="Payment">Payment Voucher (PV)</option>
              <option value="Receipt">Receipt Voucher (RV)</option>
              <option value="Journal">Journal Voucher (JV)</option>
            </select>
          </div>
        </div>

        <!-- General Ledger Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="ledger-table">
            <thead>
              <tr>
                <th>Voucher No.</th>
                <th>Posting Date</th>
                <th>Type</th>
                <th>Account Head &amp; Description</th>
                <th>Narration &amp; Reference</th>
                <th>Project Cost Center</th>
                <th>Debit (â‚¹)</th>
                <th>Credit (â‚¹)</th>
                <th>Audit Signoff</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">RV-2024-089</td>
                <td>28-Oct-2024</td>
                <td><span class="badge bg-success">Receipt (RV)</span></td>
                <td>
                  <div class="fw-bold text-dark">HDFC Bank - Escrow Worli</div>
                  <div class="small text-muted">To: Prestige Urban Realty Ltd.</div>
                </td>
                <td>Receipt of Certified RA Bill #07 Net Clearance</td>
                <td>PRJ-2024-001 (Skylark)</td>
                <td class="fw-bold text-success">â‚¹ 14,82,00,000</td>
                <td>-</td>
                <td><span class="badge bg-light text-success border border-success-subtle"><i class="bi bi-check2"></i> Cleared</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('RV-2024-089 Receipt Voucher', {'Amount': 'â‚¹ 14.82 Cr', 'Bank': 'HDFC Escrow', 'Account': 'Prestige Urban'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">PV-2024-342</td>
                <td>26-Oct-2024</td>
                <td><span class="badge bg-primary">Payment (PV)</span></td>
                <td>
                  <div class="fw-bold text-dark">Tata Steel Ltd. - Vendor A/c</div>
                  <div class="small text-muted">From: ICICI Bank Project Current</div>
                </td>
                <td>RTGS Payment against PO-2024-078 (300 MT TMT Bars)</td>
                <td>PRJ-2024-001 (Skylark)</td>
                <td>-</td>
                <td class="fw-bold text-dark">â‚¹ 2,05,50,000</td>
                <td><span class="badge bg-light text-success border border-success-subtle"><i class="bi bi-check2"></i> Cleared</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('PV-2024-342 Payment Voucher', {'Vendor': 'Tata Steel Ltd.', 'Debit': 'â‚¹ 2.05 Cr'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">JV-2024-118</td>
                <td>24-Oct-2024</td>
                <td><span class="badge bg-secondary">Journal (JV)</span></td>
                <td>
                  <div class="fw-bold text-dark">Subcontractor Retention Provision</div>
                  <div class="small text-muted">To: Modern Formwork &amp; Shuttering</div>
                </td>
                <td>5% Retention withhold against CRA-2024-041</td>
                <td>PRJ-2024-001 (Skylark)</td>
                <td class="fw-bold text-dark">â‚¹ 2,41,000</td>
                <td class="fw-bold text-dark">â‚¹ 2,41,000</td>
                <td><span class="badge bg-light text-muted border">Audited</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('JV-2024-118 Retention JV', {'Retention': 'â‚¹ 2,41,000'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Create Voucher Modal -->
      <div class="modal fade" id="createVoucherModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-cash-coin text-primary me-2"></i>Post Double-Entry Journal Voucher</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createVoucherForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label class="form-label">Voucher Type <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Payment Voucher (PV)</option>
                      <option>Receipt Voucher (RV)</option>
                      <option selected>Journal Voucher (JV)</option>
                      <option>Contra Voucher (Bank Transfer)</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Posting Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" value="2024-10-28" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Cost Center / Project</label>
                    <select class="form-select">
                      <option>PRJ-2024-001 : Skylark Heights</option>
                      <option>PRJ-2024-002 : CyberTower B</option>
                      <option>PRJ-2024-003 : LogisticHub Pune</option>
                      <option>PRJ-2024-004 : NH48 Expressway</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Debit Account Head <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Direct Civil Expense - RMC Concrete" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Credit Account Head <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. ACC Concrete RMC - Vendor Payable" required>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Voucher Amount (â‚¹) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="1500000" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Cheque / UTR / Reference No.</label>
                    <input type="text" class="form-control" placeholder="UTR-HDFC-91823901">
                  </div>

                  <div class="col-md-12">
                    <label class="form-label">Narration &amp; Accounting Notes <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="2" placeholder="Being payment released towards supply of RMC as per certified GRN" required></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Commit Voucher to Ledger</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('createVoucherForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('createVoucherModal')).hide();
      BuildProApp.showToast('Journal Voucher posted and reconciled in general ledger!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
