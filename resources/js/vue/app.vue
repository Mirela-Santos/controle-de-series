<template>
    <div class="seriesContainer">
        <div class="heading">
            <h2 id="title">Series</h2>
            <!-- Botão para cadastrar novas series-->
        </div>
        <!-- div com listagem das series-->
    </div>
</template>

<script>
export default{
    components: {

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
    .seriesContainer{
        width: 50%;
        margin: auto;
    }

    .heading{
        background: #e6e6e6;
        padding: 10px;
    }

    #title {
        text-align:center;
    }
</style>