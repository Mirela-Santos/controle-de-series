<template>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título da Série</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Streaming</th>
                    <th scope="col">Status</th>
                    <th scope="col">Temporadas</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(serie, index) in series" :key="index">
                    <th scope="row">{{serie.id}}</th>
                    <td>{{serie.nome}}</td>
                    <td>{{serie.categoria}}</td>
                    <td>{{serie.streaming}}</td>
                    <td>{{serie.status}}</td>
                    <td>
                        <i class="bi bi-display"></i>
                    </td>
                    <td>
                        <i class="bi bi-pencil-square" @click="editar(serie.id)"></i>
                        <i class="bi bi-trash" @click="apagar(serie.id)"></i>
                        <i class="bi bi-check" @click="estado(serie.id)"></i>
                    </td>
                </tr>
            </tbody>
        </table> 
    </div>
</template>

<script>

export default {
    props: ['series'],
    methods: {
        editar(id) {
            this.$emit('editarserie',id);
        },
        apagar(id) {
            this.$emit('apagarserie',id);
        },
        estado(id) {
            this.$emit('mudarstatus',id);
        },
    }
}
</script>

<style scoped></style>