// Admin Dashboard JavaScript functionality

// Modal functions
function showModal(modalId) {
    document.getElementById(modalId).style.display = "flex";
}

function hideModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

// Success notification
function showSuccessNotification(message) {
    const notification = document.getElementById("successNotification");
    if (notification) {
        notification.querySelector("span").innerText = message;
        notification.style.display = "flex";
        setTimeout(() => {
            notification.style.display = "none";
        }, 3000);
    }
}

// Close modal when clicking outside
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("modal-overlay")) {
        e.target.style.display = "none";
    }
});

// Escape key to close modals
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
        const modals = document.querySelectorAll(".modal-overlay");
        modals.forEach((modal) => {
            modal.style.display = "none";
        });
    }
});

// Form validation helper
function validateRequired(formId) {
    const form = document.getElementById(formId);
    const requiredFields = form.querySelectorAll("[required]");
    let isValid = true;

    requiredFields.forEach((field) => {
        if (!field.value.trim()) {
            field.classList.add("is-invalid");
            isValid = false;
        } else {
            field.classList.remove("is-invalid");
        }
    });

    return isValid;
}

// Email validation helper
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Phone validation helper (basic)
function validatePhone(phone) {
    const phoneRegex = /^[\d\-\+\(\)\s]+$/;
    return phone.length === 0 || phoneRegex.test(phone);
}

// Initialize on page load
document.addEventListener("DOMContentLoaded", function () {
    // Add fade-in animation to page content
    const content = document.querySelector(".content");
    if (content) {
        content.style.opacity = "0";
        setTimeout(() => {
            content.style.transition = "opacity 0.5s ease";
            content.style.opacity = "1";
        }, 100);
    }

    // Initialize tooltips if needed
    const tooltips = document.querySelectorAll("[data-tooltip]");
    tooltips.forEach((tooltip) => {
        tooltip.addEventListener("mouseenter", function () {
            // Add tooltip functionality if needed
        });
    });
});

// Generic AJAX form submission
function submitForm(formId, url, onSuccess, onError) {
    const form = document.getElementById(formId);
    const formData = new FormData(form);

    fetch(url, {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                onSuccess(data);
            } else {
                onError(data);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            onError(error);
        });
}

// Generic delete confirmation
function confirmDelete(message, onConfirm) {
    if (
        confirm(
            message ||
                "Are you sure you want to delete this item? This action cannot be undone."
        )
    ) {
        onConfirm();
    }
}

// Utility function to format dates
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });
}

// Utility function to capitalize first letter
function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

// Auto-hide alerts after 5 seconds
setTimeout(() => {
    const alerts = document.querySelectorAll(".alert");
    alerts.forEach((alert) => {
        alert.style.transition = "opacity 0.5s ease";
        alert.style.opacity = "0";
        setTimeout(() => {
            alert.remove();
        }, 500);
    });
}, 5000);
