<template>
  <div class="card shadow">
    <div class="card-header">Country Availability</div>
    <div class="table-responsive">
      <form :action="submitRoute" method="POST">
        <div class="container-fluid">
          <div class="row my-3">
            <div class="col-6">
              <input type="hidden" name="_token" v-model="$csrfToken" />
              <input type="hidden" name="entity_name" v-model="entity.name" v-if="entity" />
              <input type="hidden" name="entity_type" v-model="entityclass" v-if="entityclass" />
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
            <div class="col-6">
              <input type="text" class="form-control" v-model="query" placeholder="Search..." />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2 mb-3 text-center" v-for="(c, index) in countries" :key="index" v-show="inFiltered(c.id)">
              <div class="card h-100">
                <div class="card-body h-100">
                  <country-flag :country="c.code" size="normal" />
                  <p>{{c.name}}</p>
                  <!-- Rounded switch -->
                  <label class="switch">
                    <input
                      type="checkbox"
                      name="countries[]"
                      :value="c.id"
                      :checked="currentlyEnabled(c.id)"
                    />
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
const _ = require("lodash");
export default {
  data() {
    return {
      countries: [],
      entity: undefined,
      query: ""
    };
  },
  props: ["entityid", "entityclass"],
  methods: {
    currentlyEnabled(country_id) {
      let ids = _.map(this.entity.countries, "id");

      return ids.includes(country_id);
    },
    inFiltered(country_id) {
        let ids = _.map(this.filteredCountries, "id");

      return ids.includes(country_id);
    }
  },
  computed: {
    submitRoute() {
      if (this.entity) {
        return route("set-entity-countries", { id: this.entity.id });
      }

      return "";
    },
    filteredCountries() {
        if(this.query == '') {
            return this.countries;
        }

        // Filter the countries by name
        // Copy the array so we don't mess it up
        let countries = JSON.parse(JSON.stringify(this.countries));

        // Now we filter the countries
        for (let index = 0; index < countries.length; index++) {
            const c = countries[index];
            countries = countries.filter(c => {
                return c.name.toLowerCase().includes(this.query.toLowerCase());
            })
        }

        return countries;
    }
  },
  mounted() {
    axios
      .get(
        `${route("country-availability-data")}?id=${this.entityid}&class=${
          this.entityclass
        }`
      )
      .then(response => {
        this.countries = response.data.countries;
        this.entity = response.data.entity;
      });
  }
};
</script>

<style>
</style>