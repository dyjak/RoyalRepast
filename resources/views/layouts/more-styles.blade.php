<style>
:root {
--bs-primary: rgba(255, 255, 255, 0.78);
--bs-secondary: rgba(255, 255, 255, 0.4);

--primary-color: rgba(180, 180, 184, 0.75);
--2-color: rgba(198, 199, 204, 0.63);
--3-color: rgba(227, 225, 217, 0.66);
--4-color: rgb(201, 195, 177);
}

html, body {
height: auto;
}

main {
min-height: 100vh;
display: flex;
flex-direction: column;
}


.container {
flex: 1;
}

main {
color: #000000;
font-family: Georgia, serif;
padding: 10px 0 20px 0;
background: linear-gradient(275deg, var(--primary-color), #a5cdf8, #fcdfdf, slategray, grey);
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

.btn-danger {
background-color: rgba(73, 73, 73, 0.58);
color: white;
border: 1px solid white;
}

.btn-secondary {
background-color: rgba(143, 143, 143, 0.53);
color: white;
border: 1px solid white;
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
flex-shrink: 0;
}

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.table-responsive .table {
    width: 100%;
    min-width: 600px;
}

td{
    text-align: center;
    align-content: center;
}

/*BOOTSTRAPY*/
.form-check-radio, .form-check {
display: flex;
align-items: center;
}

.form-check-input {
width: 1.25rem;
height: 1.25rem;
margin-right: 0.5rem;
border: 2px solid var(--bs-primary);
border-radius: 50%;
background-color: transparent;
transition: background-color 0.3s ease, border-color 0.3s ease;
}

.form-check-input:checked {
background-color: var(--bs-primary);
border-color: var(--bs-primary);
}

.form-check-input:active {
background-color: var(--bs-secondary);
border-color: var(--bs-secondary);
}

.form-check-label {
display: flex;
align-items: center;
font-size: 1rem;
color: #333;
}

.form-check-label i {
margin-right: 0.5rem;
}

.form-check-input[type="checkbox"] {
border-radius: 0.25rem;
}

.form-check-input[type="checkbox"]:checked {
background-color: var(--bs-primary);
border-color: var(--bs-primary);
}

.form-check-input[type="checkbox"]:active {
background-color: var(--bs-secondary);
border-color: var(--bs-secondary);
}

.input-group .form-control {
border: 2px solid var(--bs-primary);
transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.input-group .form-control:focus {
border-color: var(--bs-primary);
box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.input-group .form-control:active {
border-color: var(--bs-secondary);
box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.25);
}

.btn-primary {
background-color: var(--bs-primary);
border-color: black;
}

.btn-primary:hover, .btn-primary:focus {
background-color: darken(var(--bs-primary), 10%);
border-color: darken(var(--bs-primary), 10%);
}

.btn-primary:active {
background-color: var(--bs-secondary);
border-color: var(--bs-secondary);
}
</style>
