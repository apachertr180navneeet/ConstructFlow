-- =====================================================================
-- BuildPro Construction Management ERP - Master Database Schema
-- Database: constructflow_erp
-- =====================================================================

CREATE DATABASE IF NOT EXISTS `constructflow_erp` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `constructflow_erp`;

-- 1. Users Table
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `role` VARCHAR(100) NOT NULL DEFAULT 'Project Engineer',
  `avatar` VARCHAR(10) DEFAULT 'PE',
  `phone` VARCHAR(30) DEFAULT NULL,
  `status` ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. Construction Projects Master
CREATE TABLE IF NOT EXISTS `projects` (
  `id` VARCHAR(50) PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `project_type` VARCHAR(100) NOT NULL,
  `client_name` VARCHAR(200) NOT NULL,
  `location` VARCHAR(200) NOT NULL,
  `contract_value` DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
  `start_date` DATE DEFAULT NULL,
  `target_end_date` DATE DEFAULT NULL,
  `progress_percent` INT DEFAULT 0,
  `status` ENUM('planning', 'active', 'on-hold', 'completed') DEFAULT 'active',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 3. Construction Sites & Zones
CREATE TABLE IF NOT EXISTS `sites` (
  `id` VARCHAR(50) PRIMARY KEY,
  `project_id` VARCHAR(50) NOT NULL,
  `site_name` VARCHAR(200) NOT NULL,
  `site_engineer` VARCHAR(150) DEFAULT NULL,
  `latitude` DECIMAL(10, 8) DEFAULT NULL,
  `longitude` DECIMAL(11, 8) DEFAULT NULL,
  `geofence_radius_meters` INT DEFAULT 500,
  `active_workforce_count` INT DEFAULT 0,
  `status` ENUM('active', 'restricted', 'closed') DEFAULT 'active',
  FOREIGN KEY (`project_id`) REFERENCES `projects`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 4. Vendors & Subcontractors
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` VARCHAR(50) PRIMARY KEY,
  `vendor_name` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  `gstin` VARCHAR(20) DEFAULT NULL,
  `pan` VARCHAR(15) DEFAULT NULL,
  `contact_person` VARCHAR(100) DEFAULT NULL,
  `phone` VARCHAR(30) DEFAULT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `rating` DECIMAL(3, 2) DEFAULT 4.50,
  `status` ENUM('approved', 'under-review', 'blacklisted') DEFAULT 'approved',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 5. Purchase Orders (PO)
CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `id` VARCHAR(50) PRIMARY KEY,
  `project_id` VARCHAR(50) NOT NULL,
  `vendor_id` VARCHAR(50) NOT NULL,
  `po_date` DATE NOT NULL,
  `delivery_due_date` DATE DEFAULT NULL,
  `subtotal` DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
  `gst_amount` DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
  `total_amount` DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
  `payment_terms` VARCHAR(100) DEFAULT '30 Days Net',
  `status` ENUM('draft', 'pending', 'approved', 'delivered', 'cancelled') DEFAULT 'pending',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`project_id`) REFERENCES `projects`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`vendor_id`) REFERENCES `vendors`(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- 6. Bill of Quantities (BOQ Items)
CREATE TABLE IF NOT EXISTS `boq_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `project_id` VARCHAR(50) NOT NULL,
  `item_code` VARCHAR(50) NOT NULL,
  `description` TEXT NOT NULL,
  `uom` VARCHAR(20) NOT NULL,
  `tender_quantity` DECIMAL(12, 2) NOT NULL DEFAULT 0.00,
  `unit_rate` DECIMAL(12, 2) NOT NULL DEFAULT 0.00,
  `executed_quantity` DECIMAL(12, 2) NOT NULL DEFAULT 0.00,
  `status` ENUM('pending', 'in-progress', 'completed') DEFAULT 'in-progress',
  FOREIGN KEY (`project_id`) REFERENCES `projects`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 7. Daily Progress Reports (DPR)
CREATE TABLE IF NOT EXISTS `daily_progress_reports` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `project_id` VARCHAR(50) NOT NULL,
  `report_date` DATE NOT NULL,
  `weather` VARCHAR(50) DEFAULT 'Clear / Sunny',
  `temperature_c` INT DEFAULT 32,
  `labour_headcount` INT DEFAULT 0,
  `concrete_poured_cum` DECIMAL(10, 2) DEFAULT 0.00,
  `work_summary` TEXT NOT NULL,
  `hindrances` TEXT DEFAULT NULL,
  `created_by` VARCHAR(100) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`project_id`) REFERENCES `projects`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 8. Client Running Account (RA) Bills
CREATE TABLE IF NOT EXISTS `client_bills` (
  `id` VARCHAR(50) PRIMARY KEY,
  `project_id` VARCHAR(50) NOT NULL,
  `ra_bill_number` VARCHAR(50) NOT NULL,
  `bill_date` DATE NOT NULL,
  `gross_amount` DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
  `retention_deduction` DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
  `tds_deduction` DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
  `net_payable` DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
  `status` ENUM('submitted', 'certified', 'paid', 'disputed') DEFAULT 'submitted',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`project_id`) REFERENCES `projects`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;
