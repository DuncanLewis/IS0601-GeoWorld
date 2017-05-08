<?php
/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 07/02/2017
 * Time: 23:04
 */
?>

  <!--      Array
(
    [0] => Array
        (
            [A3Code] => GBR
            [A2Code] => GB
            [Name] => United Kingdom
            [Continent] => EU
            [Region] => British Islands
            [SurfaceArea] => 242900.00
            [IndepYear] => 1066
            [Population] => 59623400
            [LifeExpectancy] => 77.7
            [GNP] => 1378330.00
            [LocalName] => United Kingdom
            [GovernmentForm] => Constitutional Monarchy
            [HeadOfState] => Elisabeth II
            [Capital] => 456
            [tld] => gb
        )

)-->
<h2>Showing results for <?php echo $searchQuery; ?></h2>

<article id="country-search">

    <div class="auto-grid">
        <?php foreach ($countryList as $country) : ?>
            <div class="box">
                <div class="card">
                    <img class="card-img" src="https://source.unsplash.com/400x267/?<?php echo str_replace(' ', '%20',utf8_encode($country['Name'])); ?>" alt="<?php echo $country['Name']; ?>" />

                    <div class="card-img-overlay">
                        <h4 class="card-title"><a href="country/view/<?php echo $country['A3Code']; ?>"> <?php echo $country['Name']; ?></a></h4>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</article>

