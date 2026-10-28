<aside class="erp-sidebar" id="app-sidebar">
  <!-- Brand / Header -->
  <div class="erp-sidebar-header">
    <a href="<?= $root_path ?>dashboard.php" class="erp-brand">
      <div class="erp-brand-icon"><i class="bi bi-cone-striped"></i></div>
      <div class="erp-brand-text">
        <span class="erp-brand-title">BuildPro ERP</span>
        <span class="erp-brand-subtitle">Construction Cloud</span>
      </div>
    </a>
  </div>

  <!-- Navigation Items -->
  <nav class="erp-sidebar-nav">
    <?php foreach ($navigation_groups as $group): ?>
      <div class="erp-nav-section-title"><?= htmlspecialchars($group['title']) ?></div>
      <?php foreach ($group['items'] as $item): 
        $is_active = (isset($active_page) && $active_page === $item['code']);
      ?>
        <div class="erp-nav-item">
          <a href="<?= $root_path . $item['url'] ?>" class="erp-nav-link <?= $is_active ? 'active' : '' ?>">
            <i class="bi <?= htmlspecialchars($item['icon']) ?>"></i>
            <span><?= htmlspecialchars($item['label']) ?></span>
            <?php if (isset($item['badge'])): 
              $badge_class = ($item['badge'] === 'Live' ? 'bg-success' : ($item['badge'] === 'Today' ? 'bg-warning text-dark' : 'bg-primary'));
            ?>
              <span class="erp-nav-badge badge <?= $badge_class ?>"><?= htmlspecialchars($item['badge']) ?></span>
            <?php endif; ?>
          </a>
        </div>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </nav>

  <!-- Sidebar Footer -->
  <div class="erp-sidebar-footer">
    <div class="footer-text">
      <div class="small fw-semibold text-white">BuildPro Construction</div>
      <div class="text-secondary" style="font-size:0.7rem;">v3.4.2 Enterprise</div>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary text-light border-0 py-0 px-1" id="btn-sidebar-collapse" title="Toggle Sidebar">
      <i class="bi bi-chevron-bar-left"></i>
    </button>
  </div>
</aside>
