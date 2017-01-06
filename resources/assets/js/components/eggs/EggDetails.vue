<template>
  <section class="egg-details">
    <pulse-loader v-if="loading" :color="color" :size="size"></pulse-loader>
    <div class="egg-details__container">
      <div class="egg-details__header">
        <h1 class="egg-details__title">{{ egg_id }}</h1>
        <span class="egg-details__add-new" @click.prevent="openEggAddDataModal()">Add New Entry</span>
      </div>
      <div class="egg-details__chart-wrapper">
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
      <ul class="egg-details__items">
        <li class="egg-details__item-header">
          <span class="egg-details__item-span">Weight</span>
          <span class="egg-details__item-span">Length</span>
          <span class="egg-details__item-span">Width</span>
          <span class="egg-details__item-span">Log Date</span>
        </li>
        <li class="egg-details__item" v-for="item in egg_details">
          <span class="egg-details__item-span">{{item.weight}}</span>
          <span class="egg-details__item-span">{{item.length}}</span>
          <span class="egg-details__item-span">{{item.width}}</span>
          <span class="egg-details__item-span">{{calcDate(item.created_at)}}</span>
        </li>
      </ul>
    </div>
  </section>
</template>

<script>
  import moment from 'moment';

  export default {
    data() {
      return {
        id: '',
        egg_id: '',
        egg_details: [],
        chart_data: [],
        loading: true
      }
    },

    methods: {
      setListeners: function() {
        window.eventBus.$on('show-egg-details', this.showEggDetails);
        window.eventBus.$on('push-new-egg-data', this.pushNewEggData);
      },

      showEggDetails: function(id, egg_id) {
        this.loading = true;
        this.egg_id = egg_id;
        this.id = id;
        this.$http.get(window.site_base_url + 'api/egg/' + this.id).then((response) => {
          this.loading = false;
          this.egg_details = response.body;
          this.setChartData();
          this.makeChart();
        });
      },

      openEggAddDataModal: function() {
        window.eventBus.$emit('open-egg-data-modal', 'Add Egg Data', 'create', this.id);
      },

      calcDate: function(date) {
        let formattedDate = moment(date).format('MMMM Do, YYYY');
        return formattedDate;
      },

      setChartData: function() {
        this.chart_data = [];
        let startDate = moment(this.egg_details[0].created_at);
        this.egg_details.forEach((elem) => {
          let data = {
            x: -startDate.diff(moment(elem.created_at), 'days'),
            y: elem.weight
          }

          this.chart_data.push(data);
        });
      },

      makeChart: function() {
        var myChart = new Chart($('#myChart'), {
          type: 'scatter',
          data: {
            datasets: [{
              fill: false,
              label: 'Egg Weights',
              data: this.chart_data
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              xAxes: [{
                type: 'linear',
                position: 'bottom',
                ticks: {
                  stepSize: 1
                }
              }],
              yAxes: [{
                ticks: {
                  min: 0
                }
              }]
            },
            showLines: true
          }
        });
      },

      pushNewEggData: function(eggData) {
        this.egg_details.push(eggData);
        this.setChartData();
        this.makeChart();
      }
    },

    created: function() {
      this.setListeners();
    }
  }
</script>