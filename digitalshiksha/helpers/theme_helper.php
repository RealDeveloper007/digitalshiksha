<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Get theme color from session or return default
 */
if (!function_exists('get_theme_color')) {
    function get_theme_color($color_name, $default = '#2c3e50')
    {
        $CI =& get_instance();
        $color = $CI->session->userdata($color_name);
        return !empty($color) ? $color : $default;
    }
}

/**
 * Get all theme colors as array
 */
if (!function_exists('get_theme_colors')) {
    function get_theme_colors()
    {
        $CI =& get_instance();
        return array(
            'primary' => get_theme_color('primary_color', '#2c3e50'),
            'secondary' => get_theme_color('secondary_color', '#34495e'),
            'accent' => get_theme_color('accent_color', '#FFD700'),
            'accent_alt' => get_theme_color('accent_color_alt', '#F1B900'),
            'text' => get_theme_color('text_color', '#333333'),
            'text_light' => get_theme_color('text_color_light', '#666666'),
            'bg' => get_theme_color('background_color', '#ffffff'),
            'bg_dark' => get_theme_color('background_dark', '#1a1a1a'),
        );
    }
}

/**
 * Generate inline CSS with theme colors
 */
if (!function_exists('theme_inline_css')) {
    function theme_inline_css()
    {
        $CI =& get_instance();
        $CI->load->model('system_model');
        
        // Get fresh data from database (not session) to ensure latest values
        $settings = $CI->system_model->get_system_info();
        
        // Set colors with defaults
        $primary = isset($settings->primary_color) && !empty($settings->primary_color) ? $settings->primary_color : '#2c3e50';
        $secondary = isset($settings->secondary_color) && !empty($settings->secondary_color) ? $settings->secondary_color : '#34495e';
        $accent = isset($settings->accent_color) && !empty($settings->accent_color) ? $settings->accent_color : '#FFD700';
        $accent_alt = isset($settings->accent_color_alt) && !empty($settings->accent_color_alt) ? $settings->accent_color_alt : '#F1B900';
        $text = isset($settings->text_color) && !empty($settings->text_color) ? $settings->text_color : '#333333';
        $text_light = isset($settings->text_color_light) && !empty($settings->text_color_light) ? $settings->text_color_light : '#666666';
        $bg = isset($settings->background_color) && !empty($settings->background_color) ? $settings->background_color : '#ffffff';
        $bg_dark = isset($settings->background_dark) && !empty($settings->background_dark) ? $settings->background_dark : '#1a1a1a';
        
        // Add cache-busting timestamp
        $timestamp = isset($settings->last_update) ? strtotime($settings->last_update) : time();
        
        $css = "<style id='dynamic-theme-inline' data-timestamp='{$timestamp}'>\n";
        $css .= ":root {\n";
        $css .= "    --theme-primary: " . htmlspecialchars($primary, ENT_QUOTES, 'UTF-8') . ";\n";
        $css .= "    --theme-secondary: " . htmlspecialchars($secondary, ENT_QUOTES, 'UTF-8') . ";\n";
        $css .= "    --theme-accent: " . htmlspecialchars($accent, ENT_QUOTES, 'UTF-8') . ";\n";
        $css .= "    --theme-accent-alt: " . htmlspecialchars($accent_alt, ENT_QUOTES, 'UTF-8') . ";\n";
        $css .= "    --theme-text: " . htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . ";\n";
        $css .= "    --theme-text-light: " . htmlspecialchars($text_light, ENT_QUOTES, 'UTF-8') . ";\n";
        $css .= "    --theme-bg: " . htmlspecialchars($bg, ENT_QUOTES, 'UTF-8') . ";\n";
        $css .= "    --theme-bg-dark: " . htmlspecialchars($bg_dark, ENT_QUOTES, 'UTF-8') . ";\n";
        $css .= "}\n";
        $css .= "</style>\n";
        
        return $css;
    }
}

