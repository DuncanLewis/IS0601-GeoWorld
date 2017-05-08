<article id="continent-country-list">

    <h2>Showing countries in <?php echo $continent['Name']; ?></h2>

    <div class="auto-grid">
        <?php foreach ($countryList as $country) : ?>
            <div class="box">
                <div class="card">
                    <img class="card-img" src="https://source.unsplash.com/400x267/?<?php echo str_replace(' ', '%20',utf8_encode(['Name'])); ?>" alt="<?php echo $country['Name']; ?>" />

                    <div class="card-img-overlay">
                        <h4 class="card-title"><a href="<?php echo BASE_URL; ?>country/view/<?php echo $country['A3Code']; ?>"> <?php echo $country['Name']; ?></a></h4>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</article>