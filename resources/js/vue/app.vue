<template>
<<<<<<< HEAD
    <div class="seriesContainer">
        <div class="heading">
            <h2 id="title">Series</h2>
            <!-- Botão para cadastrar novas series-->
        </div>
        <!-- div com listagem das series-->
=======
    <div class = "seriesContainer">
        <div class = "heading">
        <h2 id = "title">Séries</h2>
        <!-- botao do formulario -->
        </div>
        <!--todo componente para listagem de series -->
>>>>>>> 1350c2f642558e530213ca098806dc04583bbe9c
    </div>
</template>

<script>
export default{
    components: {
<<<<<<< HEAD
=======
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
>>>>>>> 1350c2f642558e530213ca098806dc04583bbe9c

    },
    data: function(){
        return{series: [],}
    },
    methods: {
        getSeries() {
            axios.get('api/v1/series')
            .then(response => {
                this.series = response.data;
            }) 
            .catch(error => {
                console.log(error);
            })
        }
    },
    created() {
        this.getSeries();
    }
}
</script>

<style scoped>
<<<<<<< HEAD
    .seriesContainer{
        width: 50%;
        margin: auto;
    }

    .heading{
=======
    .seriesContainer {
        width: 350px;
        margin: auto;
    }

    .heading {
>>>>>>> 1350c2f642558e530213ca098806dc04583bbe9c
        background: #e6e6e6;
        padding: 10px;
    }

    #title {
<<<<<<< HEAD
        text-align:center;
    }
=======
        text-align: center;
    }


>>>>>>> 1350c2f642558e530213ca098806dc04583bbe9c
</style>