<template>
  <aside class="main-nav">
    <img :src ="user_avatar" class="main-nav__avatar" alt="User Profile" />
    <ul class="main-nav__items">
      <li @click.prevent="setPage('eggs')" class="main-nav__item main-nav__icon-egg">Eggs</li>
      <li @click.prevent="setPage('chicks')" class="main-nav__item main-nav__icon-egg">Chicks</li>
    </ul>
  </aside>
</template>

<script>
  export default {
    data () {
      return {
        user: [],
        user_avatar: ''
      }
    },

    methods: {
      fetchUserData: function() {
        this.$http.get(window.site_base_url + '/api/user').then((response) => {
          this.user = response.body;
          if(window.site_base_url == '/') {
            this.user_avatar = this.user.avatar_path;
          } else {
            this.user_avatar = window.site_base_url + this.user.avatar_path;
          }
        });
      },

      setPage: function(pageName) {
        window.eventBus.$emit('change-page-type', pageName);
      }
    },

    created: function() {
      this.fetchUserData();
    }
  }
</script>