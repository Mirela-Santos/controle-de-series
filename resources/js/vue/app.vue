<template>
    <div class = "seriesContainer">
        <div class = "heading">
        <h2 id = "title">Séries</h2>
        <!-- botao do formulario -->
        </div>
        <!--todo componente para listagem de series -->
    </div>
</template>

<script>
export default{
    components: {
        // indicar os componentes que estao sendo usados
    },
    data: function() {
        return {
            series: [],
        }
    },
    methods: {
        getSeries() {
            axios.get('api/v1/series')
            .then(response => {
                this.series = response.data
            }) // o que deu certo na requisiçao
            .catch(error => {
                console.log(error);
            }) //o que deu errado na requisição
        },
    },
    created() {
        this.getSeries();
    }

}
</script>

<style scoped>
    .seriesContainer {
        width: 350px;
        margin: auto;
    }

    .heading {
        background: #e6e6e6;
        padding: 10px;
    }

    #title {
        text-align: center;
    }


</style>