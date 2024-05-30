<footer style="background-color: var(--primary-color); padding: 20px; color: black;">
    <div class="container text-center">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 mb-3 mb-md-0 text-center">
                <img src="{{ asset('favicon.png') }}" alt="App Logo" class="mx-auto d-block"
                     style="width: 150px; height: auto;">
                <p class="mt-3">© 2024 Michał Dyjak. All rights reserved.</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0 text-center">
                <h5>Contact Us</h5>
                <p><i class="fas fa-envelope"></i> info@royalrepast.com</p>
                <p><i class="fas fa-phone"></i> +111 665 334 556</p>
                <p><i class="fas fa-map-marker-alt"></i> 123 Main Street, Rzeszow</p>
            </div>
            <div class="col-md-4 text-center">
                <h5>Follow Us</h5>
                <a href="https://facebook.com" class="text-dark me-2" style="font-size: 1.5rem;">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://twitter.com" class="text-dark me-2" style="font-size: 1.5rem;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://instagram.com" class="text-dark me-2" style="font-size: 1.5rem;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://linkedin.com" class="text-dark me-2" style="font-size: 1.5rem;">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-3 mb-md-0 text-center">
            <a href="{{ route('restaurant-category-chart') }}" style="letter-spacing: 10px;">Categories</a>
        </div>
    </div>
</footer>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    footer {
        background-color: white;
        padding: 20px;
        color: black;
    }

    footer h5 {
        margin-bottom: 15px;
        font-size: 1.25rem;
    }

    footer p {
        margin: 5px 0;
    }

    footer a {
        color: black;
        transition: color 0.3s;
    }

    footer a:hover {
        color: #555;
    }

    @media (max-width: 768px) {
        footer .text-md-left, footer .text-md-right {
            text-align: center !important;
        }
    }
</style>
