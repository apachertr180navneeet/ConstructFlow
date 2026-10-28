<?php
$page_title = "Company Administration";
$active_page = "company-settings";
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
            <a href="company-settings.php">Administration</a>
            <i class="bi bi-chevron-right"></i>
            <span>Company Settings</span>
          </div>
          <h1>Company Profile &amp; Enterprise Settings</h1>
          <p class="erp-page-desc">Master legal entity configuration, statutory GST/PAN details, regional branch offices and ERP prefix numbering rules.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" onclick="BuildProApp.showToast('Company administration settings saved successfully!', 'success')">
            <i class="bi bi-check2-circle"></i> Save Configuration
          </button>
        </div>
      </div>

      <main class="erp-content">
        <div class="row g-4">
          <!-- Left Column: Legal Entity & Tax -->
          <div class="col-lg-8">
            <div class="erp-card mb-4">
              <div class="erp-card-header">
                <h5 class="erp-card-title"><i class="bi bi-building text-primary"></i> Legal Corporate Profile</h5>
                <span class="badge bg-success-subtle text-success border border-success-subtle">CIN Registered</span>
              </div>
              <div class="erp-card-body">
                <div class="row g-3">
                  <div class="col-md-8">
                    <label class="form-label">Company Legal Name</label>
                    <input type="text" class="form-control" value="BuildPro Construction Pvt. Ltd.">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Trade / Brand Name</label>
                    <input type="text" class="form-control" value="BuildPro Infrastructure">
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Corporate Identity No. (CIN)</label>
                    <input type="text" class="form-control" value="U45200MH2012PTC234567">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Permanent Account No. (PAN)</label>
                    <input type="text" class="form-control" value="AABCB1234F">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Primary GSTIN (Maharashtra)</label>
                    <input type="text" class="form-control" value="27AABCB1234F1Z8">
                  </div>

                  <div class="col-md-12">
                    <label class="form-label">Corporate Headquarters Address</label>
                    <textarea class="form-control" rows="2">BuildPro Towers, 7th Floor, G-Block, Bandra-Kurla Complex (BKC), Mumbai, Maharashtra 400051</textarea>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Official Email</label>
                    <input type="email" class="form-control" value="corporate@buildpro-erp.in">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Boardline Telephone</label>
                    <input type="text" class="form-control" value="+91 22 4987 6500">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">ISO Certification Ref</label>
                    <input type="text" class="form-control" value="ISO 9001:2015 &amp; ISO 45001:2018">
                  </div>
                </div>
              </div>
            </div>

            <!-- Regional Operating Branches -->
            <div class="erp-card mb-4">
              <div class="erp-card-header">
                <h5 class="erp-card-title"><i class="bi bi-geo-alt text-warning"></i> Regional Branch Offices &amp; State GSTINs</h5>
                <button type="button" class="btn btn-sm btn-erp-outline" onclick="BuildProApp.showToast('Add Branch modal opened', 'info')">+ Add Branch</button>
              </div>
              <div class="erp-card-body p-0">
                <div class="table-responsive">
                  <table class="table erp-table mb-0">
                    <thead>
                      <tr>
                        <th>Branch Hub</th>
                        <th>State</th>
                        <th>State GSTIN</th>
                        <th>Regional Head</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fw-bold">Bengaluru Regional Office</td>
                        <td>Karnataka</td>
                        <td>29AABCB1234F1Z4</td>
                        <td>Vikram Malhotra (VP South)</td>
                        <td><span class="badge-status active">Operational</span></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">Pune Industrial Works Office</td>
                        <td>Maharashtra</td>
                        <td>27AABCB1234F1Z8</td>
                        <td>Sunil Kulkarni (GM West)</td>
                        <td><span class="badge-status active">Operational</span></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">Vadodara Expressway Site Office</td>
                        <td>Gujarat</td>
                        <td>24AABCB1234F1Z1</td>
                        <td>Col. Sanjeev Varma</td>
                        <td><span class="badge-status active">Operational</span></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">Delhi NCR Liaison Office</td>
                        <td>Delhi</td>
                        <td>07AABCB1234F1Z6</td>
                        <td>K. P. Saxena (Director)</td>
                        <td><span class="badge-status active">Operational</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Bank Accounts Setup -->
            <div class="erp-card">
              <div class="erp-card-header">
                <h5 class="erp-card-title"><i class="bi bi-bank text-success"></i> Corporate Treasury &amp; Project Escrow Accounts</h5>
              </div>
              <div class="erp-card-body p-0">
                <div class="table-responsive">
                  <table class="table erp-table mb-0">
                    <thead>
                      <tr>
                        <th>Bank &amp; Branch</th>
                        <th>Account Type</th>
                        <th>Account Number</th>
                        <th>IFSC Code</th>
                        <th>Associated Project</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fw-bold">HDFC Bank Ltd. (BKC Branch)</td>
                        <td>Current Operations Account</td>
                        <td>50200049281726</td>
                        <td>HDFC0000060</td>
                        <td>Corporate Main Pool</td>
                      </tr>
                      <tr>
                        <td class="fw-bold">ICICI Bank Ltd. (Worli Seaface)</td>
                        <td>RERA Escrow Account</td>
                        <td>000405019882</td>
                        <td>ICIC0000004</td>
                        <td>PRJ-2024-001 : Skylark Heights</td>
                      </tr>
                      <tr>
                        <td class="fw-bold">State Bank of India (Whitefield)</td>
                        <td>Project Working Capital</td>
                        <td>38910294812</td>
                        <td>SBIN0004128</td>
                        <td>PRJ-2024-002 : CyberTower B</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Right Column: ERP Serial Prefixes & System Policy -->
          <div class="col-lg-4">
            <div class="erp-card mb-4">
              <div class="erp-card-header">
                <h5 class="erp-card-title"><i class="bi bi-123 text-primary"></i> ERP Serial Prefixes</h5>
              </div>
              <div class="erp-card-body">
                <div class="mb-3">
                  <label class="form-label small">Projects Prefix</label>
                  <input type="text" class="form-control form-control-sm" value="PRJ-YYYY-###">
                </div>
                <div class="mb-3">
                  <label class="form-label small">Purchase Order (PO)</label>
                  <input type="text" class="form-control form-control-sm" value="PO-YYYY-###">
                </div>
                <div class="mb-3">
                  <label class="form-label small">Goods Receipt Note (GRN)</label>
                  <input type="text" class="form-control form-control-sm" value="GRN-YYYY-###">
                </div>
                <div class="mb-3">
                  <label class="form-label small">Client RA Bill</label>
                  <input type="text" class="form-control form-control-sm" value="RA-PRJ-###">
                </div>
                <div class="mb-3">
                  <label class="form-label small">Daily Progress Report (DPR)</label>
                  <input type="text" class="form-control form-control-sm" value="DPR-SITE-YYYYMMDD">
                </div>
              </div>
            </div>

            <div class="erp-card">
              <div class="erp-card-header">
                <h5 class="erp-card-title"><i class="bi bi-calendar-event text-danger"></i> Financial Year Setup</h5>
              </div>
              <div class="erp-card-body">
                <div class="mb-3">
                  <label class="form-label small">Active Fiscal Year</label>
                  <select class="form-select form-select-sm">
                    <option selected>FY 2024-2025 (01-Apr-2024 to 31-Mar-2025)</option>
                    <option>FY 2023-2024 (Archived)</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label small">Currency Code &amp; Format</label>
                  <input type="text" class="form-control form-control-sm" value="INR (â‚¹ Indian Rupee - Lakhs/Crores)" readonly>
                </div>
                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" checked id="lockPastVouchers">
                  <label class="form-check-label small" for="lockPastVouchers">Lock vouchers prior to last audited quarter</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      



<?php require_once $includes_path . 'footer.php'; ?>
