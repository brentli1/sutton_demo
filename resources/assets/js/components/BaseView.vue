<template>
  <div class="app-wrapper">
    <main-nav></main-nav>
    <div class="app-body">
      <eggs v-if="page == 'eggs'"></eggs>
      <chicks v-if="page == 'chicks'"></chicks>
    </div>
    <modal></modal>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        page: ''
      }
    },

    methods: {
      setListeners: function() {
        window.eventBus.$on('change-page-type', this.setPage);
      },

      setPage: function(pageName) {
        this.page = pageName;
      }
    },

    created: function() {
      this.page = 'eggs';
      this.setListeners();
    }
  }
</script>