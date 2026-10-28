<header class="erp-topbar" id="app-topbar">
  <div class="erp-topbar-left">
    <button class="erp-topbar-toggle" id="btn-toggle-menu" title="Menu">
      <i class="bi bi-list fs-5"></i>
    </button>

    <!-- Global Project Selector -->
    <div class="erp-project-selector d-none d-md-block">
      <select class="form-select form-select-sm" id="global-project-select" onchange="window.location.search = '?switch_project=' + this.value" title="Active Construction Project">
        <?php foreach ($erp_projects as $p): ?>
          <option value="<?= $p['id'] ?>" <?= ($p['id'] === $current_project) ? 'selected' : '' ?>>
            <?= $p['id'] ?> : <?= htmlspecialchars($p['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="erp-topbar-right">
    <!-- Quick Search Trigger -->
    <div class="erp-search-trigger d-none d-sm-flex" id="search-bar-trigger">
      <i class="bi bi-search"></i>
      <span>Quick search modules, BOQ, POs...</span>
      <span class="kbd-shortcut ms-2">Ctrl+K</span>
    </div>

    <!-- Quick Action Dropdown -->
    <div class="dropdown">
      <button class="btn btn-sm btn-erp-accent dropdown-toggle d-flex align-items-center gap-1" type="button" data-bs-toggle="dropdown">
        <i class="bi bi-plus-lg"></i> <span class="d-none d-md-inline">Quick Action</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow-sm">
        <li><h6 class="dropdown-header">Operations Shortcuts</h6></li>
        <li><a class="dropdown-item" href="<?= $root_path ?>projects/project-create.php"><i class="bi bi-plus-circle me-2 text-primary"></i>New Project</a></li>
        <li><a class="dropdown-item" href="<?= $root_path ?>modules/procurement.php#create-po"><i class="bi bi-cart-plus me-2 text-warning"></i>Create Purchase Order</a></li>
        <li><a class="dropdown-item" href="<?= $root_path ?>modules/daily-progress.php#create-dpr"><i class="bi bi-journal-plus me-2 text-success"></i>Daily Site Report (DPR)</a></li>
        <li><a class="dropdown-item" href="<?= $root_path ?>modules/client-billing.php#create-bill"><i class="bi bi-receipt me-2 text-info"></i>Generate RA Bill</a></li>
        <li><a class="dropdown-item" href="<?= $root_path ?>modules/safety-compliance.php#report-incident"><i class="bi bi-shield-plus me-2 text-danger"></i>Report Safety Incident</a></li>
      </ul>
    </div>

    <!-- Notification Dropdown -->
    <div class="dropdown">
      <button class="erp-topbar-btn" type="button" data-bs-toggle="dropdown" title="Notifications">
        <i class="bi bi-bell"></i>
        <span class="erp-badge-dot"></span>
      </button>
      <div class="dropdown-menu dropdown-menu-end shadow-lg p-0" style="width: 330px;">
        <div class="p-3 border-bottom d-flex justify-content-between align-items-center bg-light rounded-top">
          <h6 class="mb-0 fw-bold">Live Site Alerts</h6>
          <span class="badge bg-danger rounded-pill">4 New</span>
        </div>
        <div class="list-group list-group-flush small" style="max-height: 280px; overflow-y: auto;">
          <a href="<?= $root_path ?>modules/procurement.php" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between text-muted" style="font-size:0.7rem;"><span>Procurement</span><span>10m ago</span></div>
            <div class="fw-semibold text-dark mt-1">PO-2024-089 Pending Approval</div>
            <div class="text-secondary small">500 MT TMT Bars for Skylark Heights</div>
          </a>
          <a href="<?= $root_path ?>modules/inventory-materials.php" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between text-muted" style="font-size:0.7rem;"><span class="text-danger fw-bold">Low Stock Warning</span><span>35m ago</span></div>
            <div class="fw-semibold text-dark mt-1">OPC 53 Cement below buffer</div>
            <div class="text-secondary small">Current stock: 240 bags at CyberTower B</div>
          </a>
          <a href="<?= $root_path ?>modules/client-billing.php" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between text-muted" style="font-size:0.7rem;"><span>Billing</span><span>2h ago</span></div>
            <div class="fw-semibold text-dark mt-1">RA Bill #07 Certified by PMC</div>
            <div class="text-secondary small">₹ 1,48,20,000 received for Prestige Urban</div>
          </a>
        </div>
        <div class="p-2 text-center border-top bg-light rounded-bottom">
          <a href="<?= $root_path ?>modules/notifications-communication.php" class="text-decoration-none small fw-semibold text-primary">View All System Broadcasts</a>
        </div>
      </div>
    </div>

    <!-- User Profile Dropdown -->
    <div class="dropdown">
      <div class="erp-user-profile" data-bs-toggle="dropdown">
        <div class="erp-avatar"><?= htmlspecialchars($current_user['avatar'] ?? 'NK') ?></div>
        <div class="d-none d-lg-block text-start">
          <div class="fw-bold small text-dark lh-1"><?= htmlspecialchars($current_user['name'] ?? 'Navneet Kumar') ?></div>
          <div class="text-muted" style="font-size:0.72rem;"><?= htmlspecialchars($current_user['role'] ?? 'Senior Project Director') ?></div>
        </div>
        <i class="bi bi-chevron-down text-muted small ms-1"></i>
      </div>
      <ul class="dropdown-menu dropdown-menu-end shadow-sm">
        <li class="px-3 py-2 border-bottom">
          <div class="fw-bold"><?= htmlspecialchars($current_user['name'] ?? 'Navneet Kumar') ?></div>
          <div class="text-muted small"><?= htmlspecialchars($current_user['email'] ?? 'navneet@buildpro-erp.in') ?></div>
          <div class="badge bg-primary-subtle text-primary mt-1"><?= htmlspecialchars($current_user['role'] ?? 'Super Admin') ?></div>
        </li>
        <li><a class="dropdown-item" href="<?= $root_path ?>administration/company-settings.php"><i class="bi bi-buildings me-2"></i>Company Profile</a></li>
        <li><a class="dropdown-item" href="<?= $root_path ?>administration/users-roles-permissions.php"><i class="bi bi-shield-check me-2"></i>Access Control &amp; Roles</a></li>
        <li><a class="dropdown-item" href="<?= $root_path ?>modules/integrations-audit-backup.php"><i class="bi bi-clock-history me-2"></i>Security Audit Log</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger fw-semibold" href="<?= $root_path ?>logout.php"><i class="bi bi-box-arrow-right me-2"></i>Sign Out</a></li>
      </ul>
    </div>
  </div>
</header>
