<?php
$page_title = "Purchase &amp; Procurement";
$active_page = "procurement";
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
            <span>Purchase Orders</span>
          </div>
          <h1>Purchase &amp; Procurement Management</h1>
          <p class="erp-page-desc">Manage site material indents, comparative quotations, purchase orders (PO), GST allocations and supplier delivery tracking.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#createPOModal">
            <i class="bi bi-cart-plus"></i> Issue Purchase Order
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('procurement-table', 'BuildPro_Purchase_Orders')">
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
                <div class="erp-stat-title">Committed PO Value (MTD)</div>
                <div class="erp-stat-value">â‚¹ 24.85 Cr</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-cart-check"></i> 42 Active Purchase Orders</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-cart-check"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Pending Approvals</div>
                <div class="erp-stat-value">8 Orders</div>
                <div class="erp-stat-trend trend-down"><i class="bi bi-clock-history"></i> â‚¹ 6.20 Cr Awaiting Director</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-hourglass-split"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Goods Received (GRN)</div>
                <div class="erp-stat-value">94.5%</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-truck"></i> On-Time Site Delivery</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-box-seam"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Active Site Indents</div>
                <div class="erp-stat-value">14 Indents</div>
                <div class="erp-stat-trend trend-neutral">Cement, TMT, Diesel HSD</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-journal-text"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search PO #, vendor, material...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All PO Statuses</option>
              <option value="Approved">Approved / Issued</option>
              <option value="Pending">Pending Signoff</option>
              <option value="Delivered">Delivered (GRN)</option>
            </select>
          </div>
        </div>

        <!-- PO Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="procurement-table">
            <thead>
              <tr>
                <th>PO Number</th>
                <th>Supplier / Vendor</th>
                <th>Project &amp; Site Wing</th>
                <th>Material Items</th>
                <th>Order Quantity</th>
                <th>PO Value (â‚¹)</th>
                <th>GST Rate</th>
                <th>Delivery Due</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">PO-2024-089</td>
                <td>
                  <div class="fw-bold text-dark">Tata Steel Ltd.</div>
                  <div class="small text-muted">GSTIN: 27AAACT2727Q1ZB</div>
                </td>
                <td>Skylark Heights (Tower 1 &amp; 2)</td>
                <td>Fe500D TMT Rebars (16mm, 20mm, 25mm)</td>
                <td>500 MT</td>
                <td class="fw-bold text-dark">â‚¹ 3,42,50,000</td>
                <td>18% GST</td>
                <td class="small text-danger fw-bold">31-Oct-2024</td>
                <td><span class="badge bg-warning text-dark">Pending Signoff</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('PO-2024-089 Tata Steel', {'PO No': 'PO-2024-089', 'Vendor': 'Tata Steel Ltd.', 'Value': 'â‚¹ 3,42,50,000', 'Qty': '500 MT TMT Bars', 'Delivery': '31-Oct-2024'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm delete" onclick="BuildProApp.confirmDelete('PO-2024-089')"><i class="bi bi-trash"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">PO-2024-088</td>
                <td>
                  <div class="fw-bold text-dark">UltraTech Cement Ltd.</div>
                  <div class="small text-muted">GSTIN: 27AAACU0145R1ZY</div>
                </td>
                <td>CyberTower B (Bengaluru)</td>
                <td>OPC 53 Grade High Strength Cement (50kg bags)</td>
                <td>3,000 Bags</td>
                <td class="fw-bold text-dark">â‚¹ 11,85,000</td>
                <td>28% GST</td>
                <td class="small text-muted">28-Oct-2024</td>
                <td><span class="badge-status active">Approved</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('PO-2024-088 UltraTech', {'Value': 'â‚¹ 11,85,000', 'Qty': '3,000 Bags'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm delete" onclick="BuildProApp.confirmDelete('PO-2024-088')"><i class="bi bi-trash"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">PO-2024-087</td>
                <td>
                  <div class="fw-bold text-dark">ACC Concrete RMC Plant</div>
                  <div class="small text-muted">GSTIN: 27AAACA0833C1Z6</div>
                </td>
                <td>Skylark Heights (Worli)</td>
                <td>Ready Mix Concrete Design Mix M35</td>
                <td>450 Cum</td>
                <td class="fw-bold text-dark">â‚¹ 30,82,500</td>
                <td>18% GST</td>
                <td class="small text-muted">26-Oct-2024</td>
                <td><span class="badge-status completed">Delivered (GRN)</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('PO-2024-087 ACC Concrete', {'Status': 'Delivered', 'GRN': 'GRN-2024-412'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm delete" onclick="BuildProApp.confirmDelete('PO-2024-087')"><i class="bi bi-trash"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">PO-2024-086</td>
                <td>
                  <div class="fw-bold text-dark">Indian Oil Corporation Ltd. (IOCL)</div>
                  <div class="small text-muted">GSTIN: 24AAACI1681G1Z4</div>
                </td>
                <td>NH48 Expressway (Gujarat)</td>
                <td>High Speed Diesel (HSD) for Generators &amp; Excavators</td>
                <td>20,000 Litres</td>
                <td class="fw-bold text-dark">â‚¹ 18,20,000</td>
                <td>Exempt/VAT</td>
                <td class="small text-muted">25-Oct-2024</td>
                <td><span class="badge-status completed">Delivered (GRN)</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('PO-2024-086 IOCL Fuel', {'Status': 'Delivered', 'Qty': '20,000 Ltrs'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm delete" onclick="BuildProApp.confirmDelete('PO-2024-086')"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Create PO Modal -->
      <div class="modal fade" id="createPOModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-cart-plus text-primary me-2"></i>Issue Commercial Purchase Order (PO)</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createPOForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label class="form-label">PO Serial Ref <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="PO-2024-090" readonly>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Associated Project <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option value="PRJ-2024-001">PRJ-2024-001 : Skylark Heights</option>
                      <option value="PRJ-2024-002">PRJ-2024-002 : CyberTower B</option>
                      <option value="PRJ-2024-003">PRJ-2024-003 : LogisticHub Pune</option>
                      <option value="PRJ-2024-004">PRJ-2024-004 : NH48 Expressway</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Approved Supplier (AVL) <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Tata Steel Ltd.</option>
                      <option>UltraTech Cement Ltd.</option>
                      <option>JSW Steel Coated Products</option>
                      <option>ACC Concrete RMC</option>
                      <option>Jindal Steel &amp; Power Ltd.</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Material Description <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Fe500D TMT Reinforcement Steel 12mm &amp; 16mm" required>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="100" required>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Unit</label>
                    <select class="form-select">
                      <option>MT (Metric Tons)</option>
                      <option>Bags</option>
                      <option>Cum</option>
                      <option>Litres</option>
                      <option>Nos</option>
                    </select>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Unit Quoted Rate (â‚¹) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="68500" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Applicable GST</label>
                    <select class="form-select">
                      <option>18% GST (Standard)</option>
                      <option>28% GST (Cement)</option>
                      <option>5% GST</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Target Delivery Date</label>
                    <input type="date" class="form-control" value="2024-11-05">
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Generate Purchase Order</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('createPOForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('createPOModal')).hide();
      BuildProApp.showToast('Purchase Order PO-2024-090 created and sent to approval workflow!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
