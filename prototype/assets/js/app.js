/**
 * BuildPro Construction ERP - Core Application Engine
 * Handles layout rendering, sidebar state, global search, project switching,
 * table filtering, CSV exports, modal interactions, and notifications.
 */

window.BuildProApp = (function() {
  'use strict';

  var rootPath = './';
  var activePage = 'dashboard';
  var currentProject = 'PRJ-2024-001';

  function init() {
    rootPath = document.body.getAttribute('data-root') || './';
    activePage = document.body.getAttribute('data-page') || 'dashboard';

    // Retrieve stored preferences
    if (localStorage.getItem('buildpro_sidebar_collapsed') === 'true') {
      document.body.classList.add('sidebar-collapsed');
    }
    if (localStorage.getItem('buildpro_current_project')) {
      currentProject = localStorage.getItem('buildpro_current_project');
    }

    renderSidebar();
    renderTopbar();
    renderFooter();
    renderGlobalSearchModal();
    renderDetailModal();
    renderDeleteModal();
    renderToastContainer();
    bindEvents();
    autoBindPageTables();
  }

  function renderSidebar() {
    var sidebarEl = document.getElementById('app-sidebar');
    if (!sidebarEl || sidebarEl.children.length > 0) return;

    var navGroups = window.BuildProData ? window.BuildProData.navigationGroups : [];
    var html = '';

    // Header / Brand
    html += '<div class="erp-sidebar-header">';
    html += '  <a href="' + rootPath + 'dashboard.php" class="erp-brand">';
    html += '    <div class="erp-brand-icon"><i class="bi bi-cone-striped"></i></div>';
    html += '    <div class="erp-brand-text">';
    html += '      <span class="erp-brand-title">BuildPro ERP</span>';
    html += '      <span class="erp-brand-subtitle">Construction Cloud</span>';
    html += '    </div>';
    html += '  </a>';
    html += '</div>';

    // Navigation Items
    html += '<nav class="erp-sidebar-nav">';
    navGroups.forEach(function(group) {
      html += '<div class="erp-nav-section-title">' + group.title + '</div>';
      group.items.forEach(function(item) {
        var isActive = (item.code === activePage || (activePage === 'dashboard' && item.code === 'dashboard'));
        var linkUrl = rootPath + item.path;
        html += '<div class="erp-nav-item">';
        html += '  <a href="' + linkUrl + '" class="erp-nav-link ' + (isActive ? 'active' : '') + '">';
        html += '    <i class="bi ' + item.icon + '"></i>';
        html += '    <span>' + item.label + '</span>';
        if (item.badge) {
          var badgeClass = item.badge === 'Live' ? 'bg-success' : (item.badge === 'Today' ? 'bg-warning text-dark' : 'bg-primary');
          html += '    <span class="erp-nav-badge badge ' + badgeClass + '">' + item.badge + '</span>';
        }
        html += '  </a>';
        html += '</div>';
      });
    });
    html += '</nav>';

    // Footer
    html += '<div class="erp-sidebar-footer">';
    html += '  <div class="footer-text">';
    html += '    <div class="small fw-semibold text-white">BuildPro Construction</div>';
    html += '    <div class="text-secondary" style="font-size:0.7rem;">v3.4.2 Enterprise</div>';
    html += '  </div>';
    html += '  <button type="button" class="btn btn-sm btn-outline-secondary text-light border-0 py-0 px-1" id="btn-sidebar-collapse" title="Toggle Sidebar">';
    html += '    <i class="bi bi-chevron-bar-left"></i>';
    html += '  </button>';
    html += '</div>';

    sidebarEl.innerHTML = html;
  }

  function renderTopbar() {
    var topbarEl = document.getElementById('app-topbar');
    if (!topbarEl || topbarEl.children.length > 0) return;

    var projects = window.BuildProData ? window.BuildProData.projects : [];
    var html = '';

    html += '<div class="erp-topbar-left">';
    html += '  <button class="erp-topbar-toggle" id="btn-toggle-menu" title="Menu">';
    html += '    <i class="bi bi-list fs-5"></i>';
    html += '  </button>';

    // Project selector
    html += '  <div class="erp-project-selector d-none d-md-block">';
    html += '    <select class="form-select form-select-sm" id="global-project-select" title="Active Construction Project">';
    projects.forEach(function(p) {
      var selected = (p.id === currentProject) ? 'selected' : '';
      html += '    <option value="' + p.id + '" ' + selected + '>' + p.id + ' : ' + p.name + '</option>';
    });
    html += '    </select>';
    html += '  </div>';
    html += '</div>';

    html += '<div class="erp-topbar-right">';

    // Quick Search Trigger
    html += '  <div class="erp-search-trigger d-none d-sm-flex" id="search-bar-trigger">';
    html += '    <i class="bi bi-search"></i>';
    html += '    <span>Quick search modules, BOQ, POs...</span>';
    html += '    <span class="kbd-shortcut ms-2">Ctrl+K</span>';
    html += '  </div>';

    // Quick Action Dropdown
    html += '  <div class="dropdown">';
    html += '    <button class="btn btn-sm btn-erp-accent dropdown-toggle d-flex align-items-center gap-1" type="button" data-bs-toggle="dropdown">';
    html += '      <i class="bi bi-plus-lg"></i> <span class="d-none d-md-inline">Quick Action</span>';
    html += '    </button>';
    html += '    <ul class="dropdown-menu dropdown-menu-end shadow-sm">';
    html += '      <li><h6 class="dropdown-header">Operations Shortcuts</h6></li>';
    html += '      <li><a class="dropdown-item" href="' + rootPath + 'projects/project-create.php"><i class="bi bi-plus-circle me-2 text-primary"></i>New Project</a></li>';
    html += '      <li><a class="dropdown-item" href="' + rootPath + 'modules/procurement.php#create-po"><i class="bi bi-cart-plus me-2 text-warning"></i>Create Purchase Order</a></li>';
    html += '      <li><a class="dropdown-item" href="' + rootPath + 'modules/daily-progress.php#create-dpr"><i class="bi bi-journal-plus me-2 text-success"></i>Daily Site Report (DPR)</a></li>';
    html += '      <li><a class="dropdown-item" href="' + rootPath + 'modules/client-billing.php#create-bill"><i class="bi bi-receipt me-2 text-info"></i>Generate RA Bill</a></li>';
    html += '      <li><a class="dropdown-item" href="' + rootPath + 'modules/safety-compliance.php#report-incident"><i class="bi bi-shield-plus me-2 text-danger"></i>Report Safety Incident</a></li>';
    html += '      <li><hr class="dropdown-divider"></li>';
    html += '      <li><a class="dropdown-item text-muted" href="javascript:BuildProApp.resetDemoData()"><i class="bi bi-arrow-counterclockwise me-2"></i>Reset Demo Cache</a></li>';
    html += '    </ul>';
    html += '  </div>';

    // Notification Dropdown
    html += '  <div class="dropdown">';
    html += '    <button class="erp-topbar-btn" type="button" data-bs-toggle="dropdown" title="Notifications">';
    html += '      <i class="bi bi-bell"></i>';
    html += '      <span class="erp-badge-dot"></span>';
    html += '    </button>';
    html += '    <div class="dropdown-menu dropdown-menu-end shadow-lg p-0" style="width: 330px;">';
    html += '      <div class="p-3 border-bottom d-flex justify-content-between align-items-center bg-light rounded-top">';
    html += '        <h6 class="mb-0 fw-bold">Live Site Alerts</h6>';
    html += '        <span class="badge bg-danger rounded-pill">4 New</span>';
    html += '      </div>';
    html += '      <div class="list-group list-group-flush small" style="max-height: 280px; overflow-y: auto;">';
    html += '        <a href="' + rootPath + 'modules/procurement.php" class="list-group-item list-group-item-action">';
    html += '          <div class="d-flex w-100 justify-content-between text-muted" style="font-size:0.7rem;"><span>Procurement</span><span>10m ago</span></div>';
    html += '          <div class="fw-semibold text-dark mt-1">PO-2024-089 Pending Approval</div>';
    html += '          <div class="text-secondary small">500 MT TMT Bars for Skylark Heights</div>';
    html += '        </a>';
    html += '        <a href="' + rootPath + 'modules/inventory-materials.php" class="list-group-item list-group-item-action">';
    html += '          <div class="d-flex w-100 justify-content-between text-muted" style="font-size:0.7rem;"><span class="text-danger fw-bold">Low Stock Warning</span><span>35m ago</span></div>';
    html += '          <div class="fw-semibold text-dark mt-1">OPC 53 Cement below buffer</div>';
    html += '          <div class="text-secondary small">Current stock: 240 bags at CyberTower B</div>';
    html += '        </a>';
    html += '        <a href="' + rootPath + 'modules/client-billing.php" class="list-group-item list-group-item-action">';
    html += '          <div class="d-flex w-100 justify-content-between text-muted" style="font-size:0.7rem;"><span>Billing</span><span>2h ago</span></div>';
    html += '          <div class="fw-semibold text-dark mt-1">RA Bill #07 Certified by PMC</div>';
    html += '          <div class="text-secondary small">₹ 1,48,20,000 received for Prestige Urban</div>';
    html += '        </a>';
    html += '      </div>';
    html += '      <div class="p-2 text-center border-top bg-light rounded-bottom">';
    html += '        <a href="' + rootPath + 'modules/notifications-communication.php" class="text-decoration-none small fw-semibold text-primary">View All System Broadcasts</a>';
    html += '      </div>';
    html += '    </div>';
    html += '  </div>';

    // User Profile Dropdown
    html += '  <div class="dropdown">';
    html += '    <div class="erp-user-profile" data-bs-toggle="dropdown">';
    html += '      <div class="erp-avatar">NK</div>';
    html += '      <div class="d-none d-lg-block text-start">';
    html += '        <div class="fw-bold small text-dark lh-1">Navneet Kumar</div>';
    html += '        <div class="text-muted" style="font-size:0.72rem;">Senior Project Director</div>';
    html += '      </div>';
    html += '      <i class="bi bi-chevron-down text-muted small ms-1"></i>';
    html += '    </div>';
    html += '    <ul class="dropdown-menu dropdown-menu-end shadow-sm">';
    html += '      <li class="px-3 py-2 border-bottom">';
    html += '        <div class="fw-bold">Navneet Kumar</div>';
    html += '        <div class="text-muted small">navneet@buildpro-erp.in</div>';
    html += '        <div class="badge bg-primary-subtle text-primary mt-1">Super Admin / PMC</div>';
    html += '      </li>';
    html += '      <li><a class="dropdown-item" href="' + rootPath + 'administration/company-settings.php"><i class="bi bi-buildings me-2"></i>Company Profile</a></li>';
    html += '      <li><a class="dropdown-item" href="' + rootPath + 'administration/users-roles-permissions.php"><i class="bi bi-shield-check me-2"></i>Access Control & Roles</a></li>';
    html += '      <li><a class="dropdown-item" href="' + rootPath + 'modules/integrations-audit-backup.php"><i class="bi bi-clock-history me-2"></i>Security Audit Log</a></li>';
    html += '      <li><hr class="dropdown-divider"></li>';
    html += '      <li><a class="dropdown-item text-danger" href="' + rootPath + 'index.php"><i class="bi bi-box-arrow-right me-2"></i>Exit Prototype / Portal</a></li>';
    html += '    </ul>';
    html += '  </div>';

    html += '</div>';

    topbarEl.innerHTML = html;
  }

  function renderFooter() {
    var footerEl = document.getElementById('app-footer');
    if (!footerEl || footerEl.children.length > 0) return;

    var html = '';
    html += '<div>';
    html += '  <span class="fw-semibold text-dark">BuildPro Construction Management ERP</span> &copy; ' + new Date().getFullYear() + ' BuildPro Construction Pvt. Ltd. | All rights reserved.';
    html += '</div>';
    html += '<div class="d-flex align-items-center gap-3">';
    html += '  <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="bi bi-shield-check me-1"></i>ISO 9001:2015</span>';
    html += '  <span class="badge bg-info-subtle text-info border border-info-subtle"><i class="bi bi-cloud-check me-1"></i>Local Prototype Mode</span>';
    html += '  <a href="' + rootPath + 'modules/integrations-audit-backup.php" class="text-decoration-none text-muted small">System Health</a>';
    html += '</div>';

    footerEl.innerHTML = html;
  }

  function renderGlobalSearchModal() {
    var existing = document.getElementById('global-search-modal');
    if (existing) return;

    var modalHtml = '';
    modalHtml += '<div class="modal fade" id="global-search-modal" tabindex="-1" aria-hidden="true">';
    modalHtml += '  <div class="modal-dialog modal-dialog-centered modal-lg">';
    modalHtml += '    <div class="modal-content border-0 shadow-lg">';
    modalHtml += '      <div class="modal-header border-bottom p-3">';
    modalHtml += '        <div class="input-group">';
    modalHtml += '          <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted fs-5"></i></span>';
    modalHtml += '          <input type="text" id="global-search-input" class="form-control border-0 fs-5 ps-1" placeholder="Search any module, project, vendor, BOQ item or tool..." autofocus>';
    modalHtml += '          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    modalHtml += '        </div>';
    modalHtml += '      </div>';
    modalHtml += '      <div class="modal-body p-3" style="max-height: 400px; overflow-y: auto;">';
    modalHtml += '        <div id="search-quick-links" class="mb-3">';
    modalHtml += '          <div class="text-muted small fw-bold text-uppercase mb-2">Available ERP Modules (30 Modules)</div>';
    modalHtml += '          <div class="row g-2" id="search-results-grid">';
    
    if (window.BuildProData && window.BuildProData.navigationGroups) {
      window.BuildProData.navigationGroups.forEach(function(grp) {
        grp.items.forEach(function(item) {
          modalHtml += '<div class="col-md-6 search-item-card" data-title="' + item.label.toLowerCase() + ' ' + grp.title.toLowerCase() + '">';
          modalHtml += '  <a href="' + rootPath + item.path + '" class="d-flex align-items-center p-2 rounded text-decoration-none text-dark border bg-light-subtle hover-shadow">';
          modalHtml += '    <i class="bi ' + item.icon + ' fs-4 text-primary me-2"></i>';
          modalHtml += '    <div>';
          modalHtml += '      <div class="fw-semibold small">' + item.label + '</div>';
          modalHtml += '      <div class="text-muted" style="font-size:0.7rem;">' + grp.title + '</div>';
          modalHtml += '    </div>';
          modalHtml += '  </a>';
          modalHtml += '</div>';
        });
      });
    }

    modalHtml += '          </div>';
    modalHtml += '        </div>';
    modalHtml += '      </div>';
    modalHtml += '      <div class="modal-footer bg-light p-2 px-3 justify-content-between">';
    modalHtml += '        <small class="text-muted"><kbd>ESC</kbd> to exit | <kbd>&uarr;&darr;</kbd> to navigate</small>';
    modalHtml += '        <small class="text-primary fw-semibold">BuildPro Enterprise Index</small>';
    modalHtml += '      </div>';
    modalHtml += '    </div>';
    modalHtml += '  </div>';
    modalHtml += '</div>';

    document.body.insertAdjacentHTML('beforeend', modalHtml);
  }

  function renderDetailModal() {
    var existing = document.getElementById('app-detail-modal');
    if (existing) return;

    var modalHtml = '';
    modalHtml += '<div class="modal fade" id="app-detail-modal" tabindex="-1" aria-hidden="true">';
    modalHtml += '  <div class="modal-dialog modal-dialog-centered modal-lg">';
    modalHtml += '    <div class="modal-content">';
    modalHtml += '      <div class="modal-header bg-light">';
    modalHtml += '        <h5 class="modal-title" id="app-detail-title"><i class="bi bi-info-circle me-2 text-primary"></i>Record Details</h5>';
    modalHtml += '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    modalHtml += '      </div>';
    modalHtml += '      <div class="modal-body" id="app-detail-body">';
    modalHtml += '        <!-- Dynamic content injected here -->';
    modalHtml += '      </div>';
    modalHtml += '      <div class="modal-footer bg-light">';
    modalHtml += '        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print()"><i class="bi bi-printer me-1"></i>Print Spec</button>';
    modalHtml += '        <button type="button" class="btn btn-sm btn-erp-primary" data-bs-dismiss="modal">Close</button>';
    modalHtml += '      </div>';
    modalHtml += '    </div>';
    modalHtml += '  </div>';
    modalHtml += '</div>';

    document.body.insertAdjacentHTML('beforeend', modalHtml);
  }

  function renderDeleteModal() {
    var existing = document.getElementById('app-delete-modal');
    if (existing) return;

    var modalHtml = '';
    modalHtml += '<div class="modal fade" id="app-delete-modal" tabindex="-1" aria-hidden="true">';
    modalHtml += '  <div class="modal-dialog modal-dialog-centered modal-sm">';
    modalHtml += '    <div class="modal-content">';
    modalHtml += '      <div class="modal-body text-center p-4">';
    modalHtml += '        <div class="mb-3 text-danger"><i class="bi bi-exclamation-triangle-fill fs-1"></i></div>';
    modalHtml += '        <h5 class="fw-bold mb-2">Confirm Delete</h5>';
    modalHtml += '        <p class="text-muted small mb-4" id="app-delete-msg">Are you sure you want to remove this record? This action will update project audit logs.</p>';
    modalHtml += '        <div class="d-flex justify-content-center gap-2">';
    modalHtml += '          <button type="button" class="btn btn-sm btn-outline-secondary px-3" data-bs-dismiss="modal">Cancel</button>';
    modalHtml += '          <button type="button" class="btn btn-sm btn-danger px-3" id="app-delete-confirm-btn">Delete</button>';
    modalHtml += '        </div>';
    modalHtml += '      </div>';
    modalHtml += '    </div>';
    modalHtml += '  </div>';
    modalHtml += '</div>';

    document.body.insertAdjacentHTML('beforeend', modalHtml);
  }

  function renderToastContainer() {
    var existing = document.getElementById('app-toast-container');
    if (existing) return;

    var toastHtml = '<div class="erp-toast-container toast-container position-fixed bottom-0 end-0 p-3" id="app-toast-container"></div>';
    document.body.insertAdjacentHTML('beforeend', toastHtml);
  }

  function showToast(message, type) {
    var container = document.getElementById('app-toast-container');
    if (!container) return;

    var toastId = 'toast-' + Date.now();
    var bgClass = type === 'success' ? 'bg-success text-white' : (type === 'danger' ? 'bg-danger text-white' : 'bg-dark text-white');
    var icon = type === 'success' ? 'bi-check-circle' : (type === 'danger' ? 'bi-exclamation-octagon' : 'bi-info-circle');

    var toastHtml = '';
    toastHtml += '<div id="' + toastId + '" class="toast align-items-center ' + bgClass + ' border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">';
    toastHtml += '  <div class="d-flex">';
    toastHtml += '    <div class="toast-body d-flex align-items-center gap-2">';
    toastHtml += '      <i class="bi ' + icon + ' fs-5"></i>';
    toastHtml += '      <div>' + message + '</div>';
    toastHtml += '    </div>';
    toastHtml += '    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>';
    toastHtml += '  </div>';
    toastHtml += '</div>';

    container.insertAdjacentHTML('beforeend', toastHtml);
    var el = document.getElementById(toastId);
    if (window.bootstrap && window.bootstrap.Toast) {
      var bsToast = new window.bootstrap.Toast(el, { delay: 4000 });
      bsToast.show();
      el.addEventListener('hidden.bs.toast', function() {
        el.remove();
      });
    }
  }

  function bindEvents() {
    // Sidebar toggle collapse on desktop
    var btnCollapse = document.getElementById('btn-sidebar-collapse');
    if (btnCollapse) {
      btnCollapse.addEventListener('click', function() {
        document.body.classList.toggle('sidebar-collapsed');
        var isCollapsed = document.body.classList.contains('sidebar-collapsed');
        localStorage.setItem('buildpro_sidebar_collapsed', isCollapsed);
      });
    }

    // Mobile sidebar toggle & close helpers
    function closeMobileSidebar() {
      document.body.classList.remove('sidebar-mobile-open');
      var backdrop = document.querySelector('.sidebar-backdrop');
      if (backdrop) backdrop.remove();
    }

    var btnMenu = document.getElementById('btn-toggle-menu');
    if (btnMenu) {
      btnMenu.addEventListener('click', function() {
        document.body.classList.toggle('sidebar-mobile-open');
        var existingBackdrop = document.querySelector('.sidebar-backdrop');
        if (document.body.classList.contains('sidebar-mobile-open')) {
          if (!existingBackdrop) {
            var backdrop = document.createElement('div');
            backdrop.className = 'sidebar-backdrop';
            backdrop.addEventListener('click', closeMobileSidebar);
            document.body.appendChild(backdrop);
          }
        } else if (existingBackdrop) {
          existingBackdrop.remove();
        }
      });
    }

    // Mobile sidebar close button
    var btnCloseMobile = document.getElementById('btn-sidebar-mobile-close');
    if (btnCloseMobile) {
      btnCloseMobile.addEventListener('click', closeMobileSidebar);
    }

    // Close mobile sidebar on nav link tap (< 992px)
    var navLinks = document.querySelectorAll('.erp-sidebar-nav .erp-nav-link');
    navLinks.forEach(function(link) {
      link.addEventListener('click', function() {
        if (window.innerWidth < 992) {
          closeMobileSidebar();
        }
      });
    });

    // Mobile search button trigger
    var mobileSearchBtn = document.getElementById('mobile-search-trigger');
    if (mobileSearchBtn) {
      mobileSearchBtn.addEventListener('click', function() {
        openGlobalSearch();
      });
    }

    // Global Project Switcher
    var projectSelect = document.getElementById('global-project-select');
    if (projectSelect) {
      projectSelect.addEventListener('change', function() {
        var selectedId = this.value;
        currentProject = selectedId;
        localStorage.setItem('buildpro_current_project', selectedId);
        showToast('Active construction project switched to <b>' + selectedId + '</b>', 'success');
      });
    }

    // Global Search trigger
    var searchTrigger = document.getElementById('search-bar-trigger');
    if (searchTrigger) {
      searchTrigger.addEventListener('click', function() {
        openGlobalSearch();
      });
    }

    // Keyboard shortcut (Ctrl+K or '/')
    document.addEventListener('keydown', function(e) {
      if ((e.ctrlKey && e.key === 'k') || (e.key === '/' && document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA')) {
        e.preventDefault();
        openGlobalSearch();
      }
    });

    // Global Search Filter Input
    var globalInput = document.getElementById('global-search-input');
    if (globalInput) {
      globalInput.addEventListener('input', function() {
        var query = this.value.toLowerCase().trim();
        var cards = document.querySelectorAll('.search-item-card');
        cards.forEach(function(card) {
          var title = card.getAttribute('data-title') || '';
          if (!query || title.indexOf(query) !== -1) {
            card.style.display = '';
          } else {
            card.style.display = 'none';
          }
        });
      });
    }
  }

  function openGlobalSearch() {
    var modalEl = document.getElementById('global-search-modal');
    if (modalEl && window.bootstrap && window.bootstrap.Modal) {
      var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
      modal.show();
      setTimeout(function() {
        var inp = document.getElementById('global-search-input');
        if (inp) inp.focus();
      }, 300);
    }
  }

  // Automatic Table Search & Filter helper
  function initTableSearch(tableId, searchInputId, filterStatusId) {
    var table = document.getElementById(tableId);
    if (!table) return;

    var searchInput = document.getElementById(searchInputId);
    var filterStatus = document.getElementById(filterStatusId);

    function applyFilter() {
      var query = searchInput ? searchInput.value.toLowerCase().trim() : '';
      var status = filterStatus ? filterStatus.value.toLowerCase().trim() : '';

      var rows = table.querySelectorAll('tbody tr');
      rows.forEach(function(row) {
        var text = row.innerText.toLowerCase();
        var matchesQuery = !query || text.indexOf(query) !== -1;
        var matchesStatus = !status || status === 'all' || text.indexOf(status) !== -1;

        if (matchesQuery && matchesStatus) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }

    if (searchInput) searchInput.addEventListener('input', applyFilter);
    if (filterStatus) filterStatus.addEventListener('change', applyFilter);
  }

  function autoBindPageTables() {
    // If standard IDs exist, auto bind
    initTableSearch('main-table', 'table-search-input', 'table-status-filter');
    initTableSearch('project-table', 'table-search-input', 'table-status-filter');
  }

  // Export table to CSV file
  function exportTableToCSV(tableId, filename) {
    var table = document.getElementById(tableId);
    if (!table) {
      showToast('No table found to export', 'danger');
      return;
    }

    var csv = [];
    var rows = table.querySelectorAll('tr');

    rows.forEach(function(row) {
      if (row.style.display === 'none') return; // Skip filtered out rows
      var cols = row.querySelectorAll('th, td');
      var rowData = [];
      cols.forEach(function(col, idx) {
        // Skip last action column if it only contains buttons
        if (idx === cols.length - 1 && col.querySelector('.btn-action-sm')) return;
        var data = col.innerText.replace(/(\r\n|\n|\r)/gm, ' ').replace(/"/g, '""').trim();
        rowData.push('"' + data + '"');
      });
      if (rowData.length > 0) {
        csv.push(rowData.join(','));
      }
    });

    var csvString = csv.join('\n');
    var blob = new Blob([csvString], { type: 'text/csv;charset=utf-8;' });
    var link = document.createElement('a');
    var url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', (filename || 'BuildPro_Export') + '_' + new Date().toISOString().slice(0,10) + '.csv');
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);

    showToast('Table exported successfully as CSV!', 'success');
  }

  // View Details Modal helper
  function viewDetails(title, dataMap) {
    var modalEl = document.getElementById('app-detail-modal');
    if (!modalEl) return;

    var titleEl = document.getElementById('app-detail-title');
    var bodyEl = document.getElementById('app-detail-body');

    if (titleEl) titleEl.innerHTML = '<i class="bi bi-file-text me-2 text-primary"></i>' + title;

    var html = '<div class="row g-3">';
    for (var key in dataMap) {
      if (dataMap.hasOwnProperty(key)) {
        html += '<div class="col-sm-6 border-bottom pb-2">';
        html += '  <div class="text-muted small text-uppercase fw-semibold" style="font-size:0.72rem;">' + key + '</div>';
        html += '  <div class="fw-bold text-dark mt-1">' + dataMap[key] + '</div>';
        html += '</div>';
      }
    }
    html += '</div>';

    if (bodyEl) bodyEl.innerHTML = html;

    if (window.bootstrap && window.bootstrap.Modal) {
      bootstrap.Modal.getOrCreateInstance(modalEl).show();
    }
  }

  // Delete Confirmation helper
  function confirmDelete(itemName, onConfirmCallback) {
    var modalEl = document.getElementById('app-delete-modal');
    var msgEl = document.getElementById('app-delete-msg');
    var btnConfirm = document.getElementById('app-delete-confirm-btn');

    if (msgEl) {
      msgEl.innerHTML = 'Are you sure you want to delete <strong>' + itemName + '</strong>? This action will be recorded in the system audit logs.';
    }

    if (window.bootstrap && window.bootstrap.Modal) {
      var bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
      bsModal.show();

      // Replace button clone to clean previous event listeners
      var newBtn = btnConfirm.cloneNode(true);
      btnConfirm.parentNode.replaceChild(newBtn, btnConfirm);

      newBtn.addEventListener('click', function() {
        bsModal.hide();
        if (typeof onConfirmCallback === 'function') {
          onConfirmCallback();
        }
        showToast('Item <strong>' + itemName + '</strong> deleted successfully.', 'success');
      });
    }
  }

  // Reset Demo Data
  function resetDemoData() {
    localStorage.removeItem('buildpro_sidebar_collapsed');
    localStorage.removeItem('buildpro_current_project');
    showToast('Demo cache cleared. Reloading page...', 'success');
    setTimeout(function() {
      window.location.reload();
    }, 800);
  }

  // Public API
  return {
    init: init,
    showToast: showToast,
    initTableSearch: initTableSearch,
    exportTableToCSV: exportTableToCSV,
    viewDetails: viewDetails,
    confirmDelete: confirmDelete,
    resetDemoData: resetDemoData,
    openGlobalSearch: openGlobalSearch
  };
})();

document.addEventListener('DOMContentLoaded', function() {
  BuildProApp.init();
});
