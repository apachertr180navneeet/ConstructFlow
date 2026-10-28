# ConstructFlow ERP - Architecture & Developer Guide

Welcome to the **ConstructFlow Construction Management ERP** developer documentation. This guide details the project folder structure, core architecture, and step-by-step instructions for creating new modules and pages effortlessly.

---

## 📁 Standardized Folder Structure

```
ConstructFlow/
├── index.php                          # Root entry redirector to prototype/
│
└── prototype/
    ├── includes/                      # Central Shared Architecture
    │   ├── config.php                 # Session, paths, auth guard, project & nav catalog
    │   ├── functions.php              # Reusable UI helpers (format_inr, status_badge, render_stat_card)
    │   ├── db.php                     # PDO MySQL Database connection
    │   ├── header.php                 # HTML <head>, fonts, Bootstrap 5.3 & custom CSS
    │   ├── topbar.php                 # Header navigation, project switcher, search, alerts
    │   ├── sidebar.php                # Collapsible sidebar with active navigation indicators
    │   └── footer.php                 # Common modals, toast notifications & JS bundles
    │
    ├── templates/                     # Boilerplate Starters
    │   ├── starter-module.php         # Complete starter page (KPI cards, filters, tables, modals)
    │   └── blank-canvas.php           # Minimal clean canvas page
    │
    ├── database/
    │   └── schema.sql                 # Ready-to-import MySQL DDL master schema
    │
    ├── assets/
    │   ├── css/
    │   │   ├── style.css              # Enterprise design system & mobile media queries
    │   │   ├── bootstrap.min.css      # Bootstrap 5.3.3 core
    │   │   └── bootstrap-icons.css    # Bootstrap Icons 1.11.3
    │   ├── js/
    │   │   ├── app.js                 # Global search, sidebar toggle, CSV export, toasts
    │   │   ├── chart.umd.min.js       # Chart.js charting engine
    │   │   ├── bootstrap.bundle.min.js# Bootstrap interactive components
    │   │   └── prototype-data.js      # Mock ERP data records
    │   └── images/                    # Avatars and construction hero imagery
    │
    ├── projects/                      # Project Domain
    │   ├── project-list.php           # Projects directory & portfolio overview
    │   ├── project-create.php         # Multi-step project onboarding wizard
    │   ├── project-details.php        # 360° project execution deep-dive
    │   └── site-management.php        # Zones, geofencing & CCTV monitoring
    │
    ├── modules/                       # 25+ Business Execution Modules
    │   ├── procurement.php            # Purchase requisitions & orders (PO)
    │   ├── boq-quantity-survey.php    # Itemized BOQ & Measurement Book (MB)
    │   ├── daily-progress.php         # Daily Progress Reports (DPR)
    │   ├── client-billing.php         # Client RA Bills & GST tax invoices
    │   ├── labour-workforce.php       # Muster roll, trades & overtime
    │   ├── planning-scheduling.php    # CPM Critical Path & milestones
    │   └── ...                        # All other operational modules
    │
    ├── administration/                # System & Governance
    │   ├── company-settings.php       # CIN, GSTIN, bank accounts, prefixes
    │   └── users-roles-permissions.php# RBAC permission matrix
    │
    ├── clients/                       # Developer & Client CRM
    │   └── crm.php                    # Account pipeline & receivables
    │
    ├── dashboard.php                  # Executive Operations & Financial Dashboard
    ├── login.php                      # Dedicated authentication portal
    ├── logout.php                     # Session termination
    └── create-module.php              # Instant 1-second CLI module generator
```

---

## ⚡ How to Create a New Module in 30 Seconds

### Method A: Using the CLI Scaffolder (Fastest)

Run this command in your terminal from the `prototype/` directory:

```bash
php create-module.php "Quality Testing Lab" "qa-testing" "bi-shield-check"
```

This automatically:
1. Generates `prototype/modules/qa-testing.php` with all headers, footers, search bars, responsive tables, and modals.
2. Gives you the exact snippet to add to `prototype/includes/config.php`.

---

### Method B: Manual Copy-Paste

1. Duplicate `prototype/templates/starter-module.php` to your target directory:
   ```bash
   cp prototype/templates/starter-module.php prototype/modules/my-new-feature.php
   ```
2. Open your new file and edit the top variables:
   ```php
   $page_title = 'My New Feature';
   $active_menu = 'my-new-feature';
   ```
3. Register the link in `prototype/includes/config.php` under `$navigation_groups`:
   ```php
   ['code' => 'my-new-feature', 'label' => 'My New Feature', 'icon' => 'bi-stars', 'url' => 'modules/my-new-feature.php'],
   ```
4. Access immediately in browser at:
   `http://localhost/gsgwebsoft/ConstructFlow/prototype/modules/my-new-feature.php`

---

## 🧩 Reusable Helper Functions Library

Imported automatically via `prototype/includes/config.php`:

### 1. Currency Formatting
```php
echo format_inr(142500000); 
// Output: ₹ 14.25 Cr

echo format_inr(550000); 
// Output: ₹ 5.50 Lakh
```

### 2. Status Badges
```php
echo status_badge('active');     // Green checkmark
echo status_badge('pending');    // Amber clock
echo status_badge('delayed');    // Red triangle
echo status_badge('draft');      // Gray pencil
```

### 3. KPI Stat Cards
```php
<?= render_stat_card('Total Spend', '₹ 4.82 Cr', '+8% vs target', 'bi-wallet2', 'orange') ?>
```

### 4. Interactive JavaScript Helpers
- **Instant Table Filter**: `BuildProApp.initTableSearch('searchInputId', 'tableId')`
- **CSV Export**: `BuildProApp.exportTableToCSV('tableId', 'filename')`
- **Confirmation Dialog**: `BuildProApp.confirmDelete('Item Name', callbackFunction)`
- **Toast Notification**: `BuildProApp.showToast('Record saved successfully!', 'success')`
- **Detail View Modal**: `BuildProApp.viewDetails('Title', htmlContent)`
