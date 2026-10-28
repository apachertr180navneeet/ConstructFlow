<?php
$page_title = "Drawings &amp; Document Management (EDMS)";
$active_page = "documents-drawings";
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
            <span>Corporate &amp; System</span>
            <i class="bi bi-chevron-right"></i>
            <span>Electronic Document Management (EDMS)</span>
          </div>
          <h1>Engineering Drawings, Blueprints &amp; Document Control</h1>
          <p class="erp-page-desc">Centralized repository for Good-For-Construction (GFC) drawings, structural CAD files, revision control and transmittal notices.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#uploadDrawingModal">
            <i class="bi bi-cloud-arrow-up"></i> Upload GFC Blueprint
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('documents-table', 'BuildPro_Drawings_Transmittal')">
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
                <div class="erp-stat-title">Approved GFC Blueprints</div>
                <div class="erp-stat-value">428 Drawings</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> 100% GFC Stamped</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-folder2-open"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Active Revisions in Review</div>
                <div class="erp-stat-value">6 Drawings</div>
                <div class="erp-stat-trend trend-neutral">Awaiting Structural Consultant</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-clock-history"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Transmittals Dispatched</div>
                <div class="erp-stat-value">38 Packages</div>
                <div class="erp-stat-trend trend-up">To Site Engineers &amp; Contractors</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-send-check"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">BIM 3D Models (IFC/RVT)</div>
                <div class="erp-stat-value">12 Models</div>
                <div class="erp-stat-trend trend-neutral">Navisworks Clash Free</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-box"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search drawing #, title, consultant...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Disciplines</option>
              <option value="Structural">Structural RCC</option>
              <option value="Architectural">Architectural Layout</option>
              <option value="MEP">MEP &amp; Plumbing</option>
              <option value="Facade">Curtain Wall / Facade</option>
            </select>
          </div>
        </div>

        <!-- Documents Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="documents-table">
            <thead>
              <tr>
                <th>Drawing Number</th>
                <th>Drawing Title &amp; Scope</th>
                <th>Discipline</th>
                <th>Current Rev</th>
                <th>Architect / Consultant</th>
                <th>Release Date</th>
                <th>File Format</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">SKL-STR-DWG-028</td>
                <td>
                  <div class="fw-bold text-dark">Tower 1 &amp; 2 : 28th Floor Columns &amp; Shear Wall Reinforcement</div>
                  <div class="small text-muted">Skylark Heights, Worli</div>
                </td>
                <td><span class="badge bg-primary-subtle text-primary">Structural RCC</span></td>
                <td><span class="badge bg-light text-dark border">Rev C</span></td>
                <td>Sterling Structural Consultants</td>
                <td>12-Oct-2024</td>
                <td><span class="badge bg-danger-subtle text-danger">PDF (A0)</span></td>
                <td><span class="badge-status active">GFC Stamped</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('SKL-STR-DWG-028 Rev C', {'Title': '28th Floor Reinforcement', 'Consultant': 'Sterling Consultants', 'Status': 'GFC Approved'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Downloading CAD / PDF Blueprint...', 'success')"><i class="bi bi-download"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">SKL-ARC-DWG-104</td>
                <td>
                  <div class="fw-bold text-dark">Central Clubhouse, Infinity Pool &amp; Podium Landscape Plan</div>
                  <div class="small text-muted">Skylark Heights, Worli</div>
                </td>
                <td><span class="badge bg-success-subtle text-success">Architectural</span></td>
                <td><span class="badge bg-light text-dark border">Rev B</span></td>
                <td>Hafeez Contractor Architects</td>
                <td>25-Sep-2024</td>
                <td><span class="badge bg-danger-subtle text-danger">PDF &amp; DWG</span></td>
                <td><span class="badge-status active">GFC Stamped</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('SKL-ARC-DWG-104 Rev B', {'Architect': 'Hafeez Contractor'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Downloading CAD Blueprint...', 'success')"><i class="bi bi-download"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">CYB-MEP-DWG-052</td>
                <td>
                  <div class="fw-bold text-dark">Basement 1 Chiller Plant Room Piping &amp; Fire Pump Schematics</div>
                  <div class="small text-muted">CyberTower B, Bengaluru</div>
                </td>
                <td><span class="badge bg-info-subtle text-info">MEP &amp; HVAC</span></td>
                <td><span class="badge bg-light text-dark border">Rev A</span></td>
                <td>Spectral MEP Services</td>
                <td>18-Oct-2024</td>
                <td><span class="badge bg-danger-subtle text-danger">PDF</span></td>
                <td><span class="badge-status active">GFC Stamped</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('CYB-MEP-DWG-052', {'Discipline': 'MEP Chiller Room'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Downloading Blueprint...', 'success')"><i class="bi bi-download"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Upload Drawing Modal -->
      <div class="modal fade" id="uploadDrawingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-cloud-arrow-up text-primary me-2"></i>Upload Good-For-Construction (GFC) Drawing</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="uploadDrawingForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label class="form-label">Drawing Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. SKL-STR-DWG-029" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Discipline <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Structural RCC</option>
                      <option>Architectural</option>
                      <option>MEP &amp; Plumbing</option>
                      <option>Facade Glazing</option>
                      <option>Landscape &amp; Roads</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Revision Code</label>
                    <input type="text" class="form-control" value="Rev 0 (Initial GFC)">
                  </div>

                  <div class="col-md-8">
                    <label class="form-label">Drawing Sheet Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Full descriptive title of drawing" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Consultant / Architect</label>
                    <input type="text" class="form-control" placeholder="Architect firm name">
                  </div>

                  <div class="col-md-12">
                    <label class="form-label">Attach CAD / PDF File</label>
                    <input type="file" class="form-control">
                    <small class="text-muted">Accepted formats: .DWG, .PDF, .RVT, .IFC (Max: 50MB)</small>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Upload &amp; Notify Site Team</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('uploadDrawingForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('uploadDrawingModal')).hide();
      BuildProApp.showToast('GFC Blueprint uploaded and transmittal alert pushed to site engineers!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
