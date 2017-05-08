</main>

<footer>

    Copyright &copy; GeoWorld 2017. Images by <a href="https://unsplash.com/">Unsplash</a>. Flags by <a href="http://flag-icon-css.lip.is/">Flag-Icon</a>. Source available at <a href="https://github.com/DuncanLewis/IS0601-GeoWorld">GitHub</a>. <a href="https://validator.w3.org/nu/?doc=http://unn-w13007828.newnumyspace.co.uk/geo/">HTML5 Valid</a>

</footer>
<script type="text/javascript">

    var currentUrl = window.location.href;
    var header = document.querySelectorAll('[data-bgchange="true"]')[0];

        if (typeof header != "undefined") {
            window.onload = function () {

                function changeImage() {
                    var BackgroundImage;
                    BackgroundImages = [
                        "img/features/sand-from-space.jpg", //
                        "img/features/coast.jpg", //
                        "img/features/crater.jpg", //
                        "img/features/forest.jpg", //
                        "img/features/bold-mountain.jpg", //
                        "img/features/bright-house.jpg", //
                        "img/features/dark-mountain.jpg", //
                        "img/features/golden-gate.jpg", //
                        "img/features/river-up-high.jpg", //
                        "img/features/singapore.jpg", //
                        "img/features/starlight.jpg", //
                        "img/features/stream.jpg", //

                    ];

                    var i = Math.floor((Math.random() * 12));
                    header.style.backgroundImage = 'radial-gradient(transparent, black), url("<?php echo BASE_URL; ?>' + BackgroundImages[i] + '")';
                    header.style.backgroundSize = 'cover';
                    header.style.backgroundAttachment = 'fixed';
                    header.style.backgroundRepeat = 'no-repeat';
                    header.style.position = 'center center';
                }

                window.setInterval(changeImage, 15000);
            }
        }

</script>

</body>
</html>