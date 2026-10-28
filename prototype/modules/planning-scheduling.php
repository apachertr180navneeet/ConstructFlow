<?php
$page_title = "Planning &amp; Scheduling";
$active_page = "planning-scheduling";
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
            <span>Projects &amp; Sites</span>
            <i class="bi bi-chevron-right"></i>
            <span>Planning &amp; Scheduling</span>
          </div>
          <h1>Project Planning, Scheduling &amp; Critical Path (CPM)</h1>
          <p class="erp-page-desc">Master Work Breakdown Structure (WBS), CPM critical path, milestone tracking and baseline variance analysis.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
            <i class="bi bi-plus-circle"></i> Add WBS Task
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('schedule-table', 'BuildPro_Schedule_WBS')">
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
                <div class="erp-stat-title">Overall Schedule Health</div>
                <div class="erp-stat-value">94.2% SPI</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-check-circle"></i> +4 Days Ahead of Baseline</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-calendar-check"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Critical Path (CPM) Tasks</div>
                <div class="erp-stat-value">18 Tasks</div>
                <div class="erp-stat-trend trend-neutral"><i class="bi bi-exclamation-triangle"></i> Zero Float Tolerance</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-diagram-2"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Completed Milestones</div>
                <div class="erp-stat-value">4 / 6 Key</div>
                <div class="erp-stat-trend trend-up">Next: Terrace Slab (15-Dec)</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-flag"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Stipulated Completion</div>
                <div class="erp-stat-value">30-Jun-2025</div>
                <div class="erp-stat-trend trend-neutral">245 Days Remaining</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-hourglass-bottom"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search WBS code, task name, trade...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All WBS Tasks</option>
              <option value="Critical">Critical Path Only</option>
              <option value="In-Progress">In-Progress</option>
              <option value="Completed">Completed</option>
            </select>
          </div>
        </div>

        <!-- Schedule / WBS Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="schedule-table">
            <thead>
              <tr>
                <th>WBS Code</th>
                <th>Task Description &amp; Trade Package</th>
                <th>Duration</th>
                <th>Baseline Start</th>
                <th>Baseline Finish</th>
                <th>Actual Start</th>
                <th>Progress %</th>
                <th>Critical?</th>
                <th>Variance</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">WBS 1.1</td>
                <td>
                  <div class="fw-bold text-dark">Site Mobilization, Temporary Power &amp; Water Supply</div>
                  <div class="small text-muted">Trade: Site Infrastructure</div>
                </td>
                <td>30 Days</td>
                <td>15-Jan-2023</td>
                <td>14-Feb-2023</td>
                <td>15-Jan-2023</td>
                <td style="min-width: 100px;">
                  <div class="d-flex justify-content-between small fw-bold mb-1">100%</div>
                  <div class="erp-progress"><div class="erp-progress-bar bg-success" style="width: 100%;"></div></div>
                </td>
                <td><span class="badge bg-light text-muted border">No</span></td>
                <td><span class="text-success small fw-bold">0 Days</span></td>
                <td><span class="badge-status completed">Completed</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('WBS 1.1 Mobilization', {'Status': 'Completed', 'Progress': '100%'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">WBS 2.1</td>
                <td>
                  <div class="fw-bold text-dark">Basement Excavation &amp; Secant Retention Piling (3 Basements)</div>
                  <div class="small text-muted">Trade: Heavy Civil Foundation</div>
                </td>
                <td>75 Days</td>
                <td>15-Feb-2023</td>
                <td>30-Apr-2023</td>
                <td>10-Feb-2023</td>
                <td style="min-width: 100px;">
                  <div class="d-flex justify-content-between small fw-bold mb-1">100%</div>
                  <div class="erp-progress"><div class="erp-progress-bar bg-success" style="width: 100%;"></div></div>
                </td>
                <td><span class="badge bg-danger text-white">Critical Path</span></td>
                <td><span class="text-success small fw-bold">-6 Days (Early)</span></td>
                <td><span class="badge-status completed">Completed</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('WBS 2.1 Piling', {'Status': 'Completed', 'Progress': '100%'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">WBS 3.4</td>
                <td>
                  <div class="fw-bold text-dark">Tower 1 &amp; 2 Superstructure RCC Slab Casting (25th to 28th Floor)</div>
                  <div class="small text-muted">Trade: Mivan Aluminium Formwork &amp; RMC</div>
                </td>
                <td>60 Days</td>
                <td>15-Aug-2024</td>
                <td>15-Oct-2024</td>
                <td>16-Aug-2024</td>
                <td style="min-width: 100px;">
                  <div class="d-flex justify-content-between small fw-bold mb-1">100%</div>
                  <div class="erp-progress"><div class="erp-progress-bar bg-success" style="width: 100%;"></div></div>
                </td>
                <td><span class="badge bg-danger text-white">Critical Path</span></td>
                <td><span class="text-danger small fw-bold">+3 Days (Delayed)</span></td>
                <td><span class="badge-status completed">Completed</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('WBS 3.4 RCC Superstructure', {'Status': 'Completed'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">WBS 3.5</td>
                <td>
                  <div class="fw-bold text-dark">Tower 1 &amp; 2 Superstructure RCC Slab Casting (29th to 32nd Terrace)</div>
                  <div class="small text-muted">Trade: Mivan Aluminium Formwork &amp; RMC</div>
                </td>
                <td>60 Days</td>
                <td>16-Oct-2024</td>
                <td>15-Dec-2024</td>
                <td>19-Oct-2024</td>
                <td style="min-width: 100px;">
                  <div class="d-flex justify-content-between small fw-bold mb-1">28%</div>
                  <div class="erp-progress"><div class="erp-progress-bar bg-warning" style="width: 28%;"></div></div>
                </td>
                <td><span class="badge bg-danger text-white">Critical Path</span></td>
                <td><span class="text-warning small fw-bold">Active Float 0d</span></td>
                <td><span class="badge-status in-progress">In-Progress</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('WBS 3.5 Terrace Slabs', {'Progress': '28%', 'Target': '15-Dec-2024'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">WBS 4.2</td>
                <td>
                  <div class="fw-bold text-dark">External Facade Double Glazed Glass Curtain Wall Installation</div>
                  <div class="small text-muted">Trade: Glazing &amp; ACP Cladding</div>
                </td>
                <td>120 Days</td>
                <td>01-Nov-2024</td>
                <td>28-Feb-2025</td>
                <td>--</td>
                <td style="min-width: 100px;">
                  <div class="d-flex justify-content-between small fw-bold mb-1">0%</div>
                  <div class="erp-progress"><div class="erp-progress-bar bg-secondary" style="width: 0%;"></div></div>
                </td>
                <td><span class="badge bg-light text-muted border">Float: 14d</span></td>
                <td><span class="text-muted small">Upcoming</span></td>
                <td><span class="badge-status draft">Upcoming</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('WBS 4.2 Facade', {'Status': 'Upcoming'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- Add WBS Task Modal -->
      <div class="modal fade" id="addTaskModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-calendar-plus text-primary me-2"></i>Add Schedule WBS Activity</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addTaskForm">
              <div class="modal-body">
                <div class="row g-2 mb-3">
                  <div class="col-4">
                    <label class="form-label">WBS Code</label>
                    <input type="text" class="form-control" value="WBS 4.3" required>
                  </div>
                  <div class="col-8">
                    <label class="form-label">Duration (Days)</label>
                    <input type="number" class="form-control" value="45" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Task Activity Title <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="e.g. Fire Fighting Piping &amp; Sprinkler Installation" required>
                </div>
                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label class="form-label">Baseline Start</label>
                    <input type="date" class="form-control" value="2024-11-01">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Baseline Finish</label>
                    <input type="date" class="form-control" value="2024-12-15">
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="isCritical">
                  <label class="form-check-label small fw-bold text-danger" for="isCritical">Flag as Critical Path (CPM) Activity</label>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Save Activity</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('addTaskForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('addTaskModal')).hide();
      BuildProApp.showToast('WBS task inserted into master project schedule!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
