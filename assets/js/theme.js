document.addEventListener('DOMContentLoaded', function() {
    console.log('Custom JavaScript for AjaxinWP theme is loaded.');

    // Advanced AJAX logic for handling form submissions, animations, etc.
    const formElements = document.querySelectorAll('form.ajax-form');

    formElements.forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();
            const formData = new FormData(form);
            const actionURL = form.getAttribute('action');

            fetch(actionURL, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      // Handle success (e.g., displaying a success message)
                      console.log('Form submitted successfully.');
                  } else {
                      // Handle error (e.g., displaying error messages)
                      console.error('An error occurred.');
                  }
              }).catch(error => console.error('Error submitting form:', error));
        });
    });
});
