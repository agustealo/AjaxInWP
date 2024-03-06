document.addEventListener('DOMContentLoaded', () => {
    const siteNavigation = document.getElementById('site-navigation');

    if (siteNavigation) {
        siteNavigation.addEventListener('click', e => {
            e.preventDefault();

            let target = e.target.closest('a');
            if (!target || !target.href) return;

            // Assuming AjaxinWP class is already defined and instantiated
            if (typeof ajaxinWP !== 'undefined') {
                ajaxinWP.loadContent(target.href);
            }
        });
    }

    window.addEventListener('popstate', e => {
        // Load content based on history state
        if (typeof ajaxinWP !== 'undefined') {
            ajaxinWP.loadContent(location.href, false);
        }
    });
});
