<?php
$page_title = "Budget &amp; Cost Control";
$active_page = "budget-cost-control";
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
            <span>Cost Control</span>
          </div>
          <h1>Project Budget, Cost Variance &amp; Earned Value (EVA)</h1>
          <p class="erp-page-desc">Track Cost Codes, Budget at Completion (BAC), Actual Cost (ACWP), Cost Variance (CV), and Cost-To-Complete (CTC) forecasts.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#newVariationModal">
            <i class="bi bi-plus-circle"></i> Create Variation Order
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('budget-table', 'BuildPro_Cost_Control_Report')">
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
                <div class="erp-stat-title">Baseline Budget (BAC)</div>
                <div class="erp-stat-value">â‚¹ 121.00 Cr</div>
                <div class="erp-stat-trend trend-neutral">Skylark Heights Internal Budget</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-pie-chart"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Committed Value (POs/WOs)</div>
                <div class="erp-stat-value">â‚¹ 108.40 Cr</div>
                <div class="erp-stat-trend trend-neutral">89.5% Subcontracted / Ordered</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-cart-check"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Actual Cost Incurred</div>
                <div class="erp-stat-value">â‚¹ 98.40 Cr</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> Cost Performance Index (CPI): 1.04</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-cash-stack"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Forecast Profit Margin</div>
                <div class="erp-stat-value">â‚¹ 21.50 Cr</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-arrow-up-right"></i> 15.1% Net Margin Projected</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-trophy"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search cost code, package, trade...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Packages</option>
              <option value="Under Budget">Under Budget</option>
              <option value="Near Limit">Near Budget Limit</option>
            </select>
          </div>
        </div>

        <!-- Budget Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="budget-table">
            <thead>
              <tr>
                <th>Cost Code</th>
                <th>Trade Package Description</th>
                <th>Approved Budget (â‚¹)</th>
                <th>Committed Cost (â‚¹)</th>
                <th>Actual Incurred (â‚¹)</th>
                <th>Forecast CTC (â‚¹)</th>
                <th>EAC Total (â‚¹)</th>
                <th>Variance (â‚¹)</th>
                <th>Cost Health</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">CC-100-CIV</td>
                <td>
                  <div class="fw-bold text-dark">Civil Foundation &amp; Substructure</div>
                  <div class="small text-muted">Excavation, Raft, Piling, Retaining Walls</div>
                </td>
                <td class="fw-bold text-dark">â‚¹ 24,00,00,000</td>
                <td>â‚¹ 22,80,00,000</td>
                <td>â‚¹ 22,40,00,000</td>
                <td>â‚¹ 0</td>
                <td class="fw-bold text-dark">â‚¹ 22,40,00,000</td>
                <td class="text-success fw-bold">+ â‚¹ 1,60,00,000</td>
                <td><span class="badge bg-success-subtle text-success">Under Budget (6.6%)</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('CC-100-CIV Substructure', {'Budget': 'â‚¹ 24.00 Cr', 'Actual': 'â‚¹ 22.40 Cr', 'Savings': 'â‚¹ 1.60 Cr'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">CC-200-STR</td>
                <td>
                  <div class="fw-bold text-dark">RCC Superstructure Frame (G+32)</div>
                  <div class="small text-muted">Columns, Slabs, Beams, Mivan Shuttering</div>
                </td>
                <td class="fw-bold text-dark">â‚¹ 46,00,00,000</td>
                <td>â‚¹ 44,50,00,000</td>
                <td>â‚¹ 36,80,00,000</td>
                <td>â‚¹ 8,10,00,000</td>
                <td class="fw-bold text-dark">â‚¹ 44,90,00,000</td>
                <td class="text-success fw-bold">+ â‚¹ 1,10,00,000</td>
                <td><span class="badge bg-success-subtle text-success">Under Budget</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('CC-200-STR Superstructure', {'Budget': 'â‚¹ 46.00 Cr', 'EAC': 'â‚¹ 44.90 Cr'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">CC-300-MEP</td>
                <td>
                  <div class="fw-bold text-dark">MEP, HVAC &amp; Fire Protection</div>
                  <div class="small text-muted">Plumbing, Chilled Water, Substation, Elevators</div>
                </td>
                <td class="fw-bold text-dark">â‚¹ 26,00,00,000</td>
                <td>â‚¹ 23,80,00,000</td>
                <td>â‚¹ 18,20,00,000</td>
                <td>â‚¹ 7,50,00,000</td>
                <td class="fw-bold text-dark">â‚¹ 25,70,00,000</td>
                <td class="text-success fw-bold">+ â‚¹ 30,00,000</td>
                <td><span class="badge bg-success-subtle text-success">Healthy Float</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('CC-300-MEP', {'Budget': 'â‚¹ 26.00 Cr'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">CC-400-FIN</td>
                <td>
                  <div class="fw-bold text-dark">Facade, Glazing &amp; Internal Finishing</div>
                  <div class="small text-muted">DGU Curtain Wall, Flooring, Gypsum, Painting</div>
                </td>
                <td class="fw-bold text-dark">â‚¹ 25,00,00,000</td>
                <td>â‚¹ 17,30,00,000</td>
                <td>â‚¹ 11,00,00,000</td>
                <td>â‚¹ 14,20,00,000</td>
                <td class="fw-bold text-dark">â‚¹ 25,20,00,000</td>
                <td class="text-danger fw-bold">- â‚¹ 20,00,000</td>
                <td><span class="badge bg-warning text-dark">Near Limit (Glass Price)</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('CC-400-FIN Finishing', {'Status': 'Cost alert on raw aluminium'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Variation Modal -->
      <div class="modal fade" id="newVariationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-plus-circle text-primary me-2"></i>Create Project Variation Order (VO)</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="newVariationForm">
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Cost Code Package <span class="text-danger">*</span></label>
                  <select class="form-select" required>
                    <option>CC-400-FIN : Facade &amp; Glazing</option>
                    <option>CC-300-MEP : HVAC &amp; Fire Fighting</option>
                    <option>CC-200-STR : RCC Superstructure</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Variation Order Scope / Justification <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="e.g. Upgraded acoustic DGU glass specification" required>
                </div>
                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label class="form-label">Approved Budget Add (â‚¹)</label>
                    <input type="number" class="form-control" placeholder="1500000" required>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Client Approval Ref</label>
                    <input type="text" class="form-control" placeholder="PMC/VO/2024/09">
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Commit Variation Order</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('newVariationForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('newVariationModal')).hide();
      BuildProApp.showToast('Project Variation Order (VO) registered and baseline budget updated!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
