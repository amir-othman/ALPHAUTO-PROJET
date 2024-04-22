/*==========

Theme Name: SuperCars - Car Rental HTML Template
Theme Version: 1.0

==========*/

/*==========
----- JS INDEX -----
1.Car Interior 360 View JS
==========*/

    // Car Interior 360 View JS Start

    var panorama, viewer, container;
    var containerBaseWidth = 1170;
    var containerBaseHeight = 450;
    var deltaSize = 100;

    container = document.querySelector('#car_interior');

    panorama = new PANOLENS.ImagePanorama('assets/images/360_car_interior.jpg');

    viewer = new PANOLENS.Viewer({ container: container });
    viewer.add(panorama);

    function changeContainerSize(width, height) {
        viewer.container.style.width = width + "px";
        viewer.container.style.height = height + "px";
        viewer.onWindowResize(width, height);
    }

    document.querySelector('#interior-tab').addEventListener('click', function() {
        var newWidth = containerBaseWidth + (Math.random() - 0.5) * deltaSize;
        var newHeight = containerBaseHeight + (Math.random() - 0.5) * deltaSize;
        changeContainerSize(newWidth, newHeight);
    }, false);

    // Car Interior 360 View JS End

