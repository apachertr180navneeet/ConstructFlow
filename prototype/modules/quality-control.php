<?php
$page_title = "Quality Control (QA/QC)";
$active_page = "quality-control";
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
            <span>Quality &amp; Safety</span>
            <i class="bi bi-chevron-right"></i>
            <span>Quality Assurance</span>
          </div>
          <h1>Quality Control (QA/QC) &amp; Material Testing Laboratory</h1>
          <p class="erp-page-desc">Concrete cube compressive strength tests, slump records, steel tensile test certificates and Non-Conformance Reports (NCR).</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#logCubeTestModal">
            <i class="bi bi-check2-circle"></i> Log Cube Strength Test
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('qaqc-table', 'BuildPro_QAQC_Lab_Register')">
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
                <div class="erp-stat-title">Cube Tests Passed</div>
                <div class="erp-stat-value">99.2% Rate</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> 1,248 Sets Tested</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-check2-all"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Open NCR Snags</div>
                <div class="erp-stat-value">2 Minor NCRs</div>
                <div class="erp-stat-trend trend-neutral">Honeycomb patch rectification</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-exclamation-triangle"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">28-Day Strength Avg</div>
                <div class="erp-stat-value">43.8 N/mmÂ²</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-arrow-up-right"></i> Target M35: +25% margin</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-speedometer2"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">NABL Test Certificates</div>
                <div class="erp-stat-value">84 Reports</div>
                <div class="erp-stat-trend trend-neutral">Third Party Certified</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-award"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search test ref, concrete grade, structure...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Test Results</option>
              <option value="Passed">Compliant (Passed)</option>
              <option value="NCR">Non-Conformance (NCR)</option>
              <option value="Pending 28d">Awaiting 28d Test</option>
            </select>
          </div>
        </div>

        <!-- QA/QC Register Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="qaqc-table">
            <thead>
              <tr>
                <th>Test Sample ID</th>
                <th>Casting Date &amp; Site Location</th>
                <th>Structural Element</th>
                <th>Design Grade</th>
                <th>Slump (mm)</th>
                <th>7-Day Strength</th>
                <th>28-Day Strength</th>
                <th>Specification Requirement</th>
                <th>Result Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">CUBE-2024-819</td>
                <td>
                  <div class="fw-bold text-dark">30-Sep-2024</div>
                  <div class="small text-muted">Skylark Heights (Tower 1)</div>
                </td>
                <td>26th Floor Columns (C1 to C8)</td>
                <td><span class="badge bg-primary">M40 Design Mix</span></td>
                <td>135 mm</td>
                <td class="fw-bold text-dark">29.8 N/mmÂ²</td>
                <td class="fw-bold text-success">46.2 N/mmÂ²</td>
                <td class="small text-muted">Req: &gt; 40.0 N/mmÂ² (IS 456)</td>
                <td><span class="badge-status active">Passed (Certified)</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('CUBE-2024-819 M40', {'Result': '46.2 N/mmÂ² (Passed)', 'Element': '26th Floor Columns'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">CUBE-2024-820</td>
                <td>
                  <div class="fw-bold text-dark">15-Oct-2024</div>
                  <div class="small text-muted">CyberTower B (Core Wing B)</div>
                </td>
                <td>14th Floor Post-Tensioned Slab</td>
                <td><span class="badge bg-primary">M35 Design Mix</span></td>
                <td>125 mm</td>
                <td class="fw-bold text-dark">26.5 N/mmÂ²</td>
                <td class="text-muted fw-bold">Due 12-Nov-24</td>
                <td class="small text-muted">Req: &gt; 35.0 N/mmÂ²</td>
                <td><span class="badge bg-info text-dark">Pending 28d</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('CUBE-2024-820 M35', {'7-Day Strength': '26.5 N/mmÂ²', 'Status': 'Pending 28d'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">STEEL-2024-114</td>
                <td>
                  <div class="fw-bold text-dark">22-Oct-2024</div>
                  <div class="small text-muted">NH48 Expressway (Vadodara)</div>
                </td>
                <td>Tata Steel 32mm Fe500D Tensile</td>
                <td><span class="badge bg-secondary">Fe500D TMT</span></td>
                <td>--</td>
                <td class="fw-bold text-dark">Yield: 545 N/mmÂ²</td>
                <td class="fw-bold text-success">UTS: 630 N/mmÂ²</td>
                <td class="small text-muted">Elongation: 18.2% (IS 1786)</td>
                <td><span class="badge-status active">Passed (Certified)</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('STEEL-2024-114 Tensile', {'UTS': '630 N/mmÂ²', 'Elongation': '18.2%'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="window.print()"><i class="bi bi-printer"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-danger">NCR-2024-009</td>
                <td>
                  <div class="fw-bold text-dark">24-Oct-2024</div>
                  <div class="small text-muted">Skylark Heights (Podium)</div>
                </td>
                <td>Retaining Wall Segment 4 Honeycombing</td>
                <td><span class="badge bg-danger">Non-Conformance</span></td>
                <td>--</td>
                <td colspan="2" class="text-danger small fw-semibold">Surface vibration defect (Depth 35mm)</td>
                <td class="small text-muted">Non-shrink epoxy grout repair mandated</td>
                <td><span class="badge bg-danger">Open NCR</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('NCR-2024-009 Honeycombing', {'Severity': 'Minor', 'Corrective Action': 'Epoxy Grout Sika 214'})"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn-action-sm edit" onclick="BuildProApp.showToast('Close NCR after signoff', 'info')"><i class="bi bi-check-lg"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Log Cube Test Modal -->
      <div class="modal fade" id="logCubeTestModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-check2-circle text-primary me-2"></i>Log Concrete Cube Strength Test (IS 516)</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="logCubeTestForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label class="form-label">Sample Serial <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="CUBE-2024-821" readonly>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Site / Project <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Skylark Heights - Tower 1</option>
                      <option>CyberTower B - Wing B</option>
                      <option>LogisticHub Pune</option>
                      <option>NH48 Expressway</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Concrete Design Mix Grade</label>
                    <select class="form-select">
                      <option>M35 (Ready Mix Concrete)</option>
                      <option>M40 (High Strength Columns)</option>
                      <option>M45 (Prestressed Infrastructure)</option>
                      <option>M25 (Foundations &amp; Plain Civil)</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Structural Member Poured <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. 28th Floor Shear Wall Core SW-2" required>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Slump at Site (mm)</label>
                    <input type="number" class="form-control" value="130">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">RMC Batch Transit Slip No.</label>
                    <input type="text" class="form-control" placeholder="RMC-9812">
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Casting Date</label>
                    <input type="date" class="form-control" value="2024-10-28">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">7-Day Test Target Date</label>
                    <input type="date" class="form-control" value="2024-11-04">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">28-Day Test Target Date</label>
                    <input type="date" class="form-control" value="2024-11-25">
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Commit Test Record to Lab</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('logCubeTestForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('logCubeTestModal')).hide();
      BuildProApp.showToast('Concrete cube sample registered in QA/QC lab testing register!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
