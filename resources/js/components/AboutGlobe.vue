<template>
  <div class="row">
    <div class="col-lg-6 offset-lg-3 py-5 position-relative">
      <div id="globe-container"></div>
      <div class="slides">
        <about-globe-slides @slidechange="slideChange"></about-globe-slides>
      </div>
    </div>
  </div>
</template>

<script>
import * as am4core from "@amcharts/amcharts4/core";
import * as am4maps from "@amcharts/amcharts4/maps";
import am4geodata_worldLow from "@amcharts/amcharts4-geodata/worldLow";
export default {
  data() {
    return {
      globe: undefined,
      offset: 0
    };
  },
  methods: {
    slideChange(slide) {
      let lat = slide.lat;
      let lng = slide.lng;
      console.log(lng);
      this.globe.goHome(0);
      this.globe.deltaLongitude = lng * -1;
      this.globe.deltaLatitude = lat * -1 + -5; // Subtract 5 to move the country up a bit

      this.globe.zoomToGeoPoint(
        {
          latitude: lat,
          longitude: lng
        },
        1,
        1
      );
    }
  },
  mounted() {
    // Initialize map
    var map = am4core.create("globe-container", am4maps.MapChart);
    this.globe = map;
    map.geodata = am4geodata_worldLow;
    map.projection = new am4maps.projections.Orthographic();
    // Colors
    map.backgroundSeries.mapPolygons.template.polygon.fill = am4core.color(
      "#F1F3F6"
    );
    map.backgroundSeries.mapPolygons.template.polygon.fillOpacity = 1;

    var polygonSeries = map.series.push(new am4maps.MapPolygonSeries());
    polygonSeries.useGeodata = true;
    polygonSeries.mapPolygons.template.fill = am4core.color("#CFD9E2");
    // Disable user interaction
    map.seriesContainer.draggable = false;
    map.seriesContainer.resizable = false;
    map.maxZoomLevel = 1;

    // Add markers
    var imageSeries = map.series.push(new am4maps.MapImageSeries());
    // Set up circle template
    var imageSeriesTemplate = imageSeries.mapImages.template;
    var circle = imageSeriesTemplate.createChild(am4core.Circle);
    circle.radius = 6;
    circle.fill = am4core.color("#3C2099");
    circle.stroke = am4core.color("#7b69b8");
    circle.strokeWidth = 2;
    circle.nonScaling = true;
    // Center on the US
    // map.deltaLongitude = 100.0902;
    // Place markers
    imageSeriesTemplate.propertyFields.latitude = "latitude";
    imageSeriesTemplate.propertyFields.longitude = "longitude";
    imageSeries.data = [
      {
        title: "United States",
        latitude: 37.0902,
        longitude: -95.7129
      },
      {
        title: "Canada",
        latitude: 56.1304,
        longitude: -106.3468
      },
      {
        title: "Mexico",
        latitude: 23.6345,
        longitude: -102.5528
      },
      {
        title: "The Caribbean",
        latitude: 21.4691,
        longitude: -78.6569
      },
      {
        title: "Central America",
        latitude: 12.769,
        longitude: -85.6024
      },
      {
        title: "Brazil",
        latitude: -14.235,
        longitude: -51.9253
      },
      {
        title: "Europe",
        latitude: 50.526,
        longitude: 15.2551
      },
      {
        title: "South Africa",
        latitude: -30.5595,
        longitude: 22.9375
      },
      {
        title: "India",
        latitude: 20.5937,
        longitude: 78.9629
      },
      {
        title: "Russia",
        latitude: 61.524,
        longitude: 105.3188
      },
      {
        title: "Australia",
        latitude: -25.2744,
        longitude: 133.7751
      },
      {
        title: "China",
        latitude: 35.8617,
        longitude: 104.1954
      },
      {
        title: "Kosovo",
        latitude: 42.3844,
        longitude: 20.4285
      },
      {
        title: "Wales",
        latitude: -33.7167,
        longitude: 150.4333
      }
    ];

    let lat = -24.8670;
    let lng = 152.3510;
    this.globe.goHome(0);
    this.globe.deltaLongitude = lng * -1;
    this.globe.deltaLatitude = lat * -1;

    this.globe.zoomToGeoPoint(
      {
        latitude: lat,
        longitude: lng
      },
      1,
      1
    );
  }
};
</script>

<style lang="scss" scoped>
#globe-container {
  width: 100%;
  height: 600px;
}

.slides {
  position: absolute;
  bottom: 0;
  width: 100%;
}

@media (max-width: 768px) {
  .slides {
    position: relative;
  }
}
@media (max-width: 480px) {
  #globe-container {
    height: 300px;
  }

  .slides {
    position: relative;
  }
}
</style>