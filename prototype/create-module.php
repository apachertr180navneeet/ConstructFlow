<?php
/**
 * ============================================================================
 * BuildPro ERP - Module Generator CLI Scaffolder
 * ============================================================================
 * Easily scaffold a new ERP module or feature page in 1 second!
 * 
 * Usage:
 *   php create-module.php "Quality Testing" "qa-testing" "bi-shield-check"
 */

if (php_sapi_name() !== 'cli') {
    die("This script can only be run from the command line (CLI).\n");
}

$title = $argv[1] ?? null;
$slug  = $argv[2] ?? null;
$icon  = $argv[3] ?? 'bi-file-earmark-text';

if (!$title) {
    echo "========================================================\n";
    echo " BuildPro ERP - Instant Module Scaffolder CLI\n";
    echo "========================================================\n";
    echo "Enter Module Title (e.g., Concrete Pouring Log): ";
    $title = trim(fgets(STDIN));
}

if (!$slug) {
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'));
    echo "Enter File Slug [default: $slug]: ";
    $input_slug = trim(fgets(STDIN));
    if (!empty($input_slug)) $slug = $input_slug;
}

if (!$icon || $icon === 'bi-file-earmark-text') {
    echo "Enter Bootstrap Icon class [default: bi-file-earmark-text]: ";
    $input_icon = trim(fgets(STDIN));
    if (!empty($input_icon)) $icon = $input_icon;
}

$target_file = __DIR__ . "/modules/$slug.php";
$template_file = __DIR__ . "/templates/starter-module.php";

if (!file_exists($template_file)) {
    die("Error: Starter template not found at $template_file\n");
}

if (file_exists($target_file)) {
    echo "Warning: Module file already exists at modules/$slug.php. Overwrite? (y/N): ";
    $confirm = trim(fgets(STDIN));
    if (strtolower($confirm) !== 'y') {
        die("Aborted.\n");
    }
}

$template_content = file_get_contents($template_file);

// Replace variables
$new_content = str_replace(
    ["\$page_title = 'New Module Title';", "\$active_menu = 'new-module';"],
    ["\$page_title = '" . addslashes($title) . "';", "\$active_menu = '$slug';"],
    $template_content
);

file_put_contents($target_file, $new_content);

echo "\n--------------------------------------------------------\n";
echo "SUCCESS! Created new module at: prototype/modules/$slug.php\n";
echo "--------------------------------------------------------\n";
echo "To display it in the sidebar, open prototype/includes/config.php\n";
echo "and add this entry to \$navigation_groups:\n\n";
echo "['code' => '$slug', 'label' => '$title', 'icon' => '$icon', 'url' => 'modules/$slug.php'],\n\n";
echo "URL to preview: http://localhost/gsgwebsoft/ConstructFlow/prototype/modules/$slug.php\n";
echo "========================================================\n";
