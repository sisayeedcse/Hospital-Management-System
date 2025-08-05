/* ========================================
   HOSPITAL MANAGEMENT SYSTEM - MAIN JAVASCRIPT
   ======================================== */

document.addEventListener("DOMContentLoaded", function () {
    // ========================================
    // INITIALIZATION
    // ========================================
    initializeApp();

    function initializeApp() {
        setupNavbarBehavior();
        setupBackToTop();
        setupSmoothScrolling();
        setupMobileMenuBehavior();
        setupFormEnhancements();
        setupAnimations();
        setupTooltips();
    }

    // ========================================
    // NAVBAR SCROLL BEHAVIOR
    // ========================================
    function setupNavbarBehavior() {
        const navbar = document.getElementById("mainNavbar");
        const backToTopBtn = document.getElementById("btn-back-to-top");

        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.add("navbar-scrolled");
                if (backToTopBtn) {
                    backToTopBtn.style.display = "block";
                    backToTopBtn.style.opacity = "1";
                }
            } else {
                navbar.classList.remove("navbar-scrolled");
                if (backToTopBtn) {
                    backToTopBtn.style.display = "none";
                    backToTopBtn.style.opacity = "0";
                }
            }
        });
    }

    // ========================================
    // BACK TO TOP FUNCTIONALITY
    // ========================================
    function setupBackToTop() {
        const backToTopBtn = document.getElementById("btn-back-to-top");

        if (backToTopBtn) {
            backToTopBtn.addEventListener("click", function (e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: "smooth",
                });
            });
        }
    }

    // ========================================
    // SMOOTH SCROLLING FOR ANCHOR LINKS
    // ========================================
    function setupSmoothScrolling() {
        const anchorLinks = document.querySelectorAll(
            'a[href*="#"]:not([href="#"])'
        );

        anchorLinks.forEach((link) => {
            link.addEventListener("click", function (e) {
                const targetId = this.getAttribute("href").substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    e.preventDefault();
                    const offsetTop = targetElement.offsetTop - 80;

                    window.scrollTo({
                        top: offsetTop,
                        behavior: "smooth",
                    });
                }
            });
        });
    }

    // ========================================
    // MOBILE MENU BEHAVIOR
    // ========================================
    function setupMobileMenuBehavior() {
        const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
        const navbarCollapse = document.querySelector(".navbar-collapse");
        const navbarToggler = document.querySelector(".navbar-toggler");

        navLinks.forEach((link) => {
            link.addEventListener("click", function () {
                if (window.getComputedStyle(navbarToggler).display !== "none") {
                    // Close mobile menu when link is clicked
                    navbarCollapse.classList.remove("show");
                }
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener("click", function (e) {
            if (
                !navbarCollapse.contains(e.target) &&
                !navbarToggler.contains(e.target)
            ) {
                navbarCollapse.classList.remove("show");
            }
        });
    }

    // ========================================
    // FORM ENHANCEMENTS
    // ========================================
    function setupFormEnhancements() {
        const forms = document.querySelectorAll("form");

        forms.forEach((form) => {
            form.addEventListener("submit", function () {
                const submitBtn = this.querySelector(
                    'button[type="submit"], input[type="submit"]'
                );
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML =
                        '<i class="fas fa-spinner fa-spin"></i> Processing...';
                }
            });
        });

        // Real-time form validation
        const inputs = document.querySelectorAll("input, select, textarea");
        inputs.forEach((input) => {
            input.addEventListener("blur", function () {
                validateField(this);
            });

            input.addEventListener("input", function () {
                if (this.classList.contains("is-invalid")) {
                    validateField(this);
                }
            });
        });
    }

    // ========================================
    // FIELD VALIDATION
    // ========================================
    function validateField(field) {
        const value = field.value.trim();
        const fieldType = field.type;
        const isRequired = field.hasAttribute("required");

        // Remove existing validation classes
        field.classList.remove("is-valid", "is-invalid");

        // Check if required field is empty
        if (isRequired && !value) {
            field.classList.add("is-invalid");
            return false;
        }

        // Email validation
        if (fieldType === "email" && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                field.classList.add("is-invalid");
                return false;
            }
        }

        // Phone validation
        if (fieldType === "tel" && value) {
            const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
            if (!phoneRegex.test(value.replace(/[\s\-\(\)]/g, ""))) {
                field.classList.add("is-invalid");
                return false;
            }
        }

        // Password strength validation
        if (fieldType === "password" && value) {
            if (value.length < 8) {
                field.classList.add("is-invalid");
                return false;
            }
        }

        if (value || !isRequired) {
            field.classList.add("is-valid");
        }

        return true;
    }

    // ========================================
    // SCROLL ANIMATIONS
    // ========================================
    function setupAnimations() {
        const animatedElements = document.querySelectorAll(
            ".fade-in, .content-wrapper"
        );

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = "1";
                        entry.target.style.transform = "translateY(0)";
                    }
                });
            },
            {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px",
            }
        );

        animatedElements.forEach((element) => {
            element.style.opacity = "0";
            element.style.transform = "translateY(20px)";
            element.style.transition = "opacity 0.6s ease, transform 0.6s ease";
            observer.observe(element);
        });
    }

    // ========================================
    // TOOLTIP INITIALIZATION
    // ========================================
    function setupTooltips() {
        const tooltipElements = document.querySelectorAll(
            '[data-toggle="tooltip"]'
        );
        tooltipElements.forEach((element) => {
            new bootstrap.Tooltip(element);
        });
    }

    // ========================================
    // UTILITY FUNCTIONS
    // ========================================

    // Show loading spinner
    function showLoading(element) {
        element.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
        element.disabled = true;
    }

    // Hide loading spinner
    function hideLoading(element, originalText) {
        element.innerHTML = originalText;
        element.disabled = false;
    }

    // Show toast notification
    function showToast(message, type = "info") {
        const toast = document.createElement("div");
        toast.className = `alert alert-${type} toast-notification`;
        toast.innerHTML = `
            <i class="fas fa-${getIconForType(type)}"></i>
            ${message}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        `;

        toast.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.3s ease;
        `;

        document.body.appendChild(toast);

        // Animate in
        setTimeout(() => {
            toast.style.opacity = "1";
            toast.style.transform = "translateX(0)";
        }, 10);

        // Auto remove after 5 seconds
        setTimeout(() => {
            toast.style.opacity = "0";
            toast.style.transform = "translateX(100%)";
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }, 5000);
    }

    // Get icon for toast type
    function getIconForType(type) {
        const icons = {
            success: "check-circle",
            error: "exclamation-circle",
            warning: "exclamation-triangle",
            info: "info-circle",
        };
        return icons[type] || "info-circle";
    }

    // ========================================
    // COUNTER ANIMATION
    // ========================================
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);

        const timer = setInterval(() => {
            start += increment;
            element.textContent = Math.floor(start).toLocaleString();

            if (start >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            }
        }, 16);
    }

    // ========================================
    // EXPOSE GLOBAL FUNCTIONS
    // ========================================
    window.HospitalX = {
        showLoading,
        hideLoading,
        showToast,
        animateCounter,
        validateField,
    };
});

// ========================================
// PRELOADER HANDLING
// ========================================
window.addEventListener("load", function () {
    const preloader = document.querySelector(".preloader");
    if (preloader) {
        preloader.style.opacity = "0";
        setTimeout(() => {
            preloader.style.display = "none";
        }, 300);
    }
});

// ========================================
// ERROR HANDLING
// ========================================
window.addEventListener("error", function (e) {
    console.error("JavaScript Error:", e.error);
    // You can add error reporting here
});

// ========================================
// PERFORMANCE MONITORING
// ========================================
if ("performance" in window) {
    window.addEventListener("load", function () {
        setTimeout(() => {
            const perfData = performance.getEntriesByType("navigation")[0];
            console.log(
                "Page load time:",
                perfData.loadEventEnd - perfData.loadEventStart,
                "ms"
            );
        }, 0);
    });
}
