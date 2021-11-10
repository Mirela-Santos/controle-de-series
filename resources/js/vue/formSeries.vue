<template>
    <div class="row">
        <div class="col-auto">
            <span for="titulo" class="form-label">Título:</span>
        </div>
        <div class="col-auto">
            <input 
                v-model="serie.titulo"
                id="titulo" 
                placeholder="Digite o título da serie" 
                class="form-control"
                required
            />
        </div>
        <div class="col-auto">
            <span for="categoria" class="form-label">Categoria:</span>
        </div>
        <div class="col-auto">
            <select v-model="serie.categoria" id="categoria" class="form-control">
                <option disabled value="">Selecione um Categoria</option>
                <option >Ação</option>
                <option >Terror</option>
                <option >Comédia</option>
                <option >Anime</option>
            </select>
        </div>
        <div class="col-auto">
            <span for="streaming" class="form-label">Streaming Plat:</span>
        </div>
        <div class="col-auto">
            <select v-model="serie.streaming" id="streaming" class="form-control">
                <option disabled value="">Selecione um Streaming</option>
                <option >Netflix</option>
                <option >Disney+</option>
                <option >HBO Max</option>
                <option >Amazon Prime</option>
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" @click="cadastrarSerie()">
                Cadastrar
            </button>
        </div>
        <div class="col-auto">
            <button class="btn btn-warning" @click="editarSerie()">
                Editar
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return{
            serie: {
                titulo: "",
                categoria: "",
                streaming: "",
            }
        }
    },
    methods: {
        cadastrarSerie() {
            if(this.existeCampoVazio()==true){
            return;
        }
            axios.post('api/v1/serie',{
                nome: this.serie.titulo,
                categoria: this.serie.categoria,
                streaming: this.serie.streaming
            })
                .then( response => {
                    if(response.status == '201'){
                        this.serie.titulo = '';
                        this.$emit('reloadlist');
                    }
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
        editarSerie(){
            axios.patch('api/v1/serie/{id}',{
                nome: this.serie.titulo,
                categoria: this.serie.categoria,
                streaming: this.serie.streaming,
                status: this.serie.status
            })
                .then( response => {
                    if(response.status == '204'){
                        this.serie.titulo = '';
                        this.serie.categoria = '';
                        this.serie.streaming = '';
                        this.serie.status = '';
                        this.$emit('reloadlist');
                    }
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
        existeCampoVazio(){
             if (this.serie.titulo == ""||this.serie.categoria == ""||this.serie.streaming==""){
                return true;
             }
             return false;
        }
    }
}
</script>

<style scoped>
    label{
        margin: 0px;
    }

    .row {
        align-items: center;
        align-content: center;
        margin-bottom: 0px;
    }
</style>