// Contact Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize contact page functionality
    initContactForm();
    initTypingEffect();
    initConnectionStatus();
    initHoverEffects();
});

// Typing Effect for Title
function initTypingEffect() {
    const title = document.querySelector('.contact-form-title');
    if (!title) return;
    
    const originalText = title.textContent;
    const terminalIcon = title.querySelector('i');
    
    // Clear text and keep icon
    title.innerHTML = '';
    if (terminalIcon) {
        title.appendChild(terminalIcon);
    }
    
    const textSpan = document.createElement('span');
    title.appendChild(textSpan);
    
    let i = 0;
    const typeWriter = () => {
        if (i < originalText.length) {
            textSpan.textContent += originalText.charAt(i);
            i++;
            setTimeout(typeWriter, 100);
        } else {
            // Add blinking cursor effect
            textSpan.style.borderRight = '2px solid #2A7CF7';
            textSpan.style.animation = 'blink 1s infinite';
        }
    };
    
    setTimeout(typeWriter, 500);
}

// Connection Status Animation
function initConnectionStatus() {
    const statusDot = document.querySelector('.status-dot');
    const statusText = document.querySelector('.status-text');
    
    if (statusDot && statusText) {
        // Simulate connection check
        setTimeout(() => {
            statusDot.style.background = '#10b981';
            statusText.textContent = 'SECURE CONNECTION ESTABLISHED';
            statusText.style.color = '#10b981';
        }, 1000);
    }
}

// Contact Form Handling
function initContactForm() {
    const form = document.querySelector('.contact-form');
    const submitBtn = document.getElementById('submitBtn');
    
    if (!form) return;
    
    // Form submission handling
    form.addEventListener('submit', function(e) {
        showLoadingState(submitBtn, true);
        
        // Add a small delay to show loading state
        setTimeout(() => {
            // Form will submit normally
        }, 500);
    });
    
    // Input focus effects
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
        

    });
}

// Loading State Management
function showLoadingState(button, isLoading) {
    if (!button) return;
    
    const buttonText = button.querySelector('.button-text');
    const buttonLoading = button.querySelector('.button-loading');
    
    if (isLoading) {
        buttonText.style.display = 'none';
        buttonLoading.style.display = 'flex';
        button.disabled = true;
    } else {
        buttonText.style.display = 'flex';
        buttonLoading.style.display = 'none';
        button.disabled = false;
    }
}

// Hover Effects
function initHoverEffects() {
    // Contact method items hover effect
    const methodItems = document.querySelectorAll('.contact-method-item');
    methodItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(10px) scale(1.02)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0) scale(1)';
        });
    });
    
    // Form inputs hover effect
    const inputs = document.querySelectorAll('.cyber-input, .cyber-select, .cyber-textarea');
    inputs.forEach(input => {
        input.addEventListener('mouseenter', function() {
            this.style.borderColor = '#2A7CF7';
            this.style.boxShadow = '0 0 0 3px rgba(42, 124, 247, 0.1)';
        });
        
        input.addEventListener('mouseleave', function() {
            if (!this.matches(':focus')) {
                this.style.borderColor = '#e2e8f0';
                this.style.boxShadow = 'none';
            }
        });
    });
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes blink {
        0%, 50% { border-right-color: #2A7CF7; }
        51%, 100% { border-right-color: transparent; }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    

    
    .contact-form-container,
    .contact-info-container {
        animation: fadeInUp 0.6s ease-out;
    }
    
    .form-group.focused .form-label {
        color: #2A7CF7;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
    
    .cyber-button:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    .contact-method-item {
        transition: all 0.3s ease;
    }
    
    .cyber-input,
    .cyber-select,
    .cyber-textarea {
        transition: all 0.3s ease;
    }
`;
document.head.appendChild(style);

// Add success message animation
function showSuccessMessage(message) {
    const alert = document.createElement('div');
    alert.className = 'alert alert-success alert-dismissible fade show';
    alert.innerHTML = `
        <i class="fas fa-check-circle"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    const formContainer = document.querySelector('.contact-form-container');
    if (formContainer) {
        formContainer.insertBefore(alert, formContainer.firstChild);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            alert.remove();
        }, 5000);
    }
}

// Add error message animation
function showErrorMessage(message) {
    const alert = document.createElement('div');
    alert.className = 'alert alert-danger alert-dismissible fade show';
    alert.innerHTML = `
        <i class="fas fa-exclamation-triangle"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    const formContainer = document.querySelector('.contact-form-container');
    if (formContainer) {
        formContainer.insertBefore(alert, formContainer.firstChild);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            alert.remove();
        }, 5000);
    }
}



// Add typing sound effect simulation
function simulateTypingSound() {
    const inputs = document.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            // Add a subtle visual effect to simulate typing sound
            this.style.boxShadow = '0 0 5px rgba(42, 124, 247, 0.3)';
            setTimeout(() => {
                this.style.boxShadow = '';
            }, 100);
        });
    });
}

// Initialize typing sound simulation
simulateTypingSound();

// Add scroll reveal effect
function initScrollReveal() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    const elements = document.querySelectorAll('.contact-form-container, .contact-info-container');
    elements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });
}

// Initialize scroll reveal
initScrollReveal(); 