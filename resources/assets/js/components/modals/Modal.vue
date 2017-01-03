<template>
  <transition name="modal">
    <section v-show="showModal" class="modal">
      <div class="modal__overlay">
        <div class="modal__container">
          <div class="modal__header">
            <span class="modal__title">{{this.modalTitle}}</span>
            <button @click="closeModal" class="modal__close">Close</button>
          </div>
          <div class="modal__body">
            <add-edit-egg v-show="showEggModal"></add-edit-egg>
          </div>
      </div>
    </section>
  </transition>
</template>

<script>
  export default {
    data() {
      return {
        showModal: false,
        modalTitle: '',
        showEggModal: false
      }
    },

    methods: {
      setListeners: function() {
        window.eventBus.$on('open-egg-modal', this.showEggModalAction);
        window.eventBus.$on('close-modal', this.closeModal);
      },

      closeModal: function() {
        this.showModal = false;
        window.eventBus.$emit('reset-modal');
      },

      showEggModalAction: function(title, action) {
        this.showModal = true;
        this.showEggModal = true;
        this.modalTitle = title;
        window.eventBus.$emit('set-egg-modal', action);
      }
    },

    created: function() {
      this.setListeners();
    }
  }
</script>