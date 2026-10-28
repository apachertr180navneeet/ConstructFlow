/**
 * BuildPro Construction ERP - Prototype Data & Master Catalog
 * Fictional Company: BuildPro Construction Pvt. Ltd. (Mumbai / Bangalore / Pune / Delhi)
 */

window.BuildProData = {
  company: {
    name: "BuildPro Construction Pvt. Ltd.",
    shortName: "BuildPro ERP",
    cin: "U45200MH2012PTC234567",
    gstin: "27AABCB1234F1Z8",
    pan: "AABCB1234F",
    iso: "ISO 9001:2015 & ISO 45001:2018 Certified",
    address: "BuildPro Towers, 7th Floor, Bandra-Kurla Complex (BKC), Mumbai, MH 400051",
    contactEmail: "corporate@buildpro-erp.in",
    contactPhone: "+91 22 4987 6500",
    supportDesk: "1800-266-9900 (Toll Free)"
  },

  projects: [
    {
      id: "PRJ-2024-001",
      name: "Skylark Heights - Luxury Towers",
      type: "Residential (G+32)",
      client: "Prestige Urban Realty Ltd.",
      manager: "Rajeshwar Rao",
      location: "Worli Seaface, Mumbai",
      contractValue: 1425000000, // ₹ 142.50 Cr
      budget: 1210000000,
      spent: 98400000,
      progress: 74,
      startDate: "15-01-2023",
      endDate: "30-06-2025",
      status: "active",
      sitesCount: 3,
      workersOnSite: 285
    },
    {
      id: "PRJ-2024-002",
      name: "CyberTower B - Grade A IT Park",
      type: "Commercial Campus (3B+G+18)",
      client: "Nexus InfraTech Spaces",
      manager: "Vikram Malhotra",
      location: "Whitefield, Bengaluru",
      contractValue: 2100000000, // ₹ 210.00 Cr
      budget: 1820000000,
      spent: 1352000000,
      progress: 64,
      startDate: "01-08-2022",
      endDate: "31-03-2025",
      status: "active",
      sitesCount: 4,
      workersOnSite: 412
    },
    {
      id: "PRJ-2024-003",
      name: "LogisticHub Smart Automated Warehouse",
      type: "Industrial PEB (8.5 Lakh Sq.ft)",
      client: "TransLogix Logistics Ltd.",
      manager: "Sunil Kulkarni",
      location: "Chakan MIDC Phase II, Pune",
      contractValue: 687500000, // ₹ 68.75 Cr
      budget: 590000000,
      spent: 541000000,
      progress: 88,
      startDate: "10-02-2023",
      endDate: "15-12-2024",
      status: "in-progress",
      sitesCount: 2,
      workersOnSite: 160
    },
    {
      id: "PRJ-2024-004",
      name: "NH48 Expressway Elevated Corridor Pkg-3",
      type: "Road & Flyover Infrastructure (14.2 km)",
      client: "National Highways Authority of India (NHAI)",
      manager: "Col. Sanjeev Varma (Retd.)",
      location: "Vadodara-Surat Highway, Gujarat",
      contractValue: 3850000000, // ₹ 385.00 Cr
      budget: 3400000000,
      spent: 1426000000,
      progress: 38,
      startDate: "05-11-2023",
      endDate: "31-10-2026",
      status: "active",
      sitesCount: 6,
      workersOnSite: 540
    }
  ],

  // Navigation Catalog covering all 30 Modules
  navigationGroups: [
    {
      title: "Main",
      items: [
        { code: "dashboard", label: "Dashboard & Analytics", icon: "bi-speedometer2", path: "dashboard.html", badge: "Live" }
      ]
    },
    {
      title: "Projects & Sites",
      items: [
        { code: "project-list", label: "Project Management", icon: "bi-buildings", path: "projects/project-list.html" },
        { code: "site-management", label: "Site Operations", icon: "bi-geo-alt", path: "projects/site-management.html" },
        { code: "planning-scheduling", label: "Planning & Scheduling", icon: "bi-calendar-week", path: "modules/planning-scheduling.html" },
        { code: "daily-progress", label: "Daily Progress (DPR)", icon: "bi-journal-check", path: "modules/daily-progress.html", badge: "Today" }
      ]
    },
    {
      title: "Commercial & Estimation",
      items: [
        { code: "estimation-tender", label: "Estimation & Tenders", icon: "bi-calculator", path: "modules/estimation-tender.html" },
        { code: "boq-quantity-survey", label: "BOQ & Quantity Surveying", icon: "bi-table", path: "modules/boq-quantity-survey.html" },
        { code: "budget-cost-control", label: "Budget & Cost Control", icon: "bi-pie-chart", path: "modules/budget-cost-control.html" },
        { code: "client-billing", label: "Client Billing & RA Bills", icon: "bi-receipt-cutoff", path: "modules/client-billing.html" }
      ]
    },
    {
      title: "Procurement & Materials",
      items: [
        { code: "procurement", label: "Purchase & Requisitions", icon: "bi-cart-check", path: "modules/procurement.html", badge: "8 Req" },
        { code: "vendors-suppliers", label: "Vendors & Suppliers", icon: "bi-truck", path: "modules/vendors-suppliers.html" },
        { code: "inventory-materials", label: "Inventory & Stores", icon: "bi-boxes", path: "modules/inventory-materials.html" }
      ]
    },
    {
      title: "Workforce & Subcontractors",
      items: [
        { code: "labour-workforce", label: "Labour & Muster Roll", icon: "bi-people", path: "modules/labour-workforce.html" },
        { code: "contractor-management", label: "Contractors & RA Bills", icon: "bi-person-badge", path: "modules/contractor-management.html" },
        { code: "equipment-machinery", label: "Equipment & Plant", icon: "bi-tools", path: "modules/equipment-machinery.html" },
        { code: "vehicle-transport", label: "Vehicle & Fleet Logistics", icon: "bi-ev-front", path: "modules/vehicle-transport.html" }
      ]
    },
    {
      title: "Finance & Accounts",
      items: [
        { code: "finance-accounting", label: "Finance & Accounting", icon: "bi-cash-coin", path: "modules/finance-accounting.html" },
        { code: "expenses-petty-cash", label: "Petty Cash & Site Imprest", icon: "bi-wallet2", path: "modules/expenses-petty-cash.html" }
      ]
    },
    {
      title: "Quality, Safety & Maintenance",
      items: [
        { code: "quality-control", label: "Quality QA/QC & Tests", icon: "bi-check2-circle", path: "modules/quality-control.html" },
        { code: "safety-compliance", label: "HSE Safety & Compliance", icon: "bi-shield-check", path: "modules/safety-compliance.html", badge: "Zero LTI" },
        { code: "maintenance-defects", label: "Defects & DLP Snag List", icon: "bi-exclamation-triangle", path: "modules/maintenance-defects.html" }
      ]
    },
    {
      title: "Corporate & System",
      items: [
        { code: "clients-crm", label: "Client CRM & Leads", icon: "bi-person-rolodex", path: "clients/crm.html" },
        { code: "hr-payroll", label: "HR & Staff Payroll", icon: "bi-person-lines-fill", path: "modules/hr-payroll.html" },
        { code: "documents-drawings", label: "Drawings & Documents (EDMS)", icon: "bi-folder2-open", path: "modules/documents-drawings.html" },
        { code: "approvals-workflow", label: "Approvals & Workflow", icon: "bi-diagram-3", path: "modules/approvals-workflow.html", badge: "5 New" },
        { code: "reports-mis", label: "Reports & Executive MIS", icon: "bi-bar-chart-line", path: "modules/reports-mis.html" },
        { code: "notifications-communication", label: "Alerts & Site Broadcast", icon: "bi-bell", path: "modules/notifications-communication.html" },
        { code: "company-settings", label: "Company Administration", icon: "bi-building-gear", path: "administration/company-settings.html" },
        { code: "users-roles", label: "Users, Roles & ACL", icon: "bi-shield-lock", path: "administration/users-roles-permissions.html" },
        { code: "integrations-audit", label: "Integrations & Audit Logs", icon: "bi-database-check", path: "modules/integrations-audit-backup.html" }
      ]
    }
  ],

  // Utilities for Indian currency formatting
  formatINR: function(num) {
    if (isNaN(num)) return "₹ 0";
    var n = Number(num);
    if (Math.abs(n) >= 10000000) {
      return "₹ " + (n / 10000000).toFixed(2) + " Cr";
    } else if (Math.abs(n) >= 100000) {
      return "₹ " + (n / 100000).toFixed(2) + " Lakh";
    } else {
      return "₹ " + n.toLocaleString('en-IN');
    }
  },

  formatFullINR: function(num) {
    if (isNaN(num)) return "₹ 0.00";
    return "₹ " + Number(num).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  }
};
