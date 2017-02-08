</main>
<script type="text/javascript">
    var header = document.getElementsByTagName("header")[0];

    window.onload = function () {

        function changeImage() {
            var BackgroundImage;
            BackgroundImages = [
                "/img/features/sand-from-space.jpg", //
                "/img/features/coast.jpg", //
                "/img/features/crater.jpg", //
                "/img/features/forest.jpg", //
                "/img/features/bold-mountain.jpg", //
                "/img/features/bright-house.jpg", //
                "/img/features/dark-mountain.jpg", //
                "/img/features/golden-gate.jpg", //
                "/img/features/river-up-high.jpg", //
                "/img/features/singapore.jpg", //
                "/img/features/starlight.jpg", //
                "/img/features/stream.jpg", //

            ];

            var i = Math.floor((Math.random() * 12));
            header.style.backgroundImage = 'radial-gradient(transparent, black), url("' + BackgroundImages[i] + '")';
            header.style.backgroundSize = 'cover';
            header.style.backgroundAttachment = 'fixed';
            header.style.backgroundRepeat = 'no-repeat';
            header.style.position = 'center center';
        }
        window.setInterval(changeImage, 5000);
    }
</script>

</body>
</html>