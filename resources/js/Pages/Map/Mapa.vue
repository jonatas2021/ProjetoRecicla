<template>
    <div>
      <div ref="map" id="map" style="width: 100%; height: 100vh;"></div>
      <div ref="geocoder" id="geocoder" style="position: absolute; top: 10px; left: 10px; z-index: 1;"></div>
    </div>
  </template>

  <script>
  import mapboxgl from 'mapbox-gl/dist/mapbox-gl.js';
  import 'mapbox-gl/dist/mapbox-gl.css';

  export default {
    name: 'Mapa',
    mounted() {
      mapboxgl.accessToken = 'pk.eyJ1IjoiY2lkeWNsYXkiLCJhIjoiY2xvYXE4ZXQyMGc4MTJrcGFtbW9vYndjeCJ9.xLf-VgKrIwHJBZrr0ps9kg';

      const map = new mapboxgl.Map({
        container: this.$refs.map,
        style: 'mapbox://styles/cidyclay/clpkgnfel00gj01qmdpntaurd',
        center: [-34.902908, -7.838847],
        zoom: 13.7
      });

      // Adicione o controle de geocodificação
      const geocoderScript = document.createElement('script');
      geocoderScript.src = 'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js';
      geocoderScript.onload = () => {
        const geocoder = new MapboxGeocoder({
          accessToken: mapboxgl.accessToken,
          mapboxgl: mapboxgl,
        });

        this.$refs.geocoder.appendChild(geocoder.onAdd(map));
      };

      document.head.appendChild(geocoderScript);

      map.on('click', (event) => {
        const features = map.queryRenderedFeatures(event.point, { layers: ['coleta'] });
        if (!features.length) return;

        const feature = features[0];

        this.$emit('show-popup', feature);
      });

      map.on('load', () => {
        map.addSource('earthquakes', {
          type: 'geojson',
          data: 'http://127.0.0.1:8000/pontos.geojson'
        });

        map.addLayer({
          'id': 'earthquakes-layer',
          'type': 'circle',
          'source': 'earthquakes',
          'paint': {
            'circle-radius': 4,
            'circle-stroke-width': 2,
            'circle-color': 'green',
            'circle-stroke-color': 'white'
          },
        });
      });
    }
  };
  </script>

  <style>
  #map {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 100%;
  }
  </style>

  <!-- Inclua os estilos do Mapbox Geocoder diretamente no HTML -->
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css">
