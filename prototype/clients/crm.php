<?php
$page_title = "Client CRM &amp; Accounts";
$active_page = "clients-crm";
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
            <a href="crm.php">Client Management</a>
            <i class="bi bi-chevron-right"></i>
            <span>Developer CRM</span>
          </div>
          <h1>Client Management (CRM) &amp; Developer Accounts</h1>
          <p class="erp-page-desc">Track real estate developers, government infrastructure authorities, active EPC contracts and commercial pipelines.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
            <i class="bi bi-person-plus"></i> New Client Account
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('clients-table', 'BuildPro_Client_Directory')">
            <i class="bi bi-download"></i> Export CSV
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="window.print()">
            <i class="bi bi-printer"></i>
          </button>
        </div>
      </div>

      <main class="erp-content">
        <!-- Client Metrics -->
        <div class="row g-3 mb-4">
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Developer Accounts</div>
                <div class="erp-stat-value">12 Clients</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> 4 Active Sites</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-person-rolodex"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Active Contract Book</div>
                <div class="erp-stat-value">â‚¹ 806.25 Cr</div>
                <div class="erp-stat-trend trend-up">Across 4 Mega Projects</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-currency-rupee"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Certified Receivables</div>
                <div class="erp-stat-value">â‚¹ 48.75 Cr</div>
                <div class="erp-stat-trend trend-up">RA Bills under clearance</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-receipt"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Bidding Pipeline</div>
                <div class="erp-stat-value">â‚¹ 420.00 Cr</div>
                <div class="erp-stat-trend trend-neutral">3 Tenders submitted</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-briefcase"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search developer, contact, GSTIN...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Clients</option>
              <option value="Active">Active Contract</option>
              <option value="Pipeline">Tender Bidding</option>
            </select>
          </div>
        </div>

        <!-- Clients Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="clients-table">
            <thead>
              <tr>
                <th>Client Code</th>
                <th>Developer / Entity Name</th>
                <th>Category</th>
                <th>Key Contact Person</th>
                <th>Contact Details</th>
                <th>Active Projects</th>
                <th>Cumulative Contract Value</th>
                <th>Receivables Outstanding</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">CLI-1001</td>
                <td>
                  <div class="fw-bold text-dark">Prestige Urban Realty Ltd.</div>
                  <div class="small text-muted">GSTIN: 27AAACP9921M1Z5</div>
                </td>
                <td>Private Tier-1 Developer</td>
                <td>Gautam Singhania (VP Projects)</td>
                <td>
                  <div class="small">gautam@prestigeurban.com</div>
                  <div class="small text-muted">+91 98200 48210</div>
                </td>
                <td><span class="badge bg-primary-subtle text-primary">Skylark Heights</span></td>
                <td class="fw-bold">â‚¹ 142.50 Cr</td>
                <td class="text-danger fw-bold">â‚¹ 8.40 Cr</td>
                <td><span class="badge-status active">Active</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Prestige Urban Realty', {'Client': 'Prestige Urban', 'Contact': 'Gautam Singhania', 'Outstanding': 'â‚¹ 8.40 Cr', 'Projects': 'Skylark Heights'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit client details', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">CLI-1002</td>
                <td>
                  <div class="fw-bold text-dark">Nexus InfraTech Spaces</div>
                  <div class="small text-muted">GSTIN: 29AAACN8421K1Z2</div>
                </td>
                <td>Commercial IT REIT</td>
                <td>Siddharth Hegde (Chief Engg)</td>
                <td>
                  <div class="small">s.hegde@nexusinfra.in</div>
                  <div class="small text-muted">+91 98451 92831</div>
                </td>
                <td><span class="badge bg-primary-subtle text-primary">CyberTower B</span></td>
                <td class="fw-bold">â‚¹ 210.00 Cr</td>
                <td class="text-danger fw-bold">â‚¹ 14.20 Cr</td>
                <td><span class="badge-status active">Active</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('Nexus InfraTech', {'Client': 'Nexus InfraTech', 'Contact': 'Siddharth Hegde', 'Outstanding': 'â‚¹ 14.20 Cr'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit client', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">CLI-1003</td>
                <td>
                  <div class="fw-bold text-dark">TransLogix Logistics Ltd.</div>
                  <div class="small text-muted">GSTIN: 27AAACT1192P1Z0</div>
                </td>
                <td>Industrial Warehousing Fund</td>
                <td>Nilesh V. Mehta (Head Projects)</td>
                <td>
                  <div class="small">nilesh.mehta@translogix.com</div>
                  <div class="small text-muted">+91 99201 84920</div>
                </td>
                <td><span class="badge bg-primary-subtle text-primary">LogisticHub Pune</span></td>
                <td class="fw-bold">â‚¹ 68.75 Cr</td>
                <td class="text-danger fw-bold">â‚¹ 4.15 Cr</td>
                <td><span class="badge-status active">Active</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('TransLogix Logistics', {'Contact': 'Nilesh Mehta', 'Outstanding': 'â‚¹ 4.15 Cr'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit client', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">CLI-1004</td>
                <td>
                  <div class="fw-bold text-dark">National Highways Authority of India</div>
                  <div class="small text-muted">GSTIN: 24AAAGN0192L1Z9</div>
                </td>
                <td>Central Govt. Infrastructure</td>
                <td>R. K. Bansal (Chief Project GM)</td>
                <td>
                  <div class="small">rk.bansal@nhai.gov.in</div>
                  <div class="small text-muted">+91 79 2399 4810</div>
                </td>
                <td><span class="badge bg-primary-subtle text-primary">NH48 Expressway</span></td>
                <td class="fw-bold">â‚¹ 385.00 Cr</td>
                <td class="text-danger fw-bold">â‚¹ 22.00 Cr</td>
                <td><span class="badge-status active">Active</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('NHAI Client Account', {'Outstanding': 'â‚¹ 22.00 Cr', 'Project': 'NH48 Expressway'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Edit client', 'info')"><i class="bi bi-pencil"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Add Client Modal -->
      <div class="modal fade" id="addClientModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-person-plus text-primary me-2"></i>Add Developer / Client Entity</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addClientForm">
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Client Legal Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="e.g. Godrej Properties Ltd." required>
                </div>
                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label class="form-label">Category</label>
                    <select class="form-select">
                      <option>Private Tier-1 Developer</option>
                      <option>Govt. PSU / Highway Authority</option>
                      <option>Institutional / Healthcare</option>
                      <option>Industrial MNC</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Client GSTIN</label>
                    <input type="text" class="form-control" placeholder="15-digit GSTIN">
                  </div>
                </div>
                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label class="form-label">Primary Contact Person</label>
                    <input type="text" class="form-control" placeholder="Full Name">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" placeholder="+91 98000 00000">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email Address</label>
                  <input type="email" class="form-control" placeholder="contact@developer.com">
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Register Client</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('addClientForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('addClientModal')).hide();
      BuildProApp.showToast('Client account onboarded successfully!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
