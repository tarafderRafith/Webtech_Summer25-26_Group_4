document.addEventListener("DOMContentLoaded", function() {
    // ==========================================
    // 1. Universal Form Validation 
    // ==========================================
    const forms = document.querySelectorAll("form");

    forms.forEach(form => {
        form.addEventListener("submit", function(event) {
            let isValid = true;
            let errorMessage = "";

            // Select all possible inputs across your different pages
            const fullname = form.querySelector('input[name="fullname"]');
            const email = form.querySelector('input[type="email"]');
            const password = form.querySelector('input[name="password"]');
            const confirmPassword = form.querySelector('input[name="confirm_password"]');
            const title = form.querySelector('input[name="title"]');
            const category = form.querySelector('input[name="category"]');
            const description = form.querySelector('textarea[name="description"]');

            // --- Authentication Validation (Logins & Registers) ---
            if (fullname && fullname.value.trim() === "") {
                isValid = false;
                errorMessage += "• Full Name is required.\n";
            }
            if (email && email.value.trim() === "") {
                isValid = false;
                errorMessage += "• Email is required.\n";
            }
            if (password && password.value.trim() === "") {
                isValid = false;
                errorMessage += "• Password is required.\n";
            }
            if (password && confirmPassword) {
                if (confirmPassword.value.trim() === "") {
                    isValid = false;
                    errorMessage += "• Please confirm your password.\n";
                } else if (password.value !== confirmPassword.value) {
                    isValid = false;
                    errorMessage += "• Passwords do not match.\n";
                }
            }

            // --- Complaint Form Validation ---
            if (title && title.value.trim() === "") {
                isValid = false;
                errorMessage += "• Complaint Title is required.\n";
            }
            if (category && category.value.trim() === "") {
                isValid = false;
                errorMessage += "• Category is required.\n";
            }
            if (description && description.value.trim() === "") {
                isValid = false;
                errorMessage += "• Please provide a description for your complaint.\n";
            }

            // Stop form submission and alert user if errors exist
            if (!isValid) {
                event.preventDefault(); 
                alert("Please fix the following errors:\n\n" + errorMessage);
            }
        });
    });

    // ==========================================
    // 2. Dashboard Card Interactions
    // ==========================================
    const dashboardCards = document.querySelectorAll(".dashboard-card");
    
    dashboardCards.forEach(card => {
        card.addEventListener("click", function(event) {
            // Prevent empty links (href="#") from jumping to the top of the page
            if (this.getAttribute("href") === "#") {
                event.preventDefault();
                alert("This feature is under development and will be available soon!");
            }
        });
    });
});