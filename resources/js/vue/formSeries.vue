<template>
    <div class="row">
        <div class="col-auto">
            <span for="nome" class="form-label">Título:</span>
        </div>
        <div class="col-auto">
            <input 
                v-model="serie.nome"
                id="nome" 
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
            <button class="btn btn-primary" @click="serie.id ? editarSerie() : cadastrarSerie()">
                {{serie.id ? 'Editar': 'Cadastrar'}}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props:['serie'],
    methods: {
        cadastrarSerie() {
            if(this.existeCampoVazio()==true){
            return;
        }
            axios.post('api/v1/serie',{
                nome: this.serie.nome,
                categoria: this.serie.categoria,
                streaming: this.serie.streaming
            })
                .then( response => {
                    if(response.status == '201'){
                        this.serie.id = null;
                        this.serie.nome = '';
                        this.serie.categoria = '';
                        this.serie.streaming = '';
                        this.$emit('reloadlist');
                    }
                }) 
                .catch( error => {
                    console.log(error);
                })
        },

        editarSerie() {
            if(this.existeCampoVazio()==true){
                return;
            }
            axios.patch('api/v1/serie/'+this.serie.id,{
                nome: this.serie.nome,
                categoria: this.serie.categoria,
                streaming: this.serie.streaming,
                status:this.serie.status,
            })
                .then( response => {
                    if(response.status == '204'){
                        this.serie.id = null;
                        this.serie.nome = '';
                        this.serie.categoria = '';
                        this.serie.streaming = '';
                        this.$emit('reloadlist');
                    }
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
        
        existeCampoVazio(){
            if (this.serie.nome == ""||this.serie.categoria == ""||this.serie.streaming==""){
                return true;
            }
             return false;
        },
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