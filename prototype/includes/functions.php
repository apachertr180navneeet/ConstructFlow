<?php
/**
 * BuildPro Construction ERP - Helper Functions Library
 * Reusable utility functions for rapid page & module creation.
 */

if (!function_exists('format_inr')) {
    /**
     * Format number into Indian Currency format (Lakhs & Crores)
     */
    function format_inr($num, $show_symbol = true) {
        $prefix = $show_symbol ? '₹ ' : '';
        if ($num >= 10000000) {
            return $prefix . number_format($num / 10000000, 2) . ' Cr';
        } elseif ($num >= 100000) {
            return $prefix . number_format($num / 100000, 2) . ' Lakh';
        } else {
            return $prefix . number_format($num, 2);
        }
    }
}

if (!function_exists('status_badge')) {
    /**
     * Render a consistent enterprise status badge
     */
    function status_badge($status) {
        $status_lower = strtolower(trim($status));
        $class_map = [
            'active' => 'active',
            'approved' => 'approved',
            'completed' => 'completed',
            'paid' => 'paid',
            'in-progress' => 'in-progress',
            'pending' => 'pending',
            'review' => 'review',
            'delayed' => 'delayed',
            'rejected' => 'rejected',
            'overdue' => 'overdue',
            'critical' => 'critical',
            'draft' => 'draft',
            'inactive' => 'inactive'
        ];

        $cls = $class_map[$status_lower] ?? 'draft';
        $icon_map = [
            'active' => 'bi-check-circle-fill',
            'approved' => 'bi-check-circle-fill',
            'completed' => 'bi-check-all',
            'paid' => 'bi-cash-coin',
            'in-progress' => 'bi-arrow-repeat',
            'pending' => 'bi-clock-history',
            'review' => 'bi-eye',
            'delayed' => 'bi-exclamation-triangle-fill',
            'rejected' => 'bi-x-circle-fill',
            'overdue' => 'bi-calendar-x',
            'critical' => 'bi-shield-fill-x',
            'draft' => 'bi-pencil',
            'inactive' => 'bi-dash-circle'
        ];
        $icon = $icon_map[$cls] ?? 'bi-dot';

        return '<span class="badge-status ' . $cls . '"><i class="bi ' . $icon . '"></i> ' . htmlspecialchars($status) . '</span>';
    }
}

if (!function_exists('render_stat_card')) {
    /**
     * Render a standard KPI metric card
     */
    function render_stat_card($title, $value, $subtitle = '', $icon = 'bi-bar-chart', $color = 'primary', $col_class = 'col-sm-6 col-xl-3') {
        $color_class = in_array($color, ['primary', 'orange', 'success', 'warning', 'danger', 'info']) ? $color : 'primary';
        $html = '<div class="' . $col_class . '">';
        $html .= '  <div class="erp-stat-card">';
        $html .= '    <div>';
        $html .= '      <div class="text-muted small fw-semibold text-uppercase" style="font-size:0.75rem;">' . htmlspecialchars($title) . '</div>';
        $html .= '      <div class="fs-4 fw-bold text-dark mt-1 lh-1">' . htmlspecialchars($value) . '</div>';
        if (!empty($subtitle)) {
            $html .= '    <div class="small text-muted mt-2" style="font-size:0.75rem;">' . $subtitle . '</div>';
        }
        $html .= '    </div>';
        $html .= '    <div class="erp-stat-icon ' . $color_class . '">';
        $html .= '      <i class="bi ' . htmlspecialchars($icon) . '"></i>';
        $html .= '    </div>';
        $html .= '  </div>';
        $html .= '</div>';
        return $html;
    }
}

if (!function_exists('current_user')) {
    function current_user() {
        return $_SESSION['buildpro_user'] ?? [
            'name' => 'Guest User',
            'role' => 'Guest',
            'avatar' => 'GU'
        ];
    }
}

if (!function_exists('has_role')) {
    function has_role($role) {
        $user = current_user();
        return stripos($user['role'] ?? '', $role) !== false;
    }
}
