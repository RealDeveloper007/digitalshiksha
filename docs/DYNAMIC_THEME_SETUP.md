# Dynamic Theme Color System

## Overview
This system allows administrators to change the color scheme of all frontend pages dynamically from the admin panel, without modifying code.

## Setup Instructions

### 1. Database Migration
Run the SQL migration to add color fields to the settings table:
```sql
-- File: digitalshiksha/migrations/add_color_fields.sql
-- Run this SQL in your database
```

Or manually add these columns to the `settings` table:
- `primary_color` VARCHAR(7) DEFAULT '#2c3e50'
- `secondary_color` VARCHAR(7) DEFAULT '#34495e'
- `accent_color` VARCHAR(7) DEFAULT '#FFD700'
- `accent_color_alt` VARCHAR(7) DEFAULT '#F1B900'
- `text_color` VARCHAR(7) DEFAULT '#333333'
- `text_color_light` VARCHAR(7) DEFAULT '#666666'
- `background_color` VARCHAR(7) DEFAULT '#ffffff'
- `background_dark` VARCHAR(7) DEFAULT '#1a1a1a'

### 2. Admin Panel Access
1. Login as admin
2. Go to System Settings
3. Click on "Theme & Colors" tab
4. Adjust colors using color pickers
5. Click "Save Color Settings"

## How It Works

### CSS Variables
The system uses CSS variables (custom properties) that are dynamically set based on admin settings:
- `--theme-primary`: Main dark color
- `--theme-secondary`: Secondary dark color
- `--theme-accent`: Main accent/highlight color
- `--theme-accent-alt`: Alternative accent color
- `--theme-text`: Main text color
- `--theme-text-light`: Light text color
- `--theme-bg`: Background color
- `--theme-bg-dark`: Dark background color

### Helper Functions
Use these PHP helper functions in views:

```php
<?php
$this->load->helper('theme');

// Get single color
$primary = get_theme_color('primary_color', '#2c3e50');

// Get all colors
$colors = get_theme_colors();
echo $colors['accent']; // Outputs: #FFD700 (or custom value)
?>
```

## Updating Frontend Pages

### Method 1: Using CSS Variables (Recommended)
Replace hardcoded colors with CSS variables:

**Before:**
```css
background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
border-bottom: 3px solid #FFD700;
color: #FFD700;
```

**After:**
```css
background: linear-gradient(135deg, var(--theme-primary) 0%, var(--theme-secondary) 100%);
border-bottom: 3px solid var(--theme-accent);
color: var(--theme-accent);
```

### Method 2: Using Inline Styles with PHP
For dynamic inline styles:

```php
<?php
$this->load->helper('theme');
$colors = get_theme_colors();
?>

<div style="background: linear-gradient(135deg, <?= $colors['primary'] ?> 0%, <?= $colors['secondary'] ?> 100%);">
    <h2 style="color: <?= $colors['accent'] ?>;">Title</h2>
</div>
```

### Method 3: Using Helper Function Directly
```php
<?php $this->load->helper('theme'); ?>
<div style="background-color: <?= get_theme_color('primary_color') ?>;">
    Content
</div>
```

## Common Color Replacements

| Old Hardcoded Color | New Dynamic Variable | Usage |
|---------------------|---------------------|-------|
| `#2c3e50` | `var(--theme-primary)` or `get_theme_color('primary_color')` | Headers, dark backgrounds |
| `#34495e` | `var(--theme-secondary)` or `get_theme_color('secondary_color')` | Secondary backgrounds |
| `#FFD700` | `var(--theme-accent)` or `get_theme_color('accent_color')` | Borders, icons, highlights |
| `#F1B900` | `var(--theme-accent-alt)` or `get_theme_color('accent_color_alt')` | Gradient ends |
| `#333333` | `var(--theme-text)` or `get_theme_color('text_color')` | Main text |
| `#666666` | `var(--theme-text-light)` or `get_theme_color('text_color_light')` | Secondary text |
| `#ffffff` | `var(--theme-bg)` or `get_theme_color('background_color')` | Backgrounds |
| `#1a1a1a` | `var(--theme-bg-dark)` or `get_theme_color('background_dark')` | Dark sections |

## Example: Updating a Page

### Before (Hardcoded):
```php
<section style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
    <h2 style="color: #FFD700;">Title</h2>
    <p style="color: #333;">Content</p>
</section>
```

### After (Dynamic):
```php
<?php $this->load->helper('theme'); ?>
<section style="background: linear-gradient(135deg, var(--theme-primary) 0%, var(--theme-secondary) 100%);">
    <h2 style="color: var(--theme-accent);">Title</h2>
    <p style="color: var(--theme-text);">Content</p>
</section>
```

Or using PHP:
```php
<?php 
$this->load->helper('theme');
$colors = get_theme_colors();
?>
<section style="background: linear-gradient(135deg, <?= $colors['primary'] ?> 0%, <?= $colors['secondary'] ?> 100%);">
    <h2 style="color: <?= $colors['accent'] ?>;">Title</h2>
    <p style="color: <?= $colors['text'] ?>;">Content</p>
</section>
```

## Files to Update

Update these frontend view files to use dynamic colors:
- `views/content/home_page.php`
- `views/content/view_all_mocks.php`
- `views/content/view_my_results.php`
- `views/content/mock_detail.php`
- `views/form/join_batch.php`
- `views/form/batch_add_form.php`
- `views/form/batch_edit_form.php`
- `views/form/mock_form.php`
- `views/form/question_form.php`
- `views/form/question_new_form.php`
- `views/form/set_time_n_random_ques_no.php`
- `views/content/view_sub_sub_categories.php`
- `views/form/sub_subcategory_form.php`
- `views/contact_form.php`
- `views/footer/footer.php`
- And any other frontend pages

## Testing

1. Go to admin panel → System Settings → Theme & Colors
2. Change colors and save
3. Refresh frontend pages
4. Colors should update immediately

## Notes

- Colors are cached in session for performance
- CSS variables work in all modern browsers
- Fallback to default colors if settings are not available
- Changes take effect immediately after saving

