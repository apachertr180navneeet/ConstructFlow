<?php
/**
 * BuildPro Construction ERP - Dedicated Authentication Portal
 */

$skip_auth = true;
require_once __DIR__ . '/includes/config.php';

// If already logged in, redirect to dashboard
if (isset($_SESSION['buildpro_user'])) {
    header("Location: dashboard.php");
    exit;
}

$error_message = '';
$info_message = '';

if (isset($_GET['logged_out'])) {
    $info_message = 'You have successfully signed out of the system.';
}

// Handle Login Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role = trim($_POST['role'] ?? 'Senior Project Director');

    // Sample User Directory for quick switching
    $demo_personas = [
        'director' => [
            'name' => 'Navneet Kumar',
            'email' => 'navneet@buildpro-erp.in',
            'role' => 'Senior Project Director (Super Admin)',
            'avatar' => 'NK',
            'phone' => '+91 98201 99281'
        ],
        'pm' => [
            'name' => 'Rajeshwar Rao',
            'email' => 'rajeshwar.rao@buildpro-erp.in',
            'role' => 'Project Manager (Site Lead)',
            'avatar' => 'RR',
            'phone' => '+91 98450 18273'
        ],
        'billing' => [
            'name' => 'Manoj V. Sharma',
            'email' => 'manoj.sharma@buildpro-erp.in',
            'role' => 'Chief Billing & QS Engineer',
            'avatar' => 'MS',
            'phone' => '+91 97110 44921'
        ],
        'safety' => [
            'name' => 'Arjun Rawat',
            'email' => 'arjun.rawat@buildpro-erp.in',
            'role' => 'HSE Safety Lead Officer',
            'avatar' => 'AR',
            'phone' => '+91 94220 81729'
        ]
    ];

    if (!empty($email)) {
        // Find matching persona or build from submitted input
        $selected_persona = null;
        foreach ($demo_personas as $p) {
            if (strtolower($p['email']) === strtolower($email)) {
                $selected_persona = $p;
                break;
            }
        }

        if (!$selected_persona) {
            $initials = strtoupper(substr($email, 0, 2));
            $name_part = ucwords(str_replace(['.', '_', '-'], ' ', strstr($email, '@', true) ?: $email));
            $selected_persona = [
                'name' => $name_part,
                'email' => $email,
                'role' => $role,
                'avatar' => $initials,
                'phone' => '+91 98000 00000'
            ];
        }

        $_SESSION['buildpro_user'] = $selected_persona;
        $_SESSION['current_project'] = 'PRJ-2024-001';
        header("Location: dashboard.php");
        exit;
    } else {
        $error_message = 'Please enter a valid work email address.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In - BuildPro Construction ERP</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .login-container {
      min-height: 100vh;
      display: flex;
    }
    .login-hero {
      background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 58, 138, 0.88)), url('assets/images/construction_hero.jpg') center/cover no-repeat;
      color: #ffffff;
      padding: 3.5rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .login-form-panel {
      background-color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2.5rem;
    }
    .login-card {
      width: 100%;
      max-width: 440px;
    }
    @media (max-width: 575.98px) {
      .login-form-panel {
        padding: 1.5rem 1rem !important;
      }
      .login-card {
        max-width: 100%;
      }
    }
  </style>
</head>
<body class="bg-light">

  <div class="login-container">
    <!-- Left Hero Branding Panel -->
    <div class="col-lg-7 d-none d-lg-flex login-hero">
      <div>
        <div class="d-flex align-items-center gap-2 mb-4">
          <div class="erp-brand-icon" style="width: 44px; height: 44px; font-size: 1.5rem;">
            <i class="bi bi-cone-striped"></i>
          </div>
          <div>
            <div class="fs-4 fw-bold text-white lh-1">BuildPro Construction ERP</div>
            <div class="small text-warning fw-semibold">Cloud Enterprise v3.4.2</div>
          </div>
        </div>
      </div>

      <div class="my-auto py-5">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3">
          <i class="bi bi-shield-check me-1"></i> ISO 9001:2015 &amp; ISO 45001:2018 Certified
        </span>
        <h1 class="display-6 fw-bold mb-3">Intelligent Infrastructure &amp; Commercial Project ERP</h1>
        <p class="lead text-light opacity-90 mb-4" style="max-width: 580px;">
          Seamless coordination across 30 enterprise modules: tender estimation, BOQ quantity surveying, CPM scheduling, subcontractor RA bills, and site operations.
        </p>

        <div class="row g-3" style="max-width: 600px;">
          <div class="col-sm-6">
            <div class="p-3 rounded bg-white bg-opacity-10 border border-white border-opacity-25 backdrop-blur">
              <div class="small text-light opacity-75">Orderbook Backlog</div>
              <div class="fs-4 fw-bold text-white">₹ 806.25 Cr</div>
              <div class="small text-warning">4 Active Mega Projects</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 rounded bg-white bg-opacity-10 border border-white border-opacity-25 backdrop-blur">
              <div class="small text-light opacity-75">Field Safety Milestone</div>
              <div class="fs-4 fw-bold text-white">3.42M Safe Hours</div>
              <div class="small text-success">Zero LTI (380 Consecutive Days)</div>
            </div>
          </div>
        </div>
      </div>

      <div class="small text-light opacity-75 d-flex justify-content-between align-items-center border-top border-white border-opacity-25 pt-3">
        <span>BuildPro Construction Pvt. Ltd. &bull; BKC, Mumbai</span>
        <span>CIN: U45200MH2012PTC234567</span>
      </div>
    </div>

    <!-- Right Login Card Panel -->
    <div class="col-12 col-lg-5 login-form-panel">
      <div class="login-card">
        <!-- Mobile Logo -->
        <div class="d-lg-none d-flex align-items-center gap-2 mb-4">
          <div class="erp-brand-icon" style="width: 40px; height: 40px; font-size: 1.3rem;">
            <i class="bi bi-cone-striped"></i>
          </div>
          <div>
            <div class="fs-5 fw-bold text-dark lh-1">BuildPro ERP</div>
            <div class="small text-muted">Construction Cloud</div>
          </div>
        </div>

        <div class="mb-4">
          <h2 class="h4 fw-bold text-dark mb-1">Sign In to Your Workspace</h2>
          <p class="text-muted small">Enter your corporate credentials to access project dashboards and modules.</p>
        </div>

        <?php if (!empty($info_message)): ?>
          <div class="alert alert-info py-2 px-3 small d-flex align-items-center gap-2">
            <i class="bi bi-info-circle-fill fs-5"></i>
            <div><?= htmlspecialchars($info_message) ?></div>
          </div>
        <?php endif; ?>

        <?php if (!empty($error_message)): ?>
          <div class="alert alert-danger py-2 px-3 small d-flex align-items-center gap-2">
            <i class="bi bi-exclamation-octagon-fill fs-5"></i>
            <div><?= htmlspecialchars($error_message) ?></div>
          </div>
        <?php endif; ?>

        <!-- Authentication Form -->
        <form method="POST" action="login.php" id="loginForm">
          <div class="mb-3">
            <label class="form-label">Corporate Email Address <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-envelope"></i></span>
              <input type="email" name="email" id="loginEmail" class="form-control border-start-0 ps-1" placeholder="name@buildpro-erp.in" value="navneet@buildpro-erp.in" required>
            </div>
          </div>

          <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
              <label class="form-label">Password <span class="text-danger">*</span></label>
              <a href="javascript:void(0)" onclick="alert('Demo prototype password is any value, e.g. password123')" class="small text-muted text-decoration-none">Forgot password?</a>
            </div>
            <div class="input-group">
              <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-lock"></i></span>
              <input type="password" name="password" id="loginPassword" class="form-control border-start-0 ps-1" value="secret123" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">System Role Access</label>
            <select name="role" id="loginRole" class="form-select form-select-sm">
              <option selected value="Senior Project Director (Super Admin)">Senior Project Director (Super Admin)</option>
              <option value="Project Manager (Site Lead)">Project Manager (Site Lead)</option>
              <option value="Chief Billing &amp; QS Engineer">Chief Billing &amp; QS Engineer</option>
              <option value="HSE Safety Lead Officer">HSE Safety Lead Officer</option>
              <option value="Storekeeper &amp; Inventory Lead">Storekeeper &amp; Inventory Lead</option>
            </select>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" checked id="rememberMe">
              <label class="form-check-label small text-muted" for="rememberMe">Remember session</label>
            </div>
            <span class="small text-success fw-semibold"><i class="bi bi-shield-lock me-1"></i>256-bit Encrypted</span>
          </div>

          <button type="submit" class="btn btn-warning w-100 fw-bold py-2 shadow-sm text-dark mb-4">
            <i class="bi bi-box-arrow-in-right me-1"></i> Sign In to ERP
          </button>
        </form>

        <!-- Quick 1-Click Persona Login Shortcuts for Evaluation -->
        <div class="border rounded p-3 bg-light">
          <div class="small fw-bold text-uppercase text-muted mb-2" style="font-size:0.7rem;">Quick 1-Click Demo Personas:</div>
          <div class="row g-2">
            <div class="col-6">
              <button type="button" class="btn btn-sm btn-outline-primary w-100 text-start small py-1" onclick="selectPersona('navneet@buildpro-erp.in', 'Senior Project Director (Super Admin)')">
                <i class="bi bi-person-badge me-1"></i> <strong>Director</strong>
              </button>
            </div>
            <div class="col-6">
              <button type="button" class="btn btn-sm btn-outline-secondary w-100 text-start small py-1" onclick="selectPersona('rajeshwar.rao@buildpro-erp.in', 'Project Manager (Site Lead)')">
                <i class="bi bi-person-workspace me-1"></i> <strong>Project Mgr</strong>
              </button>
            </div>
            <div class="col-6">
              <button type="button" class="btn btn-sm btn-outline-warning text-dark w-100 text-start small py-1" onclick="selectPersona('manoj.sharma@buildpro-erp.in', 'Chief Billing & QS Engineer')">
                <i class="bi bi-receipt me-1"></i> <strong>Billing / QS</strong>
              </button>
            </div>
            <div class="col-6">
              <button type="button" class="btn btn-sm btn-outline-danger w-100 text-start small py-1" onclick="selectPersona('arjun.rawat@buildpro-erp.in', 'HSE Safety Lead Officer')">
                <i class="bi bi-shield-check me-1"></i> <strong>HSE Safety</strong>
              </button>
            </div>
          </div>
        </div>

        <div class="text-center mt-4 text-muted small">
          BuildPro Enterprise v3.4.2 &bull; &copy; <?= date('Y') ?> BuildPro Construction Pvt. Ltd.
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script>
    function selectPersona(email, role) {
      document.getElementById('loginEmail').value = email;
      document.getElementById('loginRole').value = role;
      document.getElementById('loginForm').submit();
    }
  </script>
</body>
</html>
