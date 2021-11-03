<template>
    <div class="row">
        <div class="col-auto">
            <label for="titulo" class="form-label">Título:</label>
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

</style>