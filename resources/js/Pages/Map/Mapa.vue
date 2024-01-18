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
      mapboxgl.accessToken = 'pk.eyJ1IjoiY2Fpb3NvdXNhMzIiLCJhIjoiY2xyaTg5cXNtMDQwbjJpbnU5bHh1N2dwciJ9.rJVtMbFy7zvEjojYBfr-Sw';

      const map = new mapboxgl.Map({
        container: this.$refs.map,
        style: 'mapbox://styles/caiosousa32/clri8t4lk00dq01nu9juvduk7',
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
    // Adicione a fonte de dados para os pontos de terremoto
    map.addSource('earthquakes', {
        type: 'geojson',
        data: 'http://127.0.0.1:8000/pontos.geojson'
    });

    // Adicione a camada para os pontos de terremoto
    map.addLayer({
        'id': 'earthquakes-layer',
        'type': 'circle',
        'source': 'earthquakes',
        'paint': {
            'circle-radius': 8,
            'circle-stroke-width': 2,
            'circle-color': 'red',
            'circle-stroke-color': 'white'
        }
    });

    // Adicione a camada de texto (rótulo) para os estabelecimentos
    map.addLayer({
        'id': 'estabelecimentos-labels',
        'type': 'symbol',
        'source': 'earthquakes', // Use a mesma fonte de dados dos pontos de terremoto
        'layout': {
            'text-field': ['get', 'nome_do_campo_com_texto'], // Substitua 'nome_do_campo_com_texto' pelo nome do campo no seu GeoJSON com os nomes dos estabelecimentos.
            'text-size': 12,
            'text-allow-overlap': true
        },
        'paint': {
            'text-color': 'white'
        }
    });

    // Adicione um pop-up ao passar o cursor sobre os pontos de terremoto
    map.on('mouseenter', 'earthquakes-layer', (e) => {
        map.getCanvas().style.cursor = 'pointer';

        const earthquakeCoordinates = e.features[0].geometry.coordinates.slice();
        const earthquakeProperties = e.features[0].properties;

        // Cria um popup no ponto onde o cursor está, exibindo informações do ponto e do estabelecimento
        new mapboxgl.Popup()
            .setLngLat(earthquakeCoordinates)
            .setHTML(`
                <h3>Informações do Ponto</h3>
                <p>Nome do Ponto: ${earthquakeProperties.nome_do_campo_com_texto}</p>
                <p>Outras Informações: ${earthquakeProperties.outras_informacoes}</p>
            `)
            .addTo(map);
    });

    // Reseta o cursor e fecha o pop-up ao sair do ponto
    map.on('mouseleave', 'earthquakes-layer', () => {
        map.getCanvas().style.cursor = '';
        map.closePopup();
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

  svg.mapboxgl-ctrl-geocoder--icon.mapboxgl-ctrl-geocoder--icon-search {
    width: 38px;
    height: 30px;
    margin: 6px;
    margin-left: 230px;
    position: absolute;
  }

  div.suggestions-wrapper {
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.744);
    border: 50px;

  }

  ul.suggestions {
    margin: 10px;
  }

  svg.mapboxgl-ctrl-geocoder--icon.mapboxgl-ctrl-geocoder--icon-close{
    width: 22px;
    height: 22px;
    margin-block: -293px;
    margin-left: 210px;
  }
  </style>

  <!-- Inclua os estilos do Mapbox Geocoder diretamente no HTML -->
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css">
