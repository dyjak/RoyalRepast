<style>
    /* Dodatkowe style CSS */

    /* Fioletowe akcenty */
    :root {
        --primary-color: rgba(241, 234, 255, 0.7);
        --2-color: rgba(229, 212, 255, 0.7);
        --3-color: rgba(220, 191, 255, 0.7);
        --4-color: rgba(208, 162, 247, 0.7);
    }

    main {
        padding-top: 50px;
        background-color: var(--primary-color);
        color: #000000; /* Kolor tekstu */
        font-family: 'Roboto', sans-serif;
    }

    /* Linki */
    a {
        color: black;
        text-decoration: none;
        transition: color 0.3s ease;
    }


    /* Przyciski */
    .btn {
        background-color: transparent;
        color: #000000;
        padding: 10px 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn:hover {
        background-color: var(--4-color);
        color: #fff;
    }

    /* Nawigacja */
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

    /* Karty */
    .card {
        background-color: var(--2-color); /* Lekko fioletowe tło kart */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .card-second {
        background-color: var(--3-color); /* Lekko fioletowe tło kart */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 6px 9px rgba(0, 0, 0, 0.2);
    }

</style>
