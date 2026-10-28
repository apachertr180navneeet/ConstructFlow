<?php
/**
 * BuildPro Construction ERP - Common Configuration & Session Engine
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Compute relative root path based on directory depth from prototype root
$script_path = str_replace('\\', '/', dirname($_SERVER['SCRIPT_FILENAME']));
$includes_dir = str_replace('\\', '/', __DIR__);
$prototype_root_dir = str_replace('\\', '/', dirname(__DIR__));

if ($script_path === $prototype_root_dir) {
    $root_path = './';
    $includes_path = './includes/';
} else {
    $root_path = '../';
    $includes_path = '../includes/';
}

// Authentication Check: Redirect to login.php if session not active
if (!isset($skip_auth) || !$skip_auth) {
    if (!isset($_SESSION['buildpro_user'])) {
        header("Location: " . $root_path . "login.php");
        exit;
    }
}

// Active User
$current_user = $_SESSION['buildpro_user'] ?? [
    'name' => 'Navneet Kumar',
    'email' => 'navneet@buildpro-erp.in',
    'role' => 'Senior Project Director (Super Admin)',
    'avatar' => 'NK',
    'phone' => '+91 98201 99281'
];

// Active Project
if (isset($_GET['switch_project'])) {
    $_SESSION['current_project'] = htmlspecialchars($_GET['switch_project']);
}
$current_project = $_SESSION['current_project'] ?? 'PRJ-2024-001';

// Projects Master Catalog
$erp_projects = [
    'PRJ-2024-001' => [
        'id' => 'PRJ-2024-001',
        'name' => 'Skylark Heights - Luxury Towers',
        'type' => 'Residential (G+32)',
        'client' => 'Prestige Urban Realty Ltd.',
        'location' => 'Worli Seaface, Mumbai',
        'value' => '₹ 142.50 Cr',
        'progress' => 74
    ],
    'PRJ-2024-002' => [
        'id' => 'PRJ-2024-002',
        'name' => 'CyberTower B - Grade A IT Park',
        'type' => 'Commercial (3B+G+18)',
        'client' => 'Nexus InfraTech Spaces',
        'location' => 'Whitefield, Bengaluru',
        'value' => '₹ 210.00 Cr',
        'progress' => 64
    ],
    'PRJ-2024-003' => [
        'id' => 'PRJ-2024-003',
        'name' => 'LogisticHub Smart Automated Warehouse',
        'type' => 'Industrial PEB (8.5L Sq.ft)',
        'client' => 'TransLogix Logistics Ltd.',
        'location' => 'Chakan MIDC, Pune',
        'value' => '₹ 68.75 Cr',
        'progress' => 88
    ],
    'PRJ-2024-004' => [
        'id' => 'PRJ-2024-004',
        'name' => 'NH48 Expressway Elevated Corridor Pkg-3',
        'type' => 'Highway & Flyovers (14.2 km)',
        'client' => 'NHAI (Govt. of India)',
        'location' => 'Vadodara, Gujarat',
        'value' => '₹ 385.00 Cr',
        'progress' => 38
    ]
];

// All 30 Modules Catalog
$navigation_groups = [
    [
        'title' => 'Main',
        'items' => [
            ['code' => 'dashboard', 'label' => 'Dashboard & Analytics', 'icon' => 'bi-speedometer2', 'url' => 'dashboard.php', 'badge' => 'Live']
        ]
    ],
    [
        'title' => 'Projects & Sites',
        'items' => [
            ['code' => 'project-list', 'label' => 'Project Management', 'icon' => 'bi-buildings', 'url' => 'projects/project-list.php'],
            ['code' => 'site-management', 'label' => 'Site Operations', 'icon' => 'bi-geo-alt', 'url' => 'projects/site-management.php'],
            ['code' => 'planning-scheduling', 'label' => 'Planning & Scheduling', 'icon' => 'bi-calendar-week', 'url' => 'modules/planning-scheduling.php'],
            ['code' => 'daily-progress', 'label' => 'Daily Progress (DPR)', 'icon' => 'bi-journal-check', 'url' => 'modules/daily-progress.php', 'badge' => 'Today']
        ]
    ],
    [
        'title' => 'Commercial & Estimation',
        'items' => [
            ['code' => 'estimation-tender', 'label' => 'Estimation & Tenders', 'icon' => 'bi-calculator', 'url' => 'modules/estimation-tender.php'],
            ['code' => 'boq-quantity-survey', 'label' => 'BOQ & Quantity Survey', 'icon' => 'bi-table', 'url' => 'modules/boq-quantity-survey.php'],
            ['code' => 'budget-cost-control', 'label' => 'Budget & Cost Control', 'icon' => 'bi-pie-chart', 'url' => 'modules/budget-cost-control.php'],
            ['code' => 'client-billing', 'label' => 'Client Billing & RA Bills', 'icon' => 'bi-receipt-cutoff', 'url' => 'modules/client-billing.php']
        ]
    ],
    [
        'title' => 'Procurement & Materials',
        'items' => [
            ['code' => 'procurement', 'label' => 'Purchase & Requisitions', 'icon' => 'bi-cart-check', 'url' => 'modules/procurement.php', 'badge' => '8 Req'],
            ['code' => 'vendors-suppliers', 'label' => 'Vendors & Suppliers', 'icon' => 'bi-truck', 'url' => 'modules/vendors-suppliers.php'],
            ['code' => 'inventory-materials', 'label' => 'Inventory & Stores', 'icon' => 'bi-boxes', 'url' => 'modules/inventory-materials.php']
        ]
    ],
    [
        'title' => 'Workforce & Subcontractors',
        'items' => [
            ['code' => 'labour-workforce', 'label' => 'Labour & Muster Roll', 'icon' => 'bi-people', 'url' => 'modules/labour-workforce.php'],
            ['code' => 'contractor-management', 'label' => 'Contractors & RA Bills', 'icon' => 'bi-person-badge', 'url' => 'modules/contractor-management.php'],
            ['code' => 'equipment-machinery', 'label' => 'Equipment & Plant', 'icon' => 'bi-tools', 'url' => 'modules/equipment-machinery.php'],
            ['code' => 'vehicle-transport', 'label' => 'Vehicle & Fleet Logistics', 'icon' => 'bi-ev-front', 'url' => 'modules/vehicle-transport.php']
        ]
    ],
    [
        'title' => 'Finance & Accounts',
        'items' => [
            ['code' => 'finance-accounting', 'label' => 'Finance & Accounting', 'icon' => 'bi-cash-coin', 'url' => 'modules/finance-accounting.php'],
            ['code' => 'expenses-petty-cash', 'label' => 'Petty Cash & Site Imprest', 'icon' => 'bi-wallet2', 'url' => 'modules/expenses-petty-cash.php']
        ]
    ],
    [
        'title' => 'Quality, Safety & Maintenance',
        'items' => [
            ['code' => 'quality-control', 'label' => 'Quality QA/QC & Tests', 'icon' => 'bi-check2-circle', 'url' => 'modules/quality-control.php'],
            ['code' => 'safety-compliance', 'label' => 'HSE Safety & Compliance', 'icon' => 'bi-shield-check', 'url' => 'modules/safety-compliance.php', 'badge' => 'Zero LTI'],
            ['code' => 'maintenance-defects', 'label' => 'Defects & DLP Snag List', 'icon' => 'bi-exclamation-triangle', 'url' => 'modules/maintenance-defects.php']
        ]
    ],
    [
        'title' => 'Corporate & System',
        'items' => [
            ['code' => 'clients-crm', 'label' => 'Client CRM & Leads', 'icon' => 'bi-person-rolodex', 'url' => 'clients/crm.php'],
            ['code' => 'hr-payroll', 'label' => 'HR & Staff Payroll', 'icon' => 'bi-person-lines-fill', 'url' => 'modules/hr-payroll.php'],
            ['code' => 'documents-drawings', 'label' => 'Drawings & Documents (EDMS)', 'icon' => 'bi-folder2-open', 'url' => 'modules/documents-drawings.php'],
            ['code' => 'approvals-workflow', 'label' => 'Approvals & Workflow', 'icon' => 'bi-diagram-3', 'url' => 'modules/approvals-workflow.php', 'badge' => '5 New'],
            ['code' => 'reports-mis', 'label' => 'Reports & Executive MIS', 'icon' => 'bi-bar-chart-line', 'url' => 'modules/reports-mis.php'],
            ['code' => 'notifications-communication', 'label' => 'Alerts & Site Broadcast', 'icon' => 'bi-bell', 'url' => 'modules/notifications-communication.php'],
            ['code' => 'company-settings', 'label' => 'Company Administration', 'icon' => 'bi-building-gear', 'url' => 'administration/company-settings.php'],
            ['code' => 'users-roles', 'label' => 'Users, Roles & ACL', 'icon' => 'bi-shield-lock', 'url' => 'administration/users-roles-permissions.php'],
            ['code' => 'integrations-audit', 'label' => 'Integrations & Audit Logs', 'icon' => 'bi-database-check', 'url' => 'modules/integrations-audit-backup.php']
        ]
    ]
];
