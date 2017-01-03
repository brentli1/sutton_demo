<template>
    <form class="modal-form" @submit.prevent="action == 'edit' ? editEgg() : createEgg()">
      <label class="modal-form__label" for="egg-id">Egg ID</label>
      <input class="modal-form__input" type="text" v-model="egg.egg_id" name="egg-id">
      <div class="modal-form__error" v-if="errors.egg_id">{{errors.egg_id[0]}}</div>
      <label class="modal-form__label" for="initial-weight">Initial Weight</label>
      <input class="modal-form__input" v-model="egg.initial_weight" type="text" name="initial-weight">
      <div class="modal-form__error" v-if="errors.initial_weight">{{errors.initial_weight[0]}}</div>
      <label class="modal-form__label" for="initial-length">Initial Length</label>
      <input class="modal-form__input" v-model="egg.initial_length" type="text" name="initial-length">
      <div class="modal-form__error" v-if="errors.initial_length">{{errors.initial_length[0]}}</div>
      <label class="modal-form__label" for="initial-width">Initial Width</label>
      <input class="modal-form__input" v-model="egg.initial_width" type="text" name="initial-width">
      <div class="modal-form__error" v-if="errors.initial_width">{{errors.initial_width[0]}}</div>
      <input class="modal-form__submit" type="submit" value="Submit">
    </form>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        action: '',
        egg: [],
        errors: []
      }
    },

    methods: {
      setListeners: function() {
        window.eventBus.$on('set-egg-modal', this.setEggModal);
        window.eventBus.$on('reset-modal', () => {
          this.errors = [];
          this.egg = [];
        });
      },

      setEggModal: function(action, data = {}) {
        this.action = action;
        if(data) {
          this.egg = data;
        }
      },

      createEgg: function() {
        this.$http.post(window.site_base_url + '/api/eggs/create', this.egg).then((data) => {
          this.egg.id = data.body.last_inserted_id;
          window.eventBus.$emit('push-new-egg', this.egg);
          window.eventBus.$emit('close-modal');
        }, (response) => {
          this.errors = response.body;
        });
      }
    },

    created: function() {
      this.setListeners();
    }
  }
</script>