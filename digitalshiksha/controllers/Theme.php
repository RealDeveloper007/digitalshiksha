<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/core/MS_Controller.php';

class Theme extends MS_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('system_model');
    }

    public function dynamic_css()
    {
        // Get system settings
        $settings = $this->system_model->get_system_info();
        
        // Set default colors if not set
        $primary = isset($settings->primary_color) && !empty($settings->primary_color) ? $settings->primary_color : '#2c3e50';
        $secondary = isset($settings->secondary_color) && !empty($settings->secondary_color) ? $settings->secondary_color : '#34495e';
        $accent = isset($settings->accent_color) && !empty($settings->accent_color) ? $settings->accent_color : '#FFD700';
        $accent_alt = isset($settings->accent_color_alt) && !empty($settings->accent_color_alt) ? $settings->accent_color_alt : '#F1B900';
        $text = isset($settings->text_color) && !empty($settings->text_color) ? $settings->text_color : '#333333';
        $text_light = isset($settings->text_color_light) && !empty($settings->text_color_light) ? $settings->text_color_light : '#666666';
        $bg = isset($settings->background_color) && !empty($settings->background_color) ? $settings->background_color : '#ffffff';
        $bg_dark = isset($settings->background_dark) && !empty($settings->background_dark) ? $settings->background_dark : '#1a1a1a';
        
        // Set content type to CSS
        header('Content-Type: text/css');
        header('Cache-Control: public, max-age=3600');
        
        // Output CSS variables
        echo ":root {\n";
        echo "    --theme-primary: " . $primary . ";\n";
        echo "    --theme-secondary: " . $secondary . ";\n";
        echo "    --theme-accent: " . $accent . ";\n";
        echo "    --theme-accent-alt: " . $accent_alt . ";\n";
        echo "    --theme-text: " . $text . ";\n";
        echo "    --theme-text-light: " . $text_light . ";\n";
        echo "    --theme-bg: " . $bg . ";\n";
        echo "    --theme-bg-dark: " . $bg_dark . ";\n";
        echo "}\n";
        
        // Additional dynamic styles
        echo "\n/* Dynamic gradient classes */\n";
        echo ".gradient-primary { background: linear-gradient(135deg, " . $primary . " 0%, " . $secondary . " 100%) !important; }\n";
        echo ".gradient-accent { background: linear-gradient(135deg, " . $accent . " 0%, " . $accent_alt . " 100%) !important; }\n";
        
        echo "\n/* Dynamic border colors */\n";
        echo ".border-accent { border-color: " . $accent . " !important; }\n";
        echo ".border-primary { border-color: " . $primary . " !important; }\n";
        
        echo "\n/* Dynamic text colors */\n";
        echo ".text-accent { color: " . $accent . " !important; }\n";
        echo ".text-primary { color: " . $primary . " !important; }\n";
        
        echo "\n/* Dynamic background colors */\n";
        echo ".bg-accent { background-color: " . $accent . " !important; }\n";
        echo ".bg-primary { background-color: " . $primary . " !important; }\n";
        echo ".bg-secondary { background-color: " . $secondary . " !important; }\n";
    }
}

