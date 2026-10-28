      <footer class="erp-footer" id="app-footer">
        <div>
          <span class="fw-semibold text-dark">BuildPro Construction Management ERP</span> &copy; <?= date('Y') ?> BuildPro Construction Pvt. Ltd. | All rights reserved.
        </div>
        <div class="d-flex align-items-center gap-3">
          <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="bi bi-shield-check me-1"></i>ISO 9001:2015</span>
          <span class="badge bg-primary-subtle text-primary border border-primary-subtle"><i class="bi bi-check-circle me-1"></i>Session Active</span>
          <a href="<?= $root_path ?>modules/integrations-audit-backup.php" class="text-decoration-none text-muted small">System Health</a>
        </div>
      </footer>
    </div><!-- /.erp-main -->
  </div><!-- /.erp-wrapper -->

  <!-- Common Modals & Toasts are auto-managed by app.js or native HTML -->
  <script src="<?= $root_path ?>assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $root_path ?>assets/js/chart.umd.min.js"></script>
  <script src="<?= $root_path ?>assets/js/prototype-data.js"></script>
  <script src="<?= $root_path ?>assets/js/app.js"></script>
</body>
</html>
