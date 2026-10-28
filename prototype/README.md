# BuildPro ERP - Construction Management Software HTML Prototype

Enterprise-grade, interactive multi-page UI prototype for **Construction Management ERP Software** built using **HTML5, CSS3, Bootstrap 5.3.3, Bootstrap Icons 1.11.3, Chart.js, and Vanilla JavaScript**.

---

## 🏗️ Fictional Enterprise Profile
- **Company Name**: BuildPro Construction Pvt. Ltd.
- **CIN**: U45200MH2012PTC234567 | **GSTIN**: 27AABCB1234F1Z8 | **PAN**: AABCB1234F
- **Corporate Office**: BuildPro Towers, 7th Floor, Bandra-Kurla Complex (BKC), Mumbai, Maharashtra 400051
- **Certification**: ISO 9001:2015 & ISO 45001:2018 Certified
- **Contract Portfolio**: ₹ 806.25 Cr across Residential High-Rise, Grade-A IT Parks, Industrial PEB Warehouses, and Highway Expressways.

---

## 🚀 How to Run the Prototype

### Option 1: Direct Browser Launch (Recommended)
Because the prototype uses static assets, relative paths and zero server-side dependencies:
1. Double-click `prototype/index.html` or `prototype/dashboard.html` to open directly in Google Chrome, Microsoft Edge, Firefox, or Safari.
2. Works 100% offline with full navigation, modals, and local scripts.

### Option 2: Local HTTP Server (Optional)
If you prefer running through a local development server:
```bash
# Using Python
cd prototype
python -m http.server 8080

# Using Node.js
npx serve prototype

# Access in browser: http://localhost:8080
```

---

## 📁 Prototype Folder Structure

```text
prototype/
├── index.html                               # ERP Launchpad & Module Gateway
├── dashboard.html                           # Executive Operations & Financial Dashboard
├── README.md                                # Setup guide & module coverage checklist
├── projects/
│   ├── project-list.html                    # Projects Master Directory & Filter
│   ├── project-create.html                  # Multi-Step Project Onboarding Wizard
│   ├── project-details.html                 # 360° Project Execution Deep Dive
│   └── site-management.html                 # Site Operations, Zones & Geofencing
├── administration/
│   ├── company-settings.html                # Corporate Setup, GSTINs & Numbering Rules
│   └── users-roles-permissions.html         # User Directory, RBAC Access Matrix
├── clients/
│   └── crm.html                             # Developer Client Accounts & Pipeline
├── modules/
│   ├── clients.html                         # Client Accounts Directory Redirect
│   ├── estimation-tender.html               # Tender Bids, EMD & Cost Analysis
│   ├── boq-quantity-survey.html             # Itemized BOQ & Measurement Book (MB)
│   ├── planning-scheduling.html             # CPM Schedule, Milestones & S-Curves
│   ├── procurement.html                     # Purchase Requisitions & Orders (PO)
│   ├── vendors-suppliers.html               # Approved Vendor List (AVL) & MSME
│   ├── inventory-materials.html             # Site Stores, GRN Ledger & Reorder
│   ├── labour-workforce.html                # Daily Muster Roll, Trades & Overtime
│   ├── contractor-management.html           # Subcontractor Work Orders & RA Bills
│   ├── equipment-machinery.html             # Heavy Plant, Tower Cranes & Diesel Logs
│   ├── vehicle-transport.html               # Fleet Logistics, Tippers & FASTag
│   ├── daily-progress.html                  # Daily Progress Reports (DPR)
│   ├── quality-control.html                 # QA/QC Lab, Cube Tests & NCR Snags
│   ├── safety-compliance.html               # HSE Compliance, Safe Man-Hours & TBT
│   ├── client-billing.html                  # Client RA Bills, GST Tax Invoices
│   ├── finance-accounting.html              # General Ledger & Journal Vouchers
│   ├── expenses-petty-cash.html             # Field Cashier Imprest Accounts
│   ├── budget-cost-control.html             # Earned Value (EVA), Cost Codes & CTC
│   ├── hr-payroll.html                      # Staff Salary, PF/ESI & Directory
│   ├── documents-drawings.html              # EDMS Blueprints & GFC CAD Drawings
│   ├── approvals-workflow.html              # Central Multi-Tier Approval Matrix
│   ├── reports-mis.html                     # Monthly Review (MPR) & Executive MIS
│   ├── maintenance-defects.html             # Defect Liability Period (DLP) & Snags
│   ├── notifications-communication.html     # Site Hazard Alerts & Broadcasts
│   └── integrations-audit-backup.html       # DB Snapshots, Tally Sync & Audit Log
└── assets/
    ├── css/
    │   ├── bootstrap.min.css                # Bootstrap 5.3.3 Core Styles
    │   ├── bootstrap-icons.css              # Bootstrap Icons 1.11.3
    │   ├── style.css                        # BuildPro Custom Enterprise Theme
    │   └── fonts/                           # Local WOFF & WOFF2 Icon Fonts
    ├── js/
    │   ├── bootstrap.bundle.min.js          # Bootstrap 5 Bundle
    │   ├── chart.umd.min.js                 # Chart.js v4.4.2 Engine
    │   ├── prototype-data.js                # Master Projects & Indian Data Catalog
    │   └── app.js                           # Core Application Engine
    └── images/
        └── construction_hero.jpg            # High-Resolution Architectural Visual
```

---

## ✅ Complete 30 Modules Coverage Checklist

| # | Module Name | Page Location | Key Enterprise Features Implemented |
|---|---|---|---|
| 1 | **Dashboard & Analytics** | `dashboard.html` | Cash flow charts, contract backlog ₹ 806.25 Cr, active sites, quick actions. |
| 2 | **Company & Administration** | `administration/company-settings.html` | Corporate CIN/GSTIN/PAN, bank accounts, regional branch offices, ERP prefixes. |
| 3 | **User & Access Management** | `administration/users-roles-permissions.html` | RBAC access control matrix, user directory, permission scopes per role. |
| 4 | **Client Management (CRM)** | `clients/crm.html` | Developer key accounts, tender inquiries, pipeline tracking, receivables aging. |
| 5 | **Project Management** | `projects/project-list.html` | Contract value, budget, spend, progress bars, create wizard & 360° view. |
| 6 | **Site Management** | `projects/site-management.html` | Site wings, GPS coordinates, geofenced labour counts, live CCTV streams. |
| 7 | **Estimation & Tender Management** | `modules/estimation-tender.html` | Tender bid pipeline, EMD deposits, rate analysis, L1 shortlist tracking. |
| 8 | **BOQ & Quantity Surveying** | `modules/boq-quantity-survey.html` | Itemized BOQ, tender vs executed quantities, balance, Measurement Book (MB). |
| 9 | **Project Planning & Scheduling** | `modules/planning-scheduling.html` | WBS tasks, CPM critical path, milestone tracker, baseline variance days. |
| 10 | **Purchase & Procurement** | `modules/procurement.html` | Indents, purchase orders (PO), GST breakups, supplier delivery tracking. |
| 11 | **Vendor & Supplier Management** | `modules/vendors-suppliers.html` | Approved Vendor List (AVL), performance ratings, MSME status, credit terms. |
| 12 | **Inventory & Material Management** | `modules/inventory-materials.html` | Stock ledger, opening/received/issued, minimum buffer alerts, MIN slips. |
| 13 | **Labour & Workforce Management** | `modules/labour-workforce.html` | Daily muster roll, trades (bar benders, masons, carpenters), overtime, wages. |
| 14 | **Contractor Management** | `modules/contractor-management.html` | Work orders, subcontractor RA bills, 5% retention money, TDS, net payable. |
| 15 | **Equipment & Machinery** | `modules/equipment-machinery.html` | Tower cranes, batching plants, diesel consumption (L/hr), TPI safety certs. |
| 16 | **Vehicle & Transport Management** | `modules/vehicle-transport.html` | Transit mixers, tipper trucks, FASTag balances, PUC/fitness dates, trip sheets. |
| 17 | **Daily Progress & Site Operations** | `modules/daily-progress.html` | DPR field logbook, weather, concrete poured, trades present, delay hindrances. |
| 18 | **Quality Control (QA/QC)** | `modules/quality-control.html` | Concrete cube compressive strength (7d/28d), slump tests, steel tensile, NCRs. |
| 19 | **Safety & Compliance (HSE)** | `modules/safety-compliance.html` | 3.42M safe man-hours (Zero LTI), daily toolbox talks (TBT), PPE audits. |
| 20 | **Client Billing & Receivables** | `modules/client-billing.html` | Client RA bills, joint measurement certification, 18% GST tax invoicing. |
| 21 | **Finance & Accounting** | `modules/finance-accounting.html` | Double-entry general ledger, payment/receipt/journal vouchers, bank escrow. |
| 22 | **Expenses & Petty Cash** | `modules/expenses-petty-cash.html` | Site cashier imprest accounts, cash vouchers, local emergency purchases. |
| 23 | **Budget & Cost Control** | `modules/budget-cost-control.html` | Earned Value Analysis (EVA), Cost Codes, Committed vs Actual, CTC forecasts. |
| 24 | **HR & Payroll** | `modules/hr-payroll.html` | Engineering staff directory, salary processing, statutory PF/ESI/PT deductions. |
| 25 | **Document & Drawing Management** | `modules/documents-drawings.html` | Good-For-Construction (GFC) blueprints, structural CAD revisions, transmittals. |
| 26 | **Approvals & Workflow** | `modules/approvals-workflow.html` | Central multi-tier inbox for POs, contractor bills, variation orders. |
| 27 | **Reports & MIS** | `modules/reports-mis.html` | Monthly project review (MPR) pack, material variance, cash flow projections. |
| 28 | **Maintenance & Defect Management** | `modules/maintenance-defects.html` | Defect Liability Period (DLP) tracker, punch snag lists, warranty signoffs. |
| 29 | **Notifications & Communication** | `modules/notifications-communication.html` | Weather squall storm warnings, low stock alerts, team broadcast dispatches. |
| 30 | **System Integration, Backup & Audit** | `modules/integrations-audit-backup.html` | Automated DB snapshots, Tally/SAP sync, biometric bridges, SHA-256 audit. |

---

## 🎨 Design & Interaction Highlights
- **Corporate Slate & Navy Theme**: Professional deep slate `#0f172a` sidebar, crisp clean light background `#f8fafc`, and construction orange accent `#ea580c`.
- **Keyboard Shortcuts**: Press `Ctrl + K` or `/` anywhere to open the **Global Search Modal** across all 30 modules and top projects.
- **Dynamic Table Search & Filter**: Real-time client-side search and status filters on all data tables.
- **CSV Data Export**: One-click download of formatted CSV tables generated in the browser.
- **Print Optimization**: Clean print-media stylesheets removing sidebars and headers for print-ready specifications.
- **Toast Notifications**: Non-intrusive Bootstrap 5 toasts for save, delete, approve, and export feedback.
- **Indian Construction Realism**: Indian number notation (₹ Lakhs & ₹ Crores), Indian standard date formats (`DD-MM-YYYY`), GSTINs, and realistic civil terminology (Cum, MT, AAC Blocks, Mivan formwork, Fe500D TMT, IS 456).
