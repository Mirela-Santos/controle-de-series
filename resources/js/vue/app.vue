<template>
    <div class="series-container">
        <div class="heading">
            <h1 id="title">Séries</h1>
            <!-- @todo botão do formulário -->
        </div>
        <table-series :series="series"/>
    </div>
</template>

<script>
import tableSeries from './tableSeries.vue'

export default {
    components: {
        tableSeries
    },
    data: function() {
        return {
            series: [],
        }
    },
    methods: {
        getSeries() {
            axios.get('api/v1/series')
                .then( response => {
                    this.series = response.data
                    console.log(this.series);
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
    },
    created() {
        this.getSeries();
    }
}
</script>

<style scoped>
    .series-container {
        margin: 10px auto;
        width: 50%;
    }

    .heading {
        background: red;
        border-radius: 10px;
        padding: 15px;
    }

    #title {
        text-align: center;
    }
</style>