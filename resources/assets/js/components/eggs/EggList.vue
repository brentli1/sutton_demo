<template>
  <section class="egg-list">
    <pulse-loader v-if="loading" :color="color" :size="size"></pulse-loader>
    <div v-else class="egg-list__container">
      <div class="egg-list__search-wrapper">
        <input v-model="searchText" type="text" class="egg-list__search" placeholder="Search">
      </div>
      <div class="egg-list__add-new" @click.prevent="openEggModal()">Add New Egg</div>
      <ul class="egg-list__items">
        <li class="egg-list__item-header">Egg ID</li>
        <li v-for="egg in filterBy(eggs, searchText)" @click.prevent="showEggDetails(egg.id, egg.egg_id)" class="egg-list__item">
          <div>{{egg.egg_id}}</div>
        </li>
      </ul>
    </div>
  </section>
</template>

<script>
  export default {
    data() {
      return {
        eggs: [],
        searchText: '',
        loading: true
      }
    },

    methods: {
      setListeners: function() {
        window.eventBus.$on('push-new-egg', this.pushNewEgg);
      },

      fetchEggs: function() {
        this.loading = true;
        this.$http.get(window.site_base_url + 'api/eggs').then((response) => {
          this.eggs = response.body;
          this.loading = false;
        });
      },

      openEggModal: function() {
        window.eventBus.$emit('open-egg-modal', 'Add Egg', 'create');
      },

      showEggDetails: function(id, egg_id) {
        window.eventBus.$emit('show-egg-details', id, egg_id);
      },

      pushNewEgg: function(egg) {
        this.eggs.push(egg);
      }
    },

    created: function() {
      this.setListeners();
      this.fetchEggs();
    }
  }
</script>