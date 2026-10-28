<?php
$page_title = "Project 360Â° View";
$active_page = "project-list";
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
            <a href="project-list.php">Projects</a>
            <i class="bi bi-chevron-right"></i>
            <span>Project 360Â° View</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <h1>Skylark Heights - Luxury Towers</h1>
            <span class="badge bg-success-subtle text-success border border-success-subtle">PRJ-2024-001 &bull; Active Site</span>
          </div>
          <p class="erp-page-desc">Residential High-Rise (4 Towers, G+32) &bull; Worli Seaface, Mumbai &bull; Client: Prestige Urban Realty Ltd.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <a href="../modules/daily-progress.php?prj=PRJ-2024-001" class="btn btn-erp-accent">
            <i class="bi bi-journal-plus"></i> Submit DPR
          </a>
          <a href="../modules/client-billing.php?prj=PRJ-2024-001" class="btn btn-erp-primary">
            <i class="bi bi-receipt"></i> Client RA Bill
          </a>
          <button type="button" class="btn btn-erp-outline" onclick="window.print()">
            <i class="bi bi-printer"></i>
          </button>
        </div>
      </div>

      <main class="erp-content">
        <!-- 6 Metrics Strip -->
        <div class="row g-3 mb-4">
          <div class="col-sm-6 col-lg-2">
            <div class="card p-3 border shadow-sm bg-white h-100">
              <span class="text-muted small fw-semibold">Contract Value</span>
              <div class="fs-5 fw-bold text-dark mt-1">â‚¹ 142.50 Cr</div>
              <div class="small text-muted">Fixed Item Rate</div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-2">
            <div class="card p-3 border shadow-sm bg-white h-100">
              <span class="text-muted small fw-semibold">Internal Budget</span>
              <div class="fs-5 fw-bold text-dark mt-1">â‚¹ 121.00 Cr</div>
              <div class="small text-muted">Margin: 15.1%</div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-2">
            <div class="card p-3 border shadow-sm bg-white h-100">
              <span class="text-muted small fw-semibold">Actual Spent</span>
              <div class="fs-5 fw-bold text-danger mt-1">â‚¹ 98.40 Cr</div>
              <div class="small text-danger">81.3% of Budget</div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-2">
            <div class="card p-3 border shadow-sm bg-white h-100">
              <span class="text-muted small fw-semibold">Physical Progress</span>
              <div class="fs-5 fw-bold text-success mt-1">74.2%</div>
              <div class="small text-success">Target: 72.0%</div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-2">
            <div class="card p-3 border shadow-sm bg-white h-100">
              <span class="text-muted small fw-semibold">Client Certified</span>
              <div class="fs-5 fw-bold text-primary mt-1">â‚¹ 108.60 Cr</div>
              <div class="small text-primary">RA Bills #1 to #08</div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-2">
            <div class="card p-3 border shadow-sm bg-white h-100">
              <span class="text-muted small fw-semibold">Workers On Site</span>
              <div class="fs-5 fw-bold text-dark mt-1">285 Labour</div>
              <div class="small text-muted">Muster Present</div>
            </div>
          </div>
        </div>

        <!-- 360 Tabs Navigation -->
        <ul class="nav nav-tabs erp-tabs mb-4" id="project360Tabs" role="tablist">
          <li class="nav-item">
            <button class="nav-link active fw-bold small" id="t1-tab" data-bs-toggle="tab" data-bs-target="#t1" type="button">
              <i class="bi bi-speedometer2 me-1"></i> Milestone &amp; Physical Progress
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link fw-bold small" id="t2-tab" data-bs-toggle="tab" data-bs-target="#t2" type="button">
              <i class="bi bi-table me-1"></i> BOQ &amp; Executed Quantities
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link fw-bold small" id="t3-tab" data-bs-toggle="tab" data-bs-target="#t3" type="button">
              <i class="bi bi-tools me-1"></i> Machinery &amp; Plant Deployed
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link fw-bold small" id="t4-tab" data-bs-toggle="tab" data-bs-target="#t4" type="button">
              <i class="bi bi-person-badge me-1"></i> Sub-Contractors &amp; Packages
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link fw-bold small" id="t5-tab" data-bs-toggle="tab" data-bs-target="#t5" type="button">
              <i class="bi bi-folder2-open me-1"></i> Approved GFC Blueprints
            </button>
          </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content">
          <!-- Tab 1: Progress & Milestones -->
          <div class="tab-pane fade show active" id="t1" role="tabpanel">
            <div class="row g-3">
              <div class="col-lg-8">
                <div class="erp-card">
                  <div class="erp-card-header">
                    <h5 class="erp-card-title"><i class="bi bi-flag text-primary"></i> Key Construction Milestones</h5>
                    <span class="badge bg-light text-dark border">4 of 6 Completed</span>
                  </div>
                  <div class="erp-card-body p-0">
                    <div class="table-responsive">
                      <table class="table erp-table mb-0">
                        <thead>
                          <tr>
                            <th>Milestone Description</th>
                            <th>Target Date</th>
                            <th>Actual Date</th>
                            <th>Weightage</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="fw-bold">M1: Raft Foundation &amp; Basement 3 Retention Piling</td>
                            <td>30-Apr-2023</td>
                            <td>24-Apr-2023</td>
                            <td>15%</td>
                            <td><span class="badge-status completed">Completed</span></td>
                          </tr>
                          <tr>
                            <td class="fw-bold">M2: Podium Slab &amp; Ground Floor Transfer Girder</td>
                            <td>31-Aug-2023</td>
                            <td>28-Aug-2023</td>
                            <td>18%</td>
                            <td><span class="badge-status completed">Completed</span></td>
                          </tr>
                          <tr>
                            <td class="fw-bold">M3: Tower 1 &amp; 2 Structure up to 15th Floor Slab</td>
                            <td>28-Feb-2024</td>
                            <td>20-Feb-2024</td>
                            <td>20%</td>
                            <td><span class="badge-status completed">Completed</span></td>
                          </tr>
                          <tr>
                            <td class="fw-bold">M4: Tower 1 &amp; 2 Structure up to 28th Floor Slab</td>
                            <td>15-Oct-2024</td>
                            <td>18-Oct-2024</td>
                            <td>21%</td>
                            <td><span class="badge-status completed">Completed</span></td>
                          </tr>
                          <tr>
                            <td class="fw-bold">M5: Terrace Slab Casting &amp; Machine Room (G+32)</td>
                            <td>15-Dec-2024</td>
                            <td>--</td>
                            <td>14%</td>
                            <td><span class="badge-status in-progress">In-Progress</span></td>
                          </tr>
                          <tr>
                            <td class="fw-bold">M6: MEP, High-speed Elevators, Facade &amp; Finishing Handover</td>
                            <td>30-Jun-2025</td>
                            <td>--</td>
                            <td>12%</td>
                            <td><span class="badge-status pending">Pending</span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="erp-card">
                  <div class="erp-card-header">
                    <h5 class="erp-card-title"><i class="bi bi-pie-chart text-warning"></i> Key Material Influx</h5>
                  </div>
                  <div class="erp-card-body">
                    <div class="mb-3">
                      <div class="d-flex justify-content-between small fw-semibold mb-1">
                        <span>RMC Concrete (M35/M40): 18,450 / 24,000 Cum</span>
                        <span class="text-primary">76.8%</span>
                      </div>
                      <div class="erp-progress"><div class="erp-progress-bar bg-primary" style="width: 76.8%;"></div></div>
                    </div>

                    <div class="mb-3">
                      <div class="d-flex justify-content-between small fw-semibold mb-1">
                        <span>Fe500D Reinforcement Steel: 3,120 / 4,200 MT</span>
                        <span class="text-success">74.2%</span>
                      </div>
                      <div class="erp-progress"><div class="erp-progress-bar bg-success" style="width: 74.2%;"></div></div>
                    </div>

                    <div class="mb-3">
                      <div class="d-flex justify-content-between small fw-semibold mb-1">
                        <span>AAC Block Masonry: 4,800 / 7,500 Cum</span>
                        <span class="text-warning">64.0%</span>
                      </div>
                      <div class="erp-progress"><div class="erp-progress-bar bg-warning" style="width: 64%;"></div></div>
                    </div>

                    <div class="mb-1">
                      <div class="d-flex justify-content-between small fw-semibold mb-1">
                        <span>Double Glazed Unit (DGU) Glass Facade: 45%</span>
                        <span class="text-info">45.0%</span>
                      </div>
                      <div class="erp-progress"><div class="erp-progress-bar bg-info" style="width: 45%;"></div></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab 2: BOQ & Quantities -->
          <div class="tab-pane fade" id="t2" role="tabpanel">
            <div class="erp-card">
              <div class="erp-card-header">
                <h5 class="erp-card-title"><i class="bi bi-table text-primary"></i> BOQ Measurement Book Summary</h5>
                <a href="../modules/boq-quantity-survey.php" class="btn btn-sm btn-erp-outline">Full BOQ Module &rarr;</a>
              </div>
              <div class="erp-card-body p-0">
                <div class="table-responsive">
                  <table class="table erp-table mb-0">
                    <thead>
                      <tr>
                        <th>Item Code</th>
                        <th>Description</th>
                        <th>Unit</th>
                        <th>Tender Qty</th>
                        <th>Executed Qty</th>
                        <th>Balance Qty</th>
                        <th>Rate (â‚¹)</th>
                        <th>Executed Valuation</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fw-bold">BOQ-CIV-001</td>
                        <td>Earthwork excavation in all kinds of soil &amp; weathered rock</td>
                        <td>Cum</td>
                        <td>65,000</td>
                        <td>65,000</td>
                        <td>0</td>
                        <td>â‚¹ 380</td>
                        <td class="fw-bold text-dark">â‚¹ 2,47,00,000</td>
                      </tr>
                      <tr>
                        <td class="fw-bold">BOQ-CIV-002</td>
                        <td>Providing &amp; placing Ready Mix Concrete M35 in raft &amp; columns</td>
                        <td>Cum</td>
                        <td>24,000</td>
                        <td>18,450</td>
                        <td>5,550</td>
                        <td>â‚¹ 6,850</td>
                        <td class="fw-bold text-dark">â‚¹ 12,63,82,500</td>
                      </tr>
                      <tr>
                        <td class="fw-bold">BOQ-CIV-003</td>
                        <td>Thermo-Mechanically Treated (TMT) Fe500D steel reinforcement</td>
                        <td>MT</td>
                        <td>4,200</td>
                        <td>3,120</td>
                        <td>1,080</td>
                        <td>â‚¹ 68,500</td>
                        <td class="fw-bold text-dark">â‚¹ 21,37,20,000</td>
                      </tr>
                      <tr>
                        <td class="fw-bold">BOQ-FIN-001</td>
                        <td>Internal Gypsum plaster on block masonry walls (12mm)</td>
                        <td>Sq.m</td>
                        <td>85,000</td>
                        <td>48,200</td>
                        <td>36,800</td>
                        <td>â‚¹ 240</td>
                        <td class="fw-bold text-dark">â‚¹ 1,15,68,000</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab 3: Machinery -->
          <div class="tab-pane fade" id="t3" role="tabpanel">
            <div class="erp-card">
              <div class="erp-card-header">
                <h5 class="erp-card-title"><i class="bi bi-tools text-danger"></i> Site Plant &amp; Heavy Equipment Roster</h5>
                <a href="../modules/equipment-machinery.php" class="btn btn-sm btn-erp-outline">Manage Machinery &rarr;</a>
              </div>
              <div class="erp-card-body p-0">
                <div class="table-responsive">
                  <table class="table erp-table mb-0">
                    <thead>
                      <tr>
                        <th>Asset ID</th>
                        <th>Equipment Name &amp; Model</th>
                        <th>Capacity</th>
                        <th>Deployment Location</th>
                        <th>Operator</th>
                        <th>Running Hours</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fw-bold">EQ-TC-01</td>
                        <td>Potain Tower Crane MC 85B</td>
                        <td>5.0 Ton (50m Jib)</td>
                        <td>Tower 1 Core Shaft</td>
                        <td>Ramesh Chand</td>
                        <td>3,420 hrs</td>
                        <td><span class="badge-status active">Operational</span></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">EQ-TC-02</td>
                        <td>Zoomlion Tower Crane TC5013</td>
                        <td>6.0 Ton (55m Jib)</td>
                        <td>Tower 2 Core Shaft</td>
                        <td>Birender Singh</td>
                        <td>3,110 hrs</td>
                        <td><span class="badge-status active">Operational</span></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">EQ-PH-01</td>
                        <td>Alimak Dual Cage Passenger Hoist</td>
                        <td>2.0 Ton / 24 Persons</td>
                        <td>Tower 1 North Facade</td>
                        <td>Gopal Yadav</td>
                        <td>2,150 hrs</td>
                        <td><span class="badge-status active">Operational</span></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">EQ-CP-03</td>
                        <td>Schwing Stetter Static Concrete Pump BP350</td>
                        <td>60 Cum/hr</td>
                        <td>Batching Yard / Ground</td>
                        <td>Mukesh Patel</td>
                        <td>1,840 hrs</td>
                        <td><span class="badge-status active">Operational</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab 4: Subcontractors -->
          <div class="tab-pane fade" id="t4" role="tabpanel">
            <div class="erp-card">
              <div class="erp-card-header">
                <h5 class="erp-card-title"><i class="bi bi-person-badge text-primary"></i> Sub-Contract Packages &amp; Running Accounts</h5>
                <a href="../modules/contractor-management.php" class="btn btn-sm btn-erp-outline">Subcontractor Portal &rarr;</a>
              </div>
              <div class="erp-card-body p-0">
                <div class="table-responsive">
                  <table class="table erp-table mb-0">
                    <thead>
                      <tr>
                        <th>Contractor Name</th>
                        <th>Trade / Work Package</th>
                        <th>Order Value</th>
                        <th>Billed to Date</th>
                        <th>Retention (5%)</th>
                        <th>Net Paid</th>
                        <th>Performance</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fw-bold">Shree Balaji Bar Bending Works</td>
                        <td>Reinforcement Rebar Fabrication</td>
                        <td>â‚¹ 4,80,00,000</td>
                        <td>â‚¹ 3,42,00,000</td>
                        <td>â‚¹ 17,10,000</td>
                        <td>â‚¹ 3,24,90,000</td>
                        <td><span class="badge bg-success">4.8 / 5.0</span></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">Modern Formwork &amp; Shuttering LLP</td>
                        <td>Mivan Aluminium Formwork</td>
                        <td>â‚¹ 9,20,00,000</td>
                        <td>â‚¹ 6,80,00,000</td>
                        <td>â‚¹ 34,00,000</td>
                        <td>â‚¹ 6,46,00,000</td>
                        <td><span class="badge bg-success">4.9 / 5.0</span></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">Skyline Glazing &amp; Facades Ltd.</td>
                        <td>Aluminium Curtain Wall &amp; Glass</td>
                        <td>â‚¹ 12,50,00,000</td>
                        <td>â‚¹ 4,10,00,000</td>
                        <td>â‚¹ 20,50,000</td>
                        <td>â‚¹ 3,89,50,000</td>
                        <td><span class="badge bg-primary">4.6 / 5.0</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab 5: Drawings -->
          <div class="tab-pane fade" id="t5" role="tabpanel">
            <div class="erp-card">
              <div class="erp-card-header">
                <h5 class="erp-card-title"><i class="bi bi-folder2-open text-warning"></i> Good-For-Construction (GFC) Blueprints</h5>
                <a href="../modules/documents-drawings.php" class="btn btn-sm btn-erp-outline">Full EDMS Repository &rarr;</a>
              </div>
              <div class="erp-card-body p-0">
                <div class="table-responsive">
                  <table class="table erp-table mb-0">
                    <thead>
                      <tr>
                        <th>Drawing Number</th>
                        <th>Drawing Title &amp; Discipline</th>
                        <th>Current Rev</th>
                        <th>Release Date</th>
                        <th>Architect / Consultant</th>
                        <th>Status</th>
                        <th class="text-end">Download</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fw-bold">SKL-STR-DWG-028</td>
                        <td>Tower 1 &amp; 2 - 28th Floor Column &amp; Shear Wall Reinforcement</td>
                        <td><span class="badge bg-light text-dark border">Rev C</span></td>
                        <td>12-Oct-2024</td>
                        <td>Sterling Structural Consultants</td>
                        <td><span class="badge bg-success">GFC Approved</span></td>
                        <td class="text-end"><button class="btn btn-sm btn-outline-primary" onclick="BuildProApp.showToast('Downloading GFC CAD Drawing...', 'success')"><i class="bi bi-download"></i> PDF</button></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">SKL-ARC-DWG-104</td>
                        <td>Clubhouse &amp; Podium Landscape Architectural Layout</td>
                        <td><span class="badge bg-light text-dark border">Rev B</span></td>
                        <td>25-Sep-2024</td>
                        <td>Hafeez Contractor Architects</td>
                        <td><span class="badge bg-success">GFC Approved</span></td>
                        <td class="text-end"><button class="btn btn-sm btn-outline-primary" onclick="BuildProApp.showToast('Downloading GFC CAD Drawing...', 'success')"><i class="bi bi-download"></i> PDF</button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </main>

      



<?php require_once $includes_path . 'footer.php'; ?>
