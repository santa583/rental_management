// scripts.js

// Function to validate form inputs (example for add_tenant and edit_tenant)
function validateForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const checkin = document.getElementById('checkin').value;
    const checkout = document.getElementById('checkout').value;

    // Simple validation
    if (!name || !email || !phone || !checkin || !checkout) {
        alert("Please fill out all fields.");
        return false;
    }

    return true;
}

// Attach validation to form submit event (assuming forms use the method 'POST')
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    if (form) {
        form.onsubmit = function() {
            return validateForm(); // Validate before submission
        };
    }
});
