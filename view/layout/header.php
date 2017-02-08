<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GeoWorld</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,400,400i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="/css/superformreset.css">
    <link rel="stylesheet" href="/css/libs/flag-icon.min.css">
    <link rel="stylesheet" href="/css/styles.css">

</head>
<body>
<!-- ToDo: Make this the default page, rather than in the header template file -->
<header role="group" style="background:radial-gradient(transparent, black), url('/img/features/sand-from-space.jpg'); background-size:cover; ">

    <nav role="navigation">
        <div class="nav-brand">
            <h1>GeoWorld</h1>
        </div>
        <div class="nav-right">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Countries</a></li>
                <li><a href="#">Continents</a></li>
            </ul>
        </div>
    </nav>

    <!-- Checks if the current page is homempage (Country::index), if so shows the search bar
     ToDo: seprate the whole nav / header-feature to separate elements and include -->
    <?php if ($routing['controller'] == 'Country' && $routing['action'] == 'index') : ?>
    <div class="header-feature">
        <div class="header-search">
            <form action="/country/search" method="post" role="search">
                <input name="countryQuery" type="search" placeholder="Search" role="search">
            </form>
        </div>
    </div>
    <?php endif; ?>

</header>

<main role="main">
