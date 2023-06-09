<?php
use App\Models\CityFacility;
// Retrieve the 'color' from the 'CityFacility' model based on city_id and facility_id
function getColorAHP($kabupatenId)
{
    $color = Kabupaten::where('id', $kabupatenId)->value('color_ahp');

    // Create an associative array with the color value
    $data = ['color_ahp' => $color];

    // Convert the array to JSON format
    $json = json_encode($data);

    // Return the JSON data
    return $json;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Visualisasi Peta</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        #mapCityRegency {
            width: auto;
            height: 100%;
        }
    </style>
</head>

<body>
    <div id="mapCityRegency"></div>
    <script src='https://code.jquery.com/jquery-3.3.1.min.js' ,
        integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=' , crossorigin='anonymous'></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script>
        // City and Regency
        var myCityMap = L.map('mapCityRegency').setView([-7.6, 112.3], 8);

        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 15,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(myCityMap);

        var myCityLayer = L.geoJSON().addTo(myCityMap);
        var layerControl = L.control.layers().addTo(myCityMap);

        $(function() {
            $.ajax({
                dataType: "json",
                url: "/jawa-timur.json",
                method: "GET",
                success: function(data) {
                    sortData = data;
                    sortData.features.sort(function(a, b) {
                        var idA = a.properties.ID;
                        var idB = b.properties.ID;
                        // Convert the IDs to numbers if they are strings
                        idA = typeof idA === 'string' ? parseInt(idA) : idA;
                        idB = typeof idB === 'string' ? parseInt(idB) : idB;

                        // Compare the IDs
                        if (idA < idB) {
                            return -1;
                        }
                        if (idA > idB) {
                            return 1;
                        }

                        // IDs are equal
                        return 0;
                    });
                    console.table(data);
                    loadCityLayer(data);
                },
                error: function(err) {
                    alert(err);
                }
            });
        });

        function loadCityLayer(data) {
            var facilityGroup = L.layerGroup();

            //mengambil warna
            var color = ""
            data.features.forEach((feature) => {
                $.ajax({
                    url: '/AHP/get-color',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: feature.properties.ID,
                        tipe: "ahp",
                    },
                    success: function(response) {
                        color = JSON.parse(response).color;

                        var layer = L.geoJSON(feature, {
                            style: {
                                fillColor: color,
                                color: "white",
                                weight: 2,
                                opacity: 1,
                                fillOpacity: 0.5
                            }
                        });

                        facilityGroup.addLayer(layer);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                })
            })

            myCityLayer.addLayer(facilityGroup);
            layerControl.addOverlay(facilityGroup, "AHP");
        }
    </script>
</body>

</html>
