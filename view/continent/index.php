<article id="continent-list">

    <h2>Showing all continents</h2>

    <div class="auto-grid">
        <?php foreach ($continentList as $continent) : ?>
            <div class="box">
                <div class="card">
                    <img class="card-img" src="https://source.unsplash.com/400x267/?<?php echo $continent['Name']; ?>" alt="<?php echo $continent['Name']; ?>" />

                    <div class="card-img-overlay">
                        <h4 class="card-title"><a href="continent/view/<?php echo $continent['ID']; ?>"> <?php echo $continent['Name']; ?></a></h4>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</article>