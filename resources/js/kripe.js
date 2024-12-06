document.addEventListener('DOMContentLoaded', function() {

    // Quantity control for Product 1
    let quantity1 = 1;
    document.getElementById('increase-qty-1').addEventListener('click', function() {
        quantity1++;
        document.getElementById('quantity-1').value = quantity1;
    });

    document.getElementById('decrease-qty-1').addEventListener('click', function() {
        if (quantity1 > 1) {
            quantity1--;
            document.getElementById('quantity-1').value = quantity1;
        }
    });

    // Quantity control for Product 2
    let quantity2 = 1;
    document.getElementById('increase-qty-2').addEventListener('click', function() {
        quantity2++;
        document.getElementById('quantity-2').value = quantity2;
    });

    document.getElementById('decrease-qty-2').addEventListener('click', function() {
        if (quantity2 > 1) {
            quantity2--;
            document.getElementById('quantity-2').value = quantity2;
        }
    });

    // Handle Buy Now click
    document.querySelectorAll('.buy-btn').forEach(function(buyButton) {
        buyButton.addEventListener('click', function() {
            document.getElementById('payment-method-popup').style.display = 'flex';
            document.body.style.overflow = 'hidden'; // Disable scrolling
        });
    });

    // Handle Payment Method selection
    document.querySelectorAll('.payment-option').forEach(function(paymentOption) {
        paymentOption.addEventListener('click', function() {
            document.getElementById('pay-btn').style.display = 'block';
            document.querySelectorAll('.payment-option').forEach(function(option) {
                option.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });

    // Handle Pay button click
    document.getElementById('pay-btn').addEventListener('click', function() {
        document.getElementById('payment-method-popup').style.display = 'none';
        document.getElementById('payment-success-popup').style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Disable scrolling
    });

    // Close Payment Method Popup
    document.getElementById('close-payment-method-popup').addEventListener('click', function() {
        document.getElementById('payment-method-popup').style.display = 'none';
        document.body.style.overflow = 'auto'; // Enable scrolling
    });

    // Close Payment Success Popup
    document.getElementById('close-payment-success-popup').addEventListener('click', function() {
        document.getElementById('payment-success-popup').style.display = 'none';
        document.body.style.overflow = 'auto'; // Enable scrolling
    });

    // Handle Sign-Up Popup display
    document.getElementById('open-signup').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('signup-popup').style.display = 'flex';
        document.getElementById('login-popup').style.display = 'none'; // Hide login popup if open
        document.body.style.overflow = 'hidden'; // Disable scrolling
    });

    // Handle "Already have an account? Login!" click inside Sign-Up form
    document.getElementById('open-login-popup').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('login-popup').style.display = 'flex';
        document.getElementById('signup-popup').style.display = 'none'; // Hide sign-up popup
        document.body.style.overflow = 'hidden'; // Disable scrolling
    });

    // Handle "Don't have an account? Sign up!" click inside Login form
    document.getElementById('open-signup-popup').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('signup-popup').style.display = 'flex';
        document.getElementById('login-popup').style.display = 'none'; // Hide login popup
        document.body.style.overflow = 'hidden'; // Disable scrolling
    });

    // Close Sign-Up popup
    document.getElementById('close-signup-popup').addEventListener('click', function() {
        document.getElementById('signup-popup').style.display = 'none';
        document.body.style.overflow = 'auto'; // Enable scrolling
    });

    // Close Login popup
    document.getElementById('close-login-popup').addEventListener('click', function() {
        document.getElementById('login-popup').style.display = 'none';
        document.body.style.overflow = 'auto'; // Enable scrolling
    });

    // Handle payment method selection change
    document.querySelectorAll('.payment-option').forEach(function(paymentOption) {
        paymentOption.addEventListener('click', function() {
            // Remove the dimming class from all payment options
            document.querySelectorAll('.payment-option').forEach(function(option) {
                option.classList.remove('selected');
                option.style.opacity = '0.5';  // Dim all options
            });

            // Highlight the selected payment option
            this.classList.add('selected');
            this.style.opacity = '1';  // Highlight the selected option
        });
    });

    // Handle Buy button inside payment method
    document.querySelectorAll('.buy-btn').forEach(function(buyButton) {
        buyButton.addEventListener('click', function() {
            const paymentMethod = this.parentElement.querySelector('.payment-method');
            if (paymentMethod.value) {
                document.getElementById('payment-success-popup').style.display = 'flex';
                document.body.style.overflow = 'hidden'; // Disable scrolling
            } else {
                alert('Please select a payment method before proceeding.');
            }
        });
    });

});
