<?php
$page_title = "Notifications &amp; Site Broadcasts";
$active_page = "notifications-communication";
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
            <span>Site Communication</span>
          </div>
          <h1>System Alerts, Site Broadcasts &amp; Team Notifications</h1>
          <p class="erp-page-desc">Emergency severe weather warnings, critical material buffer triggers, approval alerts and field WhatsApp/SMS broadcast logs.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-erp-primary" data-bs-toggle="modal" data-bs-target="#newBroadcastModal">
            <i class="bi bi-broadcast"></i> Send Site Broadcast
          </button>
          <button type="button" class="btn btn-erp-outline" onclick="BuildProApp.exportTableToCSV('notifications-table', 'BuildPro_System_Broadcasts')">
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
                <div class="erp-stat-title">Active Site Alerts</div>
                <div class="erp-stat-value">4 High Priority</div>
                <div class="erp-stat-trend trend-down"><i class="bi bi-bell-fill text-danger"></i> Material buffer &amp; weather</div>
              </div>
              <div class="erp-stat-icon orange"><i class="bi bi-bell"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">SMS / WhatsApp Gateway</div>
                <div class="erp-stat-value">99.8% Delivery</div>
                <div class="erp-stat-trend trend-up"><i class="bi bi-whatsapp text-success"></i> 4,820 SMS Dispatched MTD</div>
              </div>
              <div class="erp-stat-icon green"><i class="bi bi-chat-dots"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Connected Field Engineers</div>
                <div class="erp-stat-value">64 Devices</div>
                <div class="erp-stat-trend trend-up">Mobile Push Notification Online</div>
              </div>
              <div class="erp-stat-icon primary"><i class="bi bi-phone"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="erp-stat-card">
              <div>
                <div class="erp-stat-title">Automated Workflows</div>
                <div class="erp-stat-value">22 Triggers</div>
                <div class="erp-stat-trend trend-neutral">DPR, RA Bill, Cube Test reminders</div>
              </div>
              <div class="erp-stat-icon purple"><i class="bi bi-gear-wide-connected"></i></div>
            </div>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="erp-toolbar">
          <div class="erp-toolbar-filters">
            <div class="input-group input-group-sm" style="width: 280px;">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" id="table-search-input" class="form-control border-start-0" placeholder="Search notification, priority, recipient...">
            </div>
            <select class="form-select form-select-sm" id="table-status-filter" style="width: 170px;">
              <option value="all">All Priorities</option>
              <option value="Critical">Critical Emergency</option>
              <option value="Warning">Operational Warning</option>
              <option value="Information">General Information</option>
            </select>
          </div>
        </div>

        <!-- Notifications Table -->
        <div class="erp-table-responsive shadow-sm">
          <table class="table erp-table mb-0" id="notifications-table">
            <thead>
              <tr>
                <th>Notice ID</th>
                <th>Timestamp</th>
                <th>Category</th>
                <th>Subject &amp; Message Content</th>
                <th>Target Audience</th>
                <th>Dispatch Channels</th>
                <th>Priority Level</th>
                <th>Delivery Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold text-primary">ALT-2024-118</td>
                <td>Today, 09:15 AM</td>
                <td><span class="badge bg-danger-subtle text-danger">Safety Alert</span></td>
                <td>
                  <div class="fw-bold text-dark">High Wind Squall Warning: High-Rise Tower Crane Operations</div>
                  <div class="small text-muted">IMD weather advisory: Gusts exceeding 45 km/h expected between 2 PM - 6 PM. Tower crane operations to remain suspended.</div>
                </td>
                <td>Skylark Heights &amp; CyberTower Crane Operators</td>
                <td><span class="badge bg-light text-dark border">SMS + Push Notification</span></td>
                <td><span class="badge bg-danger">Critical</span></td>
                <td><span class="badge-status active">Delivered (100%)</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('ALT-2024-118 Weather Warning', {'Subject': 'High Wind Warning', 'Action': 'Suspend Tower Crane', 'Priority': 'Critical'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">ALT-2024-117</td>
                <td>Today, 08:30 AM</td>
                <td><span class="badge bg-warning-subtle text-warning">Material Alert</span></td>
                <td>
                  <div class="fw-bold text-dark">Low Buffer Warning: UltraTech OPC 53 Cement</div>
                  <div class="small text-muted">CyberTower B stock reached 240 bags (Below buffer of 500 bags). Emergency PO-2024-088 triggered.</div>
                </td>
                <td>Procurement Lead &amp; Storekeeper</td>
                <td><span class="badge bg-light text-dark border">In-App + Email</span></td>
                <td><span class="badge bg-warning text-dark">Warning</span></td>
                <td><span class="badge-status active">Acknowledged</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('ALT-2024-117 Cement Stock', {'Item': 'OPC 53 Cement', 'Stock': '240 Bags'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>

              <tr>
                <td class="fw-bold text-primary">ALT-2024-116</td>
                <td>Yesterday, 06:00 PM</td>
                <td><span class="badge bg-info-subtle text-info">Commercial</span></td>
                <td>
                  <div class="fw-bold text-dark">Client RA Bill #07 Certified by Prestige Urban Realty Ltd.</div>
                  <div class="small text-muted">Amount â‚¹ 14,82,00,000 cleared for RTGS credit into escrow current account.</div>
                </td>
                <td>Finance Directorate &amp; Project Director</td>
                <td><span class="badge bg-light text-dark border">In-App Notification</span></td>
                <td><span class="badge bg-info text-dark">Information</span></td>
                <td><span class="badge-status completed">Read</span></td>
                <td class="text-end">
                  <button type="button" class="btn-action-sm view" onclick="BuildProApp.viewDetails('ALT-2024-116 Billing Credit', {'Amount': 'â‚¹ 14.82 Cr', 'Client': 'Prestige Urban'})"><i class="bi bi-eye"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <!-- New Broadcast Modal -->
      <div class="modal fade" id="newBroadcastModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title"><i class="bi bi-broadcast text-primary me-2"></i>Send Multi-Channel Site Broadcast</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="newBroadcastForm">
              <div class="modal-body">
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Target Audience / Project <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>All Construction Sites &amp; Project Teams</option>
                      <option>Skylark Heights Site Team</option>
                      <option>CyberTower B Site Team</option>
                      <option>NH48 Highway Site Team</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Priority Level <span class="text-danger">*</span></label>
                    <select class="form-select" required>
                      <option>Critical Emergency / Weather Alert</option>
                      <option>Operational Warning</option>
                      <option selected>General Site Announcement</option>
                    </select>
                  </div>

                  <div class="col-md-12">
                    <label class="form-label">Broadcast Headline <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Concrete Pouring Scheduled for Sunday Night Shift" required>
                  </div>

                  <div class="col-md-12">
                    <label class="form-label">Message Details <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="3" placeholder="Enter message text for mobile push, email and SMS notifications" required></textarea>
                  </div>

                  <div class="col-md-12">
                    <div class="d-flex gap-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked id="c1">
                        <label class="form-check-label small" for="c1">Mobile App Push Notification</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked id="c2">
                        <label class="form-check-label small" for="c2">Send SMS Broadcast</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked id="c3">
                        <label class="form-check-label small" for="c3">Official Corporate Email</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-erp-primary">Send Multi-Channel Broadcast</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
    document.getElementById('newBroadcastForm').addEventListener('submit', function(e) {
      e.preventDefault();
      bootstrap.Modal.getInstance(document.getElementById('newBroadcastModal')).hide();
      BuildProApp.showToast('Multi-channel broadcast dispatched to 64 staff devices!', 'success');
    });
  </script>

<?php require_once $includes_path . 'footer.php'; ?>
