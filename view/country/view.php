<?php
/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 07/02/2017
 * Time: 13:21
 */

?>


<!--
Country:

array (size=15)
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
'tld' => string 'jp' (length=2)

City:
 0 =>
    array (size=7)
      'ID' => string '3357' (length=4)
      'name' => string 'Istanbul' (length=8)
      'A3Code' => string 'TUR' (length=3)
      'district' => string 'Istanbul' (length=8)
      'population' => string '8787958' (length=7)
      'lat' => string '0.0000000' (length=9)
      'lng' => string '0.0000000' (length=9)

-->

<article id="country-profile">

    <header class="jumbo-feature"
            style="background-image:radial-gradient(transparent, black), url('https://source.unsplash.com/1600x900/?<?php echo $country['Name']; ?>');">
        <div class="jumbo-content">
            <div class="flex-grid">

                <div class="col">
                    <div class="flag-thumbnail flag-icon-<?php echo strtolower($country['A2Code']); ?> flag-icon-background flag-icon-squared h-center"></div>

                    <h2> <?php echo $country['Name']; ?></h2>
                    <h3><?php echo $country['Continent']; ?></h3>

                    <div id="country-stats" class="flex-grid">

                        <div class="col">
                            <h3><?php echo $capitalCity['name']; ?></h3>
                            <small>Capital City</small>
                        </div>
                        <div class="col">
                            <h3><?php echo number_format($country['Population']); ?></h3>
                            <small>Population</small>
                        </div>
                        <div class="col">
                            <h3><?php echo $country['LocalName']; ?></h3>
                            <small>Local Name</small>
                        </div>
                        <div class="col">
                            <h3><?php echo $country['HeadOfState']; ?> </h3>
                            <small>Head of State</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- ToDo: Show more details on the view page, e.g. top 5 cities by population, head of state details etc. -->

    <div class="flex-grid">
        <article class="col">

        </article>

        <aside class="col">

            <article>
                <div class="card card-standard">
                    <div class="card-heading">
                        <h3>Top 5 Largest Cities</h3>
                    </div>

                    <table class="table">
                        <tbody>
                        <?php foreach ($largestCities as $city) : ?>
                            <tr>
                                <td><?php echo $city['name']; ?></td>
                                <td><?php echo number_format($city['population']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </article>

        </aside>

        <?php //var_dump($topLanguages); ?>
    </div>

</article>

