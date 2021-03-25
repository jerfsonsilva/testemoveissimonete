<template>

    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-sm-8" if="item!=null">
            <div class="card card-post-pag"  >
                <div class="card-body row">
                    <img class="col-4" :src="item.foto" width="200" height="400" >

                    <div class="col-4 text-right cabecalho">
                        <h5 class="card-title text-left">{{item.data}}</h5>
                        <h5 class="card-title text-left mt-10">{{item.autor}}</h5>
                        <h2 class="card-title text-left titulo">{{item.titulo}}</h2>
                    </div>

                    <div class="col-9 conteudo">
                        <p>{{item.conteudo}}</p>
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
    props: ['id'],
    data() {
        return {
            item:null,
        };
    },
    mounted() {
       axios.get('/artigo/'+this.id)
       .then((response) => {
        if(response.data!=null)
            this.item = response.data.item;
    });
   },
   methods: {
 }//,    components: { Cabecalho,ListaContato,Conversa}
}
</script>