<?php
/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 07/02/2017
 * Time: 13:21
 */

?>
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
                            <h3 id="headOfState" ondblclick="updateHeadOfState()"><?php echo $country['HeadOfState']; ?> </h3>
                            <small class="tooltip"><span class="tooltiptext">Double click to edit</span>Head of State</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- ToDo: Show more details on the view page, e.g. top 5 cities by population, head of state details etc. -->

    <div class="flex-grid">
        <article class="col">
            <iframe
                    width="600"
                    height="450"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDanqm6pL0KyFTKi_B9P8ZJKg0U3QYVGww&q='<?php echo $country['name']; ?>'"
            </iframe>
            <div id="map"></div>
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


<script type="text/javascript">
    function initMap() {
        var country = {<?php echo $country['Name']; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: country
        });
        var marker = new google.maps.Marker({
            position: country,
            map: map
        });
    }

    function updateHeadOfState() {
        var xhttp = new XMLHttpRequest();
        var currentHeadOfState =  document.getElementById("headOfState").innerHTML;
        var newHeadOfState = prompt("Please enter new head of state:", currentHeadOfState);
        document.getElementById("headOfState").innerHTML = newHeadOfState;

        xhttp.open("POST", "/country/updateHeadOfState", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=<?php echo $country['A3Code'] ?>&HeadOfState=" + newHeadOfState);
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDgY0MZMRpVdA09_RUPVndEEFUT_UN2-0&callback=initMap">
</script>


