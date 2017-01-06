<template>
  <div class="add-edit-egg-data">
    <form class="modal-form" @submit.prevent="action == 'edit' ? editEggData() : createEggData()">
      <label class="modal-form__label" for="initial-weight">Weight</label>
      <input class="modal-form__input" v-model="eggData.weight" type="text" name="weight">
      <div class="modal-form__error" v-if="errors.weight">{{errors.weight[0]}}</div>
      <label class="modal-form__label" for="length">Length</label>
      <input class="modal-form__input" v-model="eggData.length" type="text" name="length">
      <div class="modal-form__error" v-if="errors.length">{{errors.length[0]}}</div>
      <label class="modal-form__label" for="width">Width</label>
      <input class="modal-form__input" v-model="eggData.width" type="text" name="width">
      <div class="modal-form__error" v-if="errors.width">{{errors.width[0]}}</div>
      <input class="modal-form__submit" type="submit" value="Submit">
    </form>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        action: '',
        eggData: [],
        errors: []
      }
    },

    methods: {
      setListeners: function() {
        window.eventBus.$on('set-egg-data-modal', this.setEggDataModal);
        window.eventBus.$on('reset-modal', () => {
          this.errors = [];
          this.eggData = [];
        });
      },

      setEggDataModal: function(action, egg_data_id, data = {}) {
        this.eggData = data;
        this.action = action;
        this.eggData.egg_data_id = egg_data_id;
      },

      createEggData: function() {
        this.$http.post(window.site_base_url + 'api/egg-data/create', this.eggData).then((data) => {
          this.eggData.id = data.body.last_insert_id;
          window.eventBus.$emit('push-new-egg-data', this.eggData);
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