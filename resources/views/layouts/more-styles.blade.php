<style>

    :root {
        --primary-color: rgba(255, 255, 204, 0.7); /* Jasny żółty */
        --2-color: rgba(255, 255, 153, 0.7); /* Średni żółty */
        --3-color: rgba(255, 255, 102, 0.7); /* Ciemny żółty */
        --4-color: rgba(255, 255, 51, 0.7); /* Bardzo ciemny żółty */
    }

    main {
        background-color: var(--primary-color);
        color: #000000;
        font-family: Georgia, serif;
        padding: 10px 0 20px 0;
    }

    a {
        color: black;
        text-decoration: none;
        transition: color 0.3s ease;
    }


    .btn {
        background-color: transparent;
        color: #000000;
        padding: 10px 20px;
        transition: background-color 0.6s ease, color 0.3s ease;
        border-color: var(--2-color);
    }

    .btn:hover {
        background-color: var(--2-color);
        color: #fff;
        border-color: var(--2-color);
    }


    nav {
        background-color: var(--primary-color);
        padding: 10px 0;
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
    }

    .card-second {
        background-color: var(--3-color);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 6px 9px rgba(0, 0, 0, 0.2);
    }

    .sorting-filtering-section{
        background-color: var(--4-color);
        padding: 20px;
        border-radius: 30px;
    }


    footer{
        background-color: var(--4-color);
    }

</style>
