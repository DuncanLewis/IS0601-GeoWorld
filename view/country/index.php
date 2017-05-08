<?php
/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 07/02/2017
 * Time: 13:15
 */

?>

<h2>Showing all countries</h2>

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
