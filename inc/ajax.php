<?php
// Fetch ajax data for pages

add_action('template_redirect', function() {
    if (is_ajax_request()) {
        // Dynamically determine the part of the content to load.
        // This assumes you're passing a query variable (e.g., ?content_type=post) in your AJAX request URL.
        $content_type = isset($_GET['content_type']) ? sanitize_text_field($_GET['content_type']) : 'default';

        // Map content types to specific template parts.
        switch ($content_type) {
            case 'post':
                $template_part = 'partials-single';
                break;
            case 'page':
                $template_part = 'partials-page';
                break;
            case 'archive':
                $template_part = 'partials-archive';
                break;
            // Add more cases as needed.
            default:
                $template_part = 'partials-content';
                break;
        }

        // Load the specified template part.
        get_template_part('partials/' . $template_part);

        exit;
    }
});
