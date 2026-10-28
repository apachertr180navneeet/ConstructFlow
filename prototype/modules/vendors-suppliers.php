<?php
$page_title = "Vendors &amp; Suppliers";
$active_page = "vendors-suppliers";
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
            <span>Procurement &amp; Materials</span>
            <i class="bi bi-chevron-right"></i>
            <span>Vendors &amp; Suppliers</span>
          </div>
          <h1>Approved Vendor List (AVL) &amp; Supplier Directory</h1>
          <p class="erp-page-desc">Master directory of verified material manufacturers, trade distributors, MSME compliance and credit accounts.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#addVendorModal">
            <i class="bi bi-plus-circle"></i> Onboard Vendor
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('vendors-table', 'BuildPro_Vendors_List')">
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
                <div class="erp-stat-title">Approved Vendors (AVL)</div>
                <div class="erp-stat-value">48 Suppliers</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-shield-check"></i> 100% GST Verified</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-truck"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">MSME Registered</div>
                <div class="erp-stat-value">22 Vendors</div>
                <div class="erp-stat-trend trend-neutral"><i class="bi bi-patch-check"></i> 45-Day Payment Rule</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-award"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Outstanding Payables</div>
                <div class="erp-stat-value">â‚¹ 32.10 Cr</div>
                <div class="erp-stat-trend trend-down"><i class="bi bi-clock-history"></i> â‚¹ 8.40 Cr Due &lt; 7 Days</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-wallet2"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Avg Supplier Rating</div>
                <div class="erp-stat-value">4.7 / 5.0</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-star-fill text-warning"></i> Quality &amp; On-Time</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-star"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search supplier, trade category, GSTIN...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Categories</option>
              <option value="Steel">Reinforcement Steel</option>
              <option value="Cement">Cement &amp; RMC</option>
              <option value="Aggregate">Crushed Sand &amp; Aggregate</option>
              <option value="Fuel">Fuel &amp; Lubricants</option>
            </select>
          </div>
        </div>

        <!-- Vendors Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="vendors-table">
            <thead>
              <tr>
                <th>Vendor Code</th>
                <th>Supplier Legal Name</th>
                <th>Supply Category</th>
                <th>GSTIN &amp; PAN</th>
                <th>MSME Type</th>
                <th>Credit Days</th>
                <th>Rating</th>
                <th>Outstanding (â‚¹)</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">VND-1001</td>
                <td>
                  <div class="fw-bold text-dark">Tata Steel Ltd.</div>
                  <div class="small text-muted">Bandra East, Mumbai</div>
                </td>
                <td><span class="badge bg-primary-subtle text-primary">Reinforcement Steel</span></td>
                <td>
                  <div>27AAACT2727Q1ZB</div>
                  <div class="small text-muted">PAN: AAACT2727Q</div>
                </td>
                <td><span class="badge bg-light text-muted border">Large Enterprise</span></td>
                <td>45 Days</td>
                <td><span class="text-warning fw-bold"><i class="bi bi-star-fill"></i> 4.9</span></td>
                <td class="fw-bold text-dark">â‚¹ 5,82,40,000</td>
                <td><span class="badge-status active">Approved AVL</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Tata Steel Ltd.', {'Code': 'VND-1001', 'Category': 'Steel', 'GSTIN': '27AAACT2727Q1ZB', 'Outstanding': 'â‚¹ 5.82 Cr'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit vendor details', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">VND-1002</td>
                <td>
                  <div class="fw-bold text-dark">UltraTech Cement Ltd.</div>
                  <div class="small text-muted">Andheri East, Mumbai</div>
                </td>
                <td><span class="badge bg-warning-subtle text-warning">Cement &amp; RMC</span></td>
                <td>
                  <div>27AAACU0145R1ZY</div>
                  <div class="small text-muted">PAN: AAACU0145R</div>
                </td>
                <td><span class="badge bg-light text-muted border">Large Enterprise</span></td>
                <td>30 Days</td>
                <td><span class="text-warning fw-bold"><i class="bi bi-star-fill"></i> 4.8</span></td>
                <td class="fw-bold text-dark">â‚¹ 3,40,15,000</td>
                <td><span class="badge-status active">Approved AVL</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('UltraTech Cement', {'Category': 'Cement', 'Outstanding': 'â‚¹ 3.40 Cr'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit vendor details', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">VND-1003</td>
                <td>
                  <div class="fw-bold text-dark">Shree Krishna Aggregate Mines</div>
                  <div class="small text-muted">Navi Mumbai Stone Quarry</div>
                </td>
                <td><span class="badge bg-secondary-subtle text-secondary">Aggregate &amp; Sand</span></td>
                <td>
                  <div>27AAQFS4412P1ZX</div>
                  <div class="small text-muted">PAN: AAQFS4412P</div>
                </td>
                <td><span class="badge bg-success-subtle text-success">MSME Small</span></td>
                <td>15 Days</td>
                <td><span class="text-warning fw-bold"><i class="bi bi-star-fill"></i> 4.6</span></td>
                <td class="fw-bold text-dark">â‚¹ 68,20,000</td>
                <td><span class="badge-status active">Approved AVL</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Shree Krishna Aggregates', {'Category': 'Aggregates', 'MSME': 'Small', 'Outstanding': 'â‚¹ 68.20 Lakh'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit vendor details', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">VND-1004</td>
                <td>
                  <div class="fw-bold text-dark">Sika India Pvt. Ltd.</div>
                  <div class="small text-muted">Kalyan Chemicals Hub</div>
                </td>
                <td><span class="badge bg-info-subtle text-info">Construction Chemicals</span></td>
                <td>
                  <div>27AAACS1820L1Z9</div>
                  <div class="small text-muted">PAN: AAACS1820L</div>
                </td>
                <td><span class="badge bg-light text-muted border">Medium MNC</span></td>
                <td>60 Days</td>
                <td><span class="text-warning fw-bold"><i class="bi bi-star-fill"></i> 4.9</span></td>
                <td class="fw-bold text-dark">â‚¹ 42,90,000</td>
                <td><span class="badge-status active">Approved AVL</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Sika India', {'Category': 'Admixtures & Waterproofing', 'Outstanding': 'â‚¹ 42.90 Lakh'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit vendor details', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Add Vendor Modal -->
      <div class="modal fade" id="addVendorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-truck text-primary me-2"></i>Onboard Vendor to Approved Vendor List</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addVendorForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Vendor Company Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Jindal Steel &amp; Power Ltd." required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Supply Category <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Reinforcement Steel</option>
                      <option>Cement &amp; RMC</option>
                      <option>Stone Aggregates &amp; M-Sand</option>
                      <option>Admixtures &amp; Waterproofing</option>
                      <option>Electrical Cable &amp; Conduit</option>
                      <option>Plumbing &amp; Sanitary Pipes</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">GSTIN (15-character) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="27AAACJ..." required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">PAN Number</label>
                    <input type="text" class="form-control" placeholder="AAACJ...">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Credit Terms (Days)</label>
                    <input type="number" class="form-control" value="30">
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Register Vendor</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('addVendorForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('addVendorModal')).hide();
      BuildProApp.showToast('Vendor onboarded to Approved Vendor List (AVL)!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
