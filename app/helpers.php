<?php

if (!function_exists('geojson')) {
    function geoJson($locales)
    {
        $original_data = json_decode($locales, true);
        $features = array();

        foreach ($original_data as $key => $value) {
            $features[] = array(
                'type' => 'Feature',
                'geometry' => array('type' => 'Point', 'coordinates' => array((float)$value['lat'], (float)$value['long'])),
                'properties' => array('name' => $value['name'], 'id' => $value['id']),
            );
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return json_encode($allfeatures, JSON_PRETTY_PRINT);

    }
}
