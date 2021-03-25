<template>

    <div class="row">

        <div class="col-sm-6" v-for="item in lista">
            <div class="card card-post"  >
              <div class="card-body row">
                <img class="col-4" :src="item.foto" width="200" >

                <div class="col-8 text-right">
                    <h5 class="card-title text-left">{{item.autor}}</h5>
                    <h2 class="card-title text-left">{{item.titulo}}</h2>
                    <p class="card-text text-left">{{item.conteudo.substring(0,100)}}</p>
                    <a :href="'/post/'+item.id" class="btn btn-primary link">Acessar > > </a>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    // <ContactsList />
   // import ContactsList from './ContactsList';
   export default {
    props: [],
    data() {
        return {
            lista:[],
        };
    },
    mounted() {
       axios.get('/artigos')
       .then((response) => {

        if(response.data)
            this.lista = response.data.itens;
    });
   },
   methods: {
 }//,    components: { Cabecalho,ListaContato,Conversa}
}
</script>