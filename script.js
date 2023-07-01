document.getElementById("healthReportForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
    
    var form = event.target;
    var formData = new FormData(form);
    
    // Send form data to the server using AJAX or fetch API
    fetch(form.action, {
      method: form.method,
      body: formData
    })
    .then(function(response) {
      // Handle the response from the server
      if (response.ok) {
        alert("Form submitted successfully");
        form.reset();
      } else {
        alert("Form submission failed");
      }
    })
    .catch(function(error) {
      alert("An error occurred while submitting the form");
      console.error(error);
    });
});