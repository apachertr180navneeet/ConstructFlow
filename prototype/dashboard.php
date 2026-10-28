<?php
$page_title = "Executive Dashboard";
$active_page = "dashboard";
require_once __DIR__ . '/includes/config.php';
require_once $includes_path . 'header.php';
require_once $includes_path . 'sidebar.php';
?>

<div class="erp-main">
  <?php require_once $includes_path . 'topbar.php'; ?>

  <!-- Page Header -->
  <div class="erp-page-header">
    <div class="erp-page-title-group">
      <div class="erp-breadcrumb">
        <a href="dashboard.php">Home</a>
        <i class="bi bi-chevron-right"></i>
        <span>Executive Dashboard</span>
      </div>
      <h1>Construction Operations Dashboard</h1>
      <p class="erp-page-desc">Consolidated portfolio metrics, cash flows, site productivity and critical approval queues.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
      <a href="projects/project-create.php" class="btn btn-erp-primary">
        <i class="bi bi-plus-circle"></i> New Project
      </a>
      <button type="button" class="btn btn-erp-outline" onclick="window.print()">
        <i class="bi bi-printer"></i> Print Summary
      </button>
    </div>
  </div>

  <!-- Main Content -->
  <main class="erp-content">
    <!-- Top 4 Primary Financial KPI Cards -->
    <div class="row g-3 mb-4">
      <div class="col-sm-6 col-xl-3">
        <div class="erp-stat-card">
          <div>
            <div class="erp-stat-title">Total Contract Value</div>
            <div class="erp-stat-value">₹ 806.25 Cr</div>
            <div class="erp-stat-trend trend-up">
              <i class="bi bi-arrow-up-right"></i> 4 Active Mega Projects
            </div>
          </div>
          <div class="erp-stat-icon primary">
            <i class="bi bi-buildings"></i>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="erp-stat-card">
          <div>
            <div class="erp-stat-title">Budget vs Actual Spend</div>
            <div class="erp-stat-value">₹ 430.30 Cr</div>
            <div class="erp-stat-trend trend-neutral">
              <span>Approved: ₹ 702.00 Cr (61%)</span>
            </div>
          </div>
          <div class="erp-stat-icon purple">
            <i class="bi bi-cash-stack"></i>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="erp-stat-card">
          <div>
            <div class="erp-stat-title">Accounts Receivable (Clients)</div>
            <div class="erp-stat-value">₹ 48.75 Cr</div>
            <div class="erp-stat-trend trend-up">
              <i class="bi bi-arrow-down-left"></i> RA Bills Certified
            </div>
          </div>
          <div class="erp-stat-icon green">
            <i class="bi bi-wallet2"></i>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="erp-stat-card">
          <div>
            <div class="erp-stat-title">Accounts Payable (Suppliers)</div>
            <div class="erp-stat-value">₹ 32.10 Cr</div>
            <div class="erp-stat-trend trend-down">
              <i class="bi bi-exclamation-circle"></i> Due within 30 days
            </div>
          </div>
          <div class="erp-stat-icon orange">
            <i class="bi bi-truck"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- 4 Secondary Operational KPI Cards -->
    <div class="row g-3 mb-4">
      <div class="col-6 col-lg-3">
        <div class="card p-3 border shadow-sm h-100 bg-white">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="text-muted small fw-semibold">Active Site Wings</span>
              <div class="fs-4 fw-bold text-dark mt-1">15 Zones</div>
              <div class="small text-muted">Across 4 States</div>
            </div>
            <div class="text-primary bg-primary-subtle p-3 rounded-circle"><i class="bi bi-geo-alt fs-5"></i></div>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3">
        <div class="card p-3 border shadow-sm h-100 bg-white">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="text-muted small fw-semibold">Today's Manpower</span>
              <div class="fs-4 fw-bold text-dark mt-1">1,397 Labour</div>
              <div class="small text-success fw-semibold"><i class="bi bi-check-circle"></i> 98.4% Muster Present</div>
            </div>
            <div class="text-success bg-success-subtle p-3 rounded-circle"><i class="bi bi-people fs-5"></i></div>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3">
        <div class="card p-3 border shadow-sm h-100 bg-white">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="text-muted small fw-semibold">Pending Approvals</span>
              <div class="fs-4 fw-bold text-danger mt-1">14 Items</div>
              <div class="small text-danger fw-semibold"><i class="bi bi-clock-history"></i> 5 Critical POs</div>
            </div>
            <div class="text-danger bg-danger-subtle p-3 rounded-circle"><i class="bi bi-diagram-3 fs-5"></i></div>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3">
        <div class="card p-3 border shadow-sm h-100 bg-white">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="text-muted small fw-semibold">Low Stock Warnings</span>
              <div class="fs-4 fw-bold text-warning mt-1">3 Materials</div>
              <div class="small text-muted">Cement &amp; TMT 16mm</div>
            </div>
            <div class="text-warning bg-warning-subtle p-3 rounded-circle"><i class="bi bi-boxes fs-5"></i></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts Section -->
    <div class="row g-3 mb-4">
      <div class="col-lg-8">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title">
              <i class="bi bi-graph-up text-primary"></i> Monthly Cash Flow: Client Billing vs Expenditure (FY 2024-25)
            </h5>
            <span class="badge bg-light text-dark border">₹ in Crores</span>
          </div>
          <div class="erp-card-body">
            <canvas id="cashflowChart" height="110"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title">
              <i class="bi bi-pie-chart text-warning"></i> Portfolio Cost Distribution
            </h5>
            <span class="badge bg-light text-muted border">Civil &amp; Finishes</span>
          </div>
          <div class="erp-card-body d-flex flex-column justify-content-center">
            <canvas id="costBreakdownChart" height="200"></canvas>
            <div class="mt-3 small text-muted text-center">
              Civil Structure: <strong>48%</strong> &bull; MEP: <strong>22%</strong> &bull; Finishing: <strong>18%</strong> &bull; Plant: <strong>12%</strong>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Projects Overview Table -->
    <div class="erp-card mb-4">
      <div class="erp-card-header">
        <h5 class="erp-card-title">
          <i class="bi bi-building-check text-primary"></i> Active Construction Projects Overview
        </h5>
        <div class="d-flex gap-2">
          <a href="projects/project-list.php" class="btn btn-sm btn-erp-outline">Full Directory &rarr;</a>
        </div>
      </div>
      <div class="erp-card-body p-0">
        <div class="erp-table-responsive">
          <table class="table erp-table mb-0" id="dashboard-project-table">
            <thead>
              <tr>
                <th>Project Code &amp; Name</th>
                <th>Client / Developer</th>
                <th>Contract Value</th>
                <th>Progress %</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($erp_projects as $p): ?>
                <tr>
                  <td>
                    <div class="fw-bold text-dark"><?= htmlspecialchars($p['id']) ?></div>
                    <div class="small text-muted"><?= htmlspecialchars($p['name']) ?> (<?= htmlspecialchars($p['location']) ?>)</div>
                  </td>
                  <td><?= htmlspecialchars($p['client']) ?></td>
                  <td class="fw-bold"><?= htmlspecialchars($p['value']) ?></td>
                  <td style="min-width: 140px;">
                    <div class="d-flex justify-content-between small fw-semibold mb-1">
                      <span><?= $p['progress'] ?>%</span>
                      <span class="text-success">Active</span>
                    </div>
                    <div class="erp-progress">
                      <div class="erp-progress-bar bg-success" style="width: <?= $p['progress'] ?>%;"></div>
                    </div>
                  </td>
                  <td><span class="badge-status active">Active</span></td>
                  <td class="text-end">
                    <a href="projects/project-details.php?id=<?= $p['id'] ?>" class="btn-action-sm view" title="View 360 Details"><i class="bi bi-eye"></i></a>
                    <a href="projects/project-create.php?edit=<?= $p['id'] ?>" class="btn-action-sm edit" title="Edit Specs"><i class="bi bi-pencil"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Lower Section: Upcoming Milestones & Recent Site Activities -->
    <div class="row g-3">
      <!-- Upcoming Milestones -->
      <div class="col-lg-6">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title">
              <i class="bi bi-flag text-danger"></i> Upcoming Critical Milestones
            </h5>
            <a href="modules/planning-scheduling.php" class="small text-primary text-decoration-none">Full Gantt &rarr;</a>
          </div>
          <div class="erp-card-body p-0">
            <div class="list-group list-group-flush small">
              <div class="list-group-item d-flex justify-content-between align-items-center p-3">
                <div>
                  <div class="fw-bold text-dark">Tower 2 : 28th Floor RCC Slab Pouring (420 Cum M35)</div>
                  <div class="text-muted">Skylark Heights &bull; Target: <strong>30-Oct-2024</strong></div>
                </div>
                <span class="badge bg-warning text-dark">In 2 Days</span>
              </div>
              <div class="list-group-item d-flex justify-content-between align-items-center p-3">
                <div>
                  <div class="fw-bold text-dark">NH48 Flyover : Segmental Girder Launching P-14 to P-15</div>
                  <div class="text-muted">NH48 Expressway &bull; Target: <strong>04-Nov-2024</strong></div>
                </div>
                <span class="badge bg-info text-dark">In 7 Days</span>
              </div>
              <div class="list-group-item d-flex justify-content-between align-items-center p-3">
                <div>
                  <div class="fw-bold text-dark">Facade Glazing Inspection &amp; Wind Load Water Test</div>
                  <div class="text-muted">CyberTower B &bull; Target: <strong>12-Nov-2024</strong></div>
                </div>
                <span class="badge bg-light text-muted border">Planned</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Site Activities / DPR Stream -->
      <div class="col-lg-6">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title">
              <i class="bi bi-clock-history text-success"></i> Live Field Operations Stream
            </h5>
            <a href="modules/daily-progress.php" class="small text-primary text-decoration-none">View DPR Log &rarr;</a>
          </div>
          <div class="erp-card-body p-0">
            <div class="list-group list-group-flush small">
              <div class="list-group-item p-3">
                <div class="d-flex justify-content-between text-muted" style="font-size:0.75rem;">
                  <span class="fw-bold text-primary">Skylark Heights - Site Wing A</span>
                  <span>15 mins ago</span>
                </div>
                <div class="fw-semibold text-dark mt-1">Ready Mix Concrete (RMC) Dispatch Received</div>
                <div class="text-muted">4 Transit Mixers (32 Cum) unloaded for 27th floor column casting. Slump: 130mm certified.</div>
              </div>
              <div class="list-group-item p-3">
                <div class="d-flex justify-content-between text-muted" style="font-size:0.75rem;">
                  <span class="fw-bold text-danger">NH48 Elevated Package 3</span>
                  <span>42 mins ago</span>
                </div>
                <div class="fw-semibold text-dark mt-1">Daily Safety Toolbox Talk Conducted</div>
                <div class="text-muted">Attended by 185 workers on Pier 12. Topic: Working at heights &amp; safety harness.</div>
              </div>
              <div class="list-group-item p-3">
                <div class="d-flex justify-content-between text-muted" style="font-size:0.75rem;">
                  <span class="fw-bold text-warning">CyberTower B - Store Hub</span>
                  <span>2 hours ago</span>
                </div>
                <div class="fw-semibold text-dark mt-1">Material GRN-2024-419 Generated</div>
                <div class="text-muted">Received 42 MT of Fe500D TMT Rebars from Tata Steel Ltd.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (typeof Chart !== 'undefined') {
        var ctx1 = document.getElementById('cashflowChart');
        if (ctx1) {
          new Chart(ctx1, {
            type: 'bar',
            data: {
              labels: ['May 24', 'Jun 24', 'Jul 24', 'Aug 24', 'Sep 24', 'Oct 24 (Live)'],
              datasets: [
                {
                  label: 'Certified Client Billing (₹ Cr)',
                  data: [38.5, 42.0, 48.2, 51.0, 56.4, 62.1],
                  backgroundColor: '#1e3a8a',
                  borderRadius: 4
                },
                {
                  label: 'Site Expenditure (₹ Cr)',
                  data: [32.1, 36.8, 41.5, 44.2, 49.0, 53.8],
                  backgroundColor: '#ea580c',
                  borderRadius: 4
                }
              ]
            },
            options: {
              responsive: true,
              plugins: { legend: { position: 'top' } },
              scales: {
                y: {
                  beginAtZero: true,
                  ticks: { callback: function(val) { return '₹ ' + val + ' Cr'; } }
                }
              }
            }
          });
        }

        var ctx2 = document.getElementById('costBreakdownChart');
        if (ctx2) {
          new Chart(ctx2, {
            type: 'doughnut',
            data: {
              labels: ['Civil Structure', 'MEP & HVAC', 'Finishing & Glazing', 'Heavy Machinery'],
              datasets: [{
                data: [48, 22, 18, 12],
                backgroundColor: ['#1e3a8a', '#ea580c', '#059669', '#d97706'],
                borderWidth: 2,
                borderColor: '#ffffff'
              }]
            },
            options: {
              responsive: true,
              plugins: { legend: { position: 'bottom' } },
              cutout: '65%'
            }
          });
        }
      }
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
