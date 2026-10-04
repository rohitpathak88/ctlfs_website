/**
 * Customizer Collapsible Sections
 */
(function($) {
    'use strict';
    
    function initCollapsibleSections() {
        // Build group containers for each collapsible section
        $('.cjl-collapsible-section').each(function() {
            var $section = $(this);
            var $control = $section.closest('.customize-control');
            
            // Check if group already exists after this control
            var $existingGroup = $control.next('.cjl-collapsible-group');
            if ($existingGroup.length) {
                return; // Already processed
            }
            
            var $nextControls = $();

            // Collect following controls until the next collapsible header control
            $control.nextAll().each(function() {
                var $candidate = $(this);
                if ($candidate.find('.cjl-collapsible-section').length) {
                    return false; // stop when next header found
                }
                $nextControls = $nextControls.add(this);
            });

            // Wrap related controls
            if ($nextControls.length > 0) {
                $nextControls.wrapAll('<div class="cjl-collapsible-group"></div>');
            }
        });
        
        // Handle collapsible toggle clicks
        $(document).off('click', '.cjl-collapsible-toggle').on('click', '.cjl-collapsible-toggle', function(e) {
            e.preventDefault();
            var $toggle = $(this);
            var $section = $toggle.closest('.cjl-collapsible-section');
            var $control = $section.closest('.customize-control');
            var $content = $section.find('.cjl-collapsible-content');
            var $icon = $toggle.find('.dashicons');
            var $group = $control.next('.cjl-collapsible-group');
            
            // Check if currently expanded (toggle state is aria-expanded="true")
            var isExpanded = $toggle.attr('aria-expanded') === 'true';
            
            if (isExpanded) {
                // Collapse
                $content.slideUp(200);
                if ($group.length) {
                    $group.slideUp(200);
                }
                $icon.removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-right-alt2');
                $toggle.attr('aria-expanded', 'false');
            } else {
                // Expand
                $content.slideDown(200);
                if ($group.length) {
                    $group.slideDown(200);
                }
                $icon.removeClass('dashicons-arrow-right-alt2').addClass('dashicons-arrow-down-alt2');
                $toggle.attr('aria-expanded', 'true');
            }
        });
        
        // Initialize state - expand first, collapse others
        $('.cjl-collapsible-section').each(function(index) {
            var $section = $(this);
            var $control = $section.closest('.customize-control');
            var $toggle = $section.find('.cjl-collapsible-toggle');
            var $content = $section.find('.cjl-collapsible-content');
            var $icon = $toggle.find('.dashicons');
            var $group = $control.next('.cjl-collapsible-group');
            
            if (index === 0) {
                // First section - expanded by default
                $content.show();
                if ($group.length) {
                    $group.show();
                }
                $icon.removeClass('dashicons-arrow-right-alt2').addClass('dashicons-arrow-down-alt2');
                $toggle.attr('aria-expanded', 'true');
            } else {
                // Other sections - collapsed by default
                $content.hide();
                if ($group.length) {
                    $group.hide();
                }
                $icon.removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-right-alt2');
                $toggle.attr('aria-expanded', 'false');
            }
        });
    }
    
    // Initialize on document ready
    $(document).ready(function() {
        initCollapsibleSections();
    });
    
    // Re-initialize when customizer sections are expanded/collapsed
    $(document).on('expanded', '.control-section', function() {
        setTimeout(initCollapsibleSections, 100);
    });
    
    // Re-initialize when customizer is ready
    wp.customize.bind('ready', function() {
        setTimeout(initCollapsibleSections, 200);
    });
    
})(jQuery);
