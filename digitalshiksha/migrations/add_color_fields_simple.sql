-- Simple Migration: Add color theme fields to settings table
-- Run this SQL if the columns don't exist yet
-- If you get "Duplicate column" errors, the columns already exist - that's fine!

ALTER TABLE `settings` 
ADD COLUMN `primary_color` VARCHAR(7) DEFAULT '#2c3e50' AFTER `last_update`,
ADD COLUMN `secondary_color` VARCHAR(7) DEFAULT '#34495e' AFTER `primary_color`,
ADD COLUMN `accent_color` VARCHAR(7) DEFAULT '#FFD700' AFTER `secondary_color`,
ADD COLUMN `accent_color_alt` VARCHAR(7) DEFAULT '#F1B900' AFTER `accent_color`,
ADD COLUMN `text_color` VARCHAR(7) DEFAULT '#333333' AFTER `accent_color_alt`,
ADD COLUMN `text_color_light` VARCHAR(7) DEFAULT '#666666' AFTER `text_color`,
ADD COLUMN `background_color` VARCHAR(7) DEFAULT '#ffffff' AFTER `text_color_light`,
ADD COLUMN `background_dark` VARCHAR(7) DEFAULT '#1a1a1a' AFTER `background_color`;

