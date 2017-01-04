<template>
  <section class="egg-details">
    <div class="egg-details__header">
      <h1 class="egg-details__title">{{ egg_id }}</h1>
      <span class="egg-details__add-new">Add New Entry</span>
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
  </section>
</template>

<script>
  import moment from 'moment';

  export default {
    data() {
      return {
        id: '',
        egg_id: '',
        egg_details: []
      }
    },

    methods: {
      setListeners: function() {
        window.eventBus.$on('show-egg-details', this.showEggDetails);
      },

      showEggDetails: function(id, egg_id) {
        this.egg_id = egg_id;
        this.id = id;
        this.$http.get(window.site_base_url + 'api/egg/' + this.id).then((response) => {
          this.egg_details = response.body;
        });
      },

      calcDate: function(date) {
        let formattedDate = moment(date).format('MMMM Do, YYYY');
        return formattedDate;
      }
    },

    created: function() {
      this.setListeners();
    }
  }
</script>