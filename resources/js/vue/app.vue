<template>
    <div>
            <nav class="navbar navbar-dark bg-dark">
                <a href="#" class ="navbar-brand">Séries</a>
            </nav>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h2>Séries</h2>
                    <form-series 
                        v-on:reloadlist="getSeries()"
                        :serie="serie"
                    />
                </div>
                <div class="card-body">
                    <table-series 
                    :series="series"
                    v-on:editarserie="editar($event)"
                    />        
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import tableSeries from './tableSeries.vue';
import formSeries from './formSeries.vue';

export default {
    components: {
        formSeries,
        tableSeries
    },
    data: function() {
        return {
            series: [],
            serie: [],
        }
    },
    methods: {
        getSeries() {
            axios.get('api/v1/series')
                .then( response => {
                    this.series = response.data;
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
        editar(id){
            axios.get('api/v1/serie/' + id)
                .then(response => {
                    this.serie = response.data;
                })
                .catch(error => {
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
    nav{
        margin-bottom: 10px;
    }

    .card{
        margin: 20px 30px;
    }

    .nav-brand{
        margin-left: 20px;
    }
</style>