class AjaxinWP {
    constructor() {
        this.init();
    }

    init() {
        this.setupEventListeners();
    }

    setupEventListeners() {
        document.addEventListener('click', e => {
            const target = e.target.closest('a');

            if (target && this.isInternalLink(target)) {
                e.preventDefault();
                this.loadContent(target.href);
            }
        });

        window.addEventListener('popstate', e => {
            this.loadContent(location.href, false);
        });
    }

    isInternalLink(linkElement) {
        return linkElement.host === window.location.host;
    }

    loadContent(url, updateHistory = true) {
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(response => response.text())
          .then(content => {
              document.querySelector('#ajax-container').innerHTML = content;

              if (updateHistory) {
                  history.pushState({}, '', url);
              }
          }).catch(error => console.error('Error loading the content:', error));
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new AjaxinWP();
});
