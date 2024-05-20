<style>

    :root {
        --bs-primary: rgba(136, 120, 143, 0.84);
        --bs-secondary: rgba(110, 43, 140, 0.84);


        --primary-color: #B4B4B8;
        --2-color: #C7C8CC;
        --3-color: #E3E1D9;
        --4-color: rgba(201, 195, 177, 0.56);
    }

    main {
        color: #000000;
        font-family: Georgia, serif;
        padding: 10px 0 20px 0;

        background: linear-gradient(275deg, var(--primary-color), #a0aec0, white, slategray, grey);
        background-size: 600% 600%;
        animation: gradientBackground 9s linear infinite;
    }
        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

    a {
        color: black;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .btn {
        background-color: var(--bs-primary);
        color: #000000;
        padding: 10px 20px;
        transition: background-color 0.6s ease, color 0.3s ease;
        border-color: var(--2-color);
    }

    .btn:hover {
        background-color: var(--bs-secondary);
        color: #fff;
        border-color: white;
    }

    nav {
        background-color: var(--primary-color);
        padding: 10px 0;
        margin-bottom: 0;
    }

    nav a {
        color: var(--4-color);
        margin-right: 20px;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    nav a:hover {
        color: var(--2-color);
    }

    .card {
        background-color: var(--2-color);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        border-width: 5px;
        border-color: var(--3-color);
    }

    .card-second {
        background-color: var(--3-color);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 6px 9px rgba(0, 0, 0, 0.2);
    }

    .sorting-filtering-section {
        padding: 30px;
        border-radius: 50px;
    }

    .form-check-radio {
        margin: 20px 0;
    }

    .filtering-elem {
        display: flex;
        flex-direction: row;
        justify-content: center;
        background-color: var(--3-color);
        padding: 10px;
        border-radius: 10px;
        border-width: 5px;
        border-color: var(--4-color);
        font-size: medium;
    }

    .filtering-elem1 {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: large;
        margin: 0 10px;
        padding: 10px;
        background-color: rgba(0, 0, 0, 0);
        border: 0;
        flex: 1;
    }

    @media (max-width: 768px) {
        .form-check-radio {
            margin: 3px;
        }

        .filtering-elem {
            flex-direction: column;
            padding: 5px;
            font-size: small;
        }

        .filtering-elem1 {
            font-size: large;
            padding: 3px;
            margin: 3px 0;
            width: 100%;
        }
    }

    footer {
        background-color: var(--4-color);
    }




















/*BOOTSTRAPY*/
    .form-control:focus {
        border-color: var(--bs-primary) !important;
        box-shadow: 0 0 0 0.2rem rgba(255, 99, 71, 0.25) !important; /* Dostosuj kolor według potrzeb */
    }

    .custom-control-input:checked ~ .custom-control-label::before {
        border-color: var(--bs-primary) !important;
        background-color: var(--bs-primary) !important;
    }

    .custom-control-input:focus ~ .custom-control-label::before {
        box-shadow: 0 0 0 1px var(--bs-primary) !important;
    }

    .custom-select:focus {
        border-color: var(--bs-primary) !important;
        box-shadow: 0 0 0 0.2rem rgba(255, 99, 71, 0.25) !important; /* Dostosuj kolor według potrzeb */
    }

    .btn-primary {
        background-color: var(--bs-primary) !important;
        border-color: var(--bs-primary) !important;
    }

    .btn-primary:hover,
    .btn-primary:focus {
        background-color: darken(var(--bs-primary), 10%) !important;
        border-color: darken(var(--bs-primary), 10%) !important;
    }

    .text-primary {
        color: var(--bs-primary) !important;
    }

    .bg-primary {
        background-color: var(--bs-primary) !important;
    }

    .border-primary {
        border-color: var(--bs-primary) !important;
    }

    /* Style for radio buttons */
    input[type="radio"]:checked + label::before {
        border-color: var(--bs-primary);
        background-color: var(--bs-primary);
    }

    input[type="radio"]:focus + label::before {
        box-shadow: 0 0 0 0.2rem rgba(255, 99, 71, 0.25);
    }

    /* Style for checkboxes */
    input[type="checkbox"]:checked + label::before {
        border-color: var(--bs-primary);
        background-color: var(--bs-primary);
    }

    input[type="checkbox"]:focus + label::before {
        box-shadow: 0 0 0 0.2rem rgba(255, 99, 71, 0.25);
    }

    /* Specific styles for custom-control bootstrap classes */
    .custom-control-input:checked ~ .custom-control-label::before {
        border-color: var(--bs-primary) !important;
        background-color: var(--bs-primary) !important;
    }

    .custom-control-input:focus ~ .custom-control-label::before {
        box-shadow: 0 0 0 0.2rem rgba(255, 99, 71, 0.25) !important;
    }
</style>
