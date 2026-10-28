<?php
$page_title = "Inventory &amp; Stores";
$active_page = "inventory-materials";
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
            <span>Inventory Management</span>
          </div>
          <h1>Site Store Inventory &amp; Material Stock Ledger</h1>
          <p class="erp-page-desc">Real-time store ledger, Goods Receipt Notes (GRN), material issue slips (MIN), scrap tracking and buffer reorder triggers.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#issueMaterialModal">
            <i class="bi bi-box-arrow-up-right"></i> Issue Material (MIN)
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('inventory-table', 'BuildPro_Stock_Ledger')">
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
                <div class="erp-stat-title">Total Stock Valuation</div>
                <div class="erp-stat-value">â‚¹ 14.85 Cr</div>
                <div class="erp-stat-trend trend-neutral">Across 8 Site Stores</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-boxes"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Low Stock Reorder Alerts</div>
                <div class="erp-stat-value">3 Items</div>
                <div class="erp-stat-trend trend-down"><i class="bi bi-exclamation-triangle-fill text-danger"></i> Below Minimum Buffer</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-exclamation-octagon"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Today's GRN Inward</div>
                <div class="erp-stat-value">â‚¹ 42.60 Lakh</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-box-arrow-in-down"></i> 4 Delivery Trucks Unloaded</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-truck"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Wastage / Scrap Index</div>
                <div class="erp-stat-value">1.8%</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-shield-check"></i> Standard Allowance &lt; 3%</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-recycle"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search material code, name, store...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Inventory</option>
              <option value="Low Stock">Critical Low Stock</option>
              <option value="In-Stock">Healthy In-Stock</option>
            </select>
            <select class="form-select form-select-sm" id="filter-store" style="width: 180px;">
              <option value="all">All Site Stores</option>
              <option value="Skylark">Skylark Heights Central Store</option>
              <option value="Cyber">CyberTower B Store Hub</option>
              <option value="Vadodara">Vadodara Yard Store</option>
            </select>
          </div>
        </div>

        <!-- Stock Ledger Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="inventory-table">
            <thead>
              <tr>
                <th>Item Code</th>
                <th>Material Specification</th>
                <th>Store Location</th>
                <th>Unit</th>
                <th>Opening</th>
                <th>Inward (GRN)</th>
                <th>Issued (MIN)</th>
                <th>Available Balance</th>
                <th>Min Buffer</th>
                <th>Valuation (â‚¹)</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">MAT-STEEL-016</td>
                <td>
                  <div class="fw-bold text-dark">Fe500D TMT Rebar (16mm Dia) - Tata Tiscon</div>
                  <div class="small text-muted">HSN Code: 72142090</div>
                </td>
                <td>Skylark Heights Yard A</td>
                <td>MT</td>
                <td>45.0</td>
                <td>80.0</td>
                <td>98.5</td>
                <td class="fw-bold text-danger">26.5 MT</td>
                <td>50.0 MT</td>
                <td class="fw-bold text-dark">â‚¹ 18,15,250</td>
                <td><span class="badge bg-danger">Low Stock Warning</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('16mm TMT Steel', {'Balance': '26.5 MT', 'Buffer': '50.0 MT', 'Valuation': 'â‚¹ 18,15,250'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Trigger reorder indents', 'info')"><i class="bi bi-cart-plus"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">MAT-CEM-OPC53</td>
                <td>
                  <div class="fw-bold text-dark">OPC 53 Grade High Strength Cement (UltraTech)</div>
                  <div class="small text-muted">HSN Code: 25232910</div>
                </td>
                <td>CyberTower B Store Hub</td>
                <td>Bags</td>
                <td>850</td>
                <td>1,200</td>
                <td>1,810</td>
                <td class="fw-bold text-danger">240 Bags</td>
                <td>500 Bags</td>
                <td class="fw-bold text-dark">â‚¹ 94,800</td>
                <td><span class="badge bg-danger">Low Stock Warning</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('OPC 53 Cement', {'Balance': '240 Bags', 'Buffer': '500 Bags'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Reorder cement indent', 'info')"><i class="bi bi-cart-plus"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">MAT-STEEL-025</td>
                <td>
                  <div class="fw-bold text-dark">Fe500D TMT Rebar (25mm Heavy Dia Columns)</div>
                  <div class="small text-muted">HSN Code: 72142090</div>
                </td>
                <td>Skylark Heights Yard A</td>
                <td>MT</td>
                <td>110.0</td>
                <td>150.0</td>
                <td>122.0</td>
                <td class="fw-bold text-success">138.0 MT</td>
                <td>60.0 MT</td>
                <td class="fw-bold text-dark">â‚¹ 94,53,000</td>
                <td><span class="badge-status active">In-Stock</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('25mm TMT Steel', {'Balance': '138 MT'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Adjust stock ledger', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">MAT-FUEL-HSD</td>
                <td>
                  <div class="fw-bold text-dark">High Speed Diesel (HSD) for Static Pumps &amp; Gensets</div>
                  <div class="small text-muted">Underground Fuel Tank</div>
                </td>
                <td>Vadodara Yard Store</td>
                <td>Litres</td>
                <td>4,500</td>
                <td>20,000</td>
                <td>14,200</td>
                <td class="fw-bold text-success">10,300 Ltr</td>
                <td>4,000 Ltr</td>
                <td class="fw-bold text-dark">â‚¹ 9,37,300</td>
                <td><span class="badge-status active">In-Stock</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('HSD Diesel Tank', {'Balance': '10,300 Litres'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Adjust diesel log', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Issue Material Modal -->
      <div class="modal fade" id="issueMaterialModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-box-arrow-up-right text-primary me-2"></i>Issue Material to Site (MIN Slip)</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="issueMaterialForm">
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Material Stock Item <span class="text-danger">*</span></label>
                  <select class="form-select" required>
                    <option>MAT-STEEL-025 : 25mm TMT Rebars (Available: 138 MT)</option>
                    <option>MAT-STEEL-016 : 16mm TMT Rebars (Available: 26.5 MT)</option>
                    <option>MAT-CEM-OPC53 : UltraTech Cement (Available: 240 Bags)</option>
                    <option>MAT-FUEL-HSD : Diesel (Available: 10,300 Ltrs)</option>
                  </select>
                </div>
                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label class="form-label">Issue Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="10" required>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Issued To Wing / Trade</label>
                    <input type="text" class="form-control" placeholder="e.g. Tower 2 28th Slab Rebar" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Authorized Subcontractor / In-Charge</label>
                  <input type="text" class="form-control" placeholder="Subcontractor Name" required>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Generate MIN Issue Slip</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('issueMaterialForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('issueMaterialModal')).hide();
      BuildProApp.showToast('Material Issue Note (MIN-2024-819) generated and inventory adjusted!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
