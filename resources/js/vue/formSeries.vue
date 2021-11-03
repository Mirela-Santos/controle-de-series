<template>
    <div class="row">
        <div class="col-auto">
            <span for="titulo" class="form-label">Título:</span>
        </div>
        <div class="col-auto">
            <input 
                v-model = "serie.titulo"
                id="titulo" 
                placeholder="Digite o título da serie" 
                class="form-control"
                required
            />
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" @click="cadastrarSerie()">
                Cadastrar
            </button>
        </div>
        <div id="v-model-select" class="col-auto">
            <span>Categoria: {{ selected }}</span>
            <select v-model="selected">
                <option disabled value="">Selecione uma categoria</option>
                <option>Ação</option>
                <option>Terror</option>
                <option>Comédia</option>
                <option>Romance</option>
                <option>Anime</option>
            </select>
        </div>
        <div id="v-model-select" class="col-auto">
            <span>Plataforma de Streaming: {{ selected }}</span>
            <select v-model="selected">
                <option disabled value="">Selecione uma plataforma</option>
                <option>Amazon Prime</option>
                <option>Disney Plus</option>
                <option>Netflix</option>
                <option>HBO+</option>
            </select>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return{
            serie: {
                titulo: ""
            }
        }
    },
    methods: {
        cadastrarSerie() {
            if (this.serie.titulo == ""){
            return;
            }
            axios.post('api/v1/serie',{
                nome: this.serie.titulo
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