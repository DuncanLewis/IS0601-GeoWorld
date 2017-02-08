<?php
/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 07/02/2017
 * Time: 13:21
 */

?>


<!--array (size=15)
'A3Code' => string 'JPN' (length=3)
'A2Code' => string 'JP' (length=2)
'Name' => string 'Japan' (length=5)
'Continent' => string 'AS' (length=2)
'Region' => string 'Eastern Asia' (length=12)
'SurfaceArea' => string '377829.00' (length=9)
'IndepYear' => string '-660' (length=4)
'Population' => string '126714000' (length=9)
'LifeExpectancy' => string '80.7' (length=4)
'GNP' => string '3787042.00' (length=10)
'LocalName' => string 'Nihon/Nippon' (length=12)
'GovernmentForm' => string 'Constitutional Monarchy' (length=23)
'HeadOfState' => string 'Akihito' (length=7)
'Capital' => string '1532' (length=4)
'tld' => string 'jp' (length=2)-->

<article id="country-profile">

    <header>
        <div class="flex-grid">

            <div class="col">
                <div class="flag-thumbnail flag-icon-<?php echo strtolower($country['A2Code']); ?> flag-icon-background flag-icon-squared h-center"></div>

                <h2> <?php echo $country['Name']; ?></h2>
                <h3><?php echo $country['Continent']; ?></h3>

                <div id="country-stats" class="flex-grid">

                    <div class="col">
                        <?php echo $country['Capital']; ?>
                    </div>
                    <div class="col">
                        <?php echo $country['Population']; ?>
                    </div>
                    <div class="col">
                        <?php echo $country['LocalName']; ?>
                    </div>
                    <div class="col">
                        <?php echo $country['tld']; ?>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- ToDo: Show more details on the view page, e.g. top 5 cities by population, head of state details etc. -->

    <aside>
        <h4>Top 5 Largest Cities</h4>
        <?php var_dump($largestCities); ?>
    </aside>

</article>

