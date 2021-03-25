<template>

  <div class="container">
    <div>
      <h3 class="text-center">
        Contato
      </h3>
      <button type="button" class="close rounded-pill"  v-on:click="$emit('close')">
       <i class="fas fa-times">X</i>
     </button>
   </div>

   <form method="POST" ref="formVinculo" @submit="checkform" enctype="multipart/form-data">

    <div class="row formulario-contato" >


      <div class="col-12">
        <label class="label-titulo">Nome</label>
        <input type="text" class="form-control" name="nome" required=""  >
      </div>

      <div class="col-12">
        <label class="label-titulo">E-mail</label>
        <input type="email" class="form-control" name="email" required=""  >
      </div>

      <div class="col-12">
        <label class="label-titulo">Telefone</label> 
        <input type="text" class="form-control" v-mask="'(##) #####-####'" name="telefone"   >
      </div>

      <div class="col-12">
        <label class="label-titulo">Conteudo</label>
        <textarea class="form-control " name="conteudo" rows="5" ></textarea>
      </div>


      <div class="col-12 text-right">
        <br>
        <button type="submit" name="cadastrar" class="btn btn-primary">
          Salvar
        </button>
        <br>
      </div>

    </div>

  </form>
</div>
</template>

<script>
    // <ContactsList />
   // import ContactsList from './ContactsList';
   export default {
     props: {
     },
     data() {
      return {
      };
    },
    mounted() {
    },
    methods: {
      checkform(e){
       e.preventDefault();

       var $this = this;
       let formData = new FormData(this.$refs.formVinculo);

       var url = '/contatos/add';
       axios.post(url
        ,formData
        ,{
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }
        )
       .then((response) => {
         if (response.data.resultado) {
          alert('Enviado com sucesso');

          $this.$emit('close');
        }else{
          alert(response.data.err);
        }

      })
     }
 }//,    components: { Cabecalho,ListaContato,Conversa}
}
</script>