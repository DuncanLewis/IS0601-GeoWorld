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
<?php foreach ($countryList as $country) : ?>

    <!-- ToDo: check this is correct usage of article element -->
    <article class="search-item">
        <h3><a href="/country/view/<?php echo $country['A3Code']; ?>"><?php echo $country['Name']; ?></a></h3>
        A country in the continent of <strong><?php echo $country['Continent']; ?></strong>, <strong><?php echo $country['Name']; ?></strong> has a population of <strong><?php echo $country['Population']; ?></strong>.
    </article>

<?php endforeach; ?>
</article>

