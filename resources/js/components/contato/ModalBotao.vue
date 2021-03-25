<template>
  <a v-on:click="abrirModal" type="button"  :class="classe+' pointer'"> {{btntexto}}</a>

</template>

<script>
import Modal from './Formulario';
export default {
  props: ['classe','btntexto'],
  mounted() {
  },
  methods: {
    abrirModal(){
      var $this = this;
      this.$modal.show(
        Modal,
          {  },//, funcaoCallback:$this.funcaoCallback
          {   height: 'auto', width:'60%', classes:'modalDinamico modalDinamico-open' }
          );
    }
  },components: { Modal }
}
</script>