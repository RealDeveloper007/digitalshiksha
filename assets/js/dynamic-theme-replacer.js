/**
 * Dynamic Theme Color Replacer
 * Replaces hardcoded colors in inline styles with CSS variables
 * Runs after page load to ensure all elements are processed
 */

(function() {
    'use strict';

    // Color mapping: hardcoded colors -> CSS variables
    const colorMap = {
        '#2c3e50': 'var(--theme-primary)',
        '#34495e': 'var(--theme-secondary)',
        '#FFD700': 'var(--theme-accent)',
        '#F1B900': 'var(--theme-accent-alt)',
        '#ffd700': 'var(--theme-accent)', // lowercase variant
        '#f1b900': 'var(--theme-accent-alt)', // lowercase variant
        'rgb(44, 62, 80)': 'var(--theme-primary)', // RGB format
        'rgb(52, 73, 94)': 'var(--theme-secondary)', // RGB format
        'rgb(255, 215, 0)': 'var(--theme-accent)', // RGB format
        'rgb(241, 185, 0)': 'var(--theme-accent-alt)' // RGB format
    };

    /**
     * Replace colors in a style string
     */
    function replaceColorsInStyle(styleValue) {
        if (!styleValue) return styleValue;
        
        let newStyle = styleValue;
        
        // Replace hex colors
        Object.keys(colorMap).forEach(function(hardcodedColor) {
            if (hardcodedColor.startsWith('#')) {
                // Escape special regex characters and match hex color
                const escapedColor = hardcodedColor.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                const regex = new RegExp(escapedColor, 'gi');
                newStyle = newStyle.replace(regex, colorMap[hardcodedColor]);
            }
        });
        
        // Replace in gradients
        newStyle = newStyle.replace(/linear-gradient\(135deg,\s*#2c3e50\s+0%,\s*#34495e\s+100%\)/gi, 
            'linear-gradient(135deg, var(--theme-primary) 0%, var(--theme-secondary) 100%)');
        newStyle = newStyle.replace(/linear-gradient\(135deg,\s*#34495e\s+0%,\s*#2c3e50\s+100%\)/gi, 
            'linear-gradient(135deg, var(--theme-secondary) 0%, var(--theme-primary) 100%)');
        newStyle = newStyle.replace(/linear-gradient\(135deg,\s*#FFD700\s+0%,\s*#F1B900\s+100%\)/gi, 
            'linear-gradient(135deg, var(--theme-accent) 0%, var(--theme-accent-alt) 100%)');
        newStyle = newStyle.replace(/linear-gradient\(135deg,\s*#ffd700\s+0%,\s*#f1b900\s+100%\)/gi, 
            'linear-gradient(135deg, var(--theme-accent) 0%, var(--theme-accent-alt) 100%)');
        
        return newStyle;
    }

    /**
     * Process a single element
     */
    function processElement(element) {
        if (!element || !element.style) return;
        
        const styleAttr = element.getAttribute('style');
        if (!styleAttr) return;
        
        const newStyle = replaceColorsInStyle(styleAttr);
        if (newStyle !== styleAttr) {
            element.setAttribute('style', newStyle);
        }
    }

    /**
     * Process all elements on the page
     */
    function processAllElements() {
        // Process all elements with inline styles
        const elementsWithStyles = document.querySelectorAll('[style]');
        elementsWithStyles.forEach(processElement);
        
        // Process dynamically added elements (for AJAX content)
        if (typeof MutationObserver !== 'undefined') {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    mutation.addedNodes.forEach(function(node) {
                        if (node.nodeType === 1) { // Element node
                            if (node.hasAttribute && node.hasAttribute('style')) {
                                processElement(node);
                            }
                            // Process children
                            const children = node.querySelectorAll ? node.querySelectorAll('[style]') : [];
                            children.forEach(processElement);
                        }
                    });
                });
            });
            
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        }
    }

    /**
     * Initialize when DOM is ready
     */
    function init() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', processAllElements);
        } else {
            processAllElements();
        }
        
        // Also run after a short delay to catch any late-loading content
        setTimeout(processAllElements, 500);
        setTimeout(processAllElements, 1500);
    }

    // Start processing
    init();
})();

