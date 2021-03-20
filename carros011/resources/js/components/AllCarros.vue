<template>
    <div>
        <h2 class="text-center">Lista de Carros</h2>
         <router-link to="/create" class="btn btn-primary">Adicionar Carros</router-link>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Fabricação</th>
                <th>Placa</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="carro in carros" :key="carro.id">
                <td>{{ carro.id }}</td>
                <td>{{ carro.marca }}</td>
                <td>{{ carro.modelo }}</td>
                <td>{{ carro.ano }}</td>
                <td>{{ carro.fabricacao }}</td>
                <td>{{ carro.placa }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: carro.id }}" class="btn btn-success">Editar</router-link>
                        <button class="btn btn-danger" @click="deleteCarro(carro.id)">Deletar</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                carros: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/carros/')
                .then(response => {
                    this.carros = response.data;
                });
        },
        methods: {
            deletecarro(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/carros/${id}`)
                    .then(response => {
                        let i = this.carros.map(data => data.id).indexOf(id);
                        this.carros.splice(i, 1)
                    });
            }
        }
    }
</script>