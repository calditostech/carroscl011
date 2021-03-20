<template>
    <div>
        <h3 class="text-center">Editar Carro</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCarro">
                    <div class="form-group">
                        <label>Marca:</label>
                        <input type="text" class="form-control" v-model="carro.marca">
                    </div>
                    <div class="form-group">
                        <label>Modelo:</label>
                        <input type="text" class="form-control" v-model="carro.modelo">
                    </div>
                    <div class="form-group">
                        <label>Ano:</label>
                        <input type="text" class="form-control" v-model="carro.ano">
                    </div>
                    <div class="form-group">
                        <label>Fabricação:</label>
                        <input type="text" class="form-control" v-model="carro.fabricacao">
                    </div>
                    <div class="form-group">
                        <label>Placa:</label>
                        <input type="text" class="form-control" v-model="carro.placa">
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                carro: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/carros/${this.$route.params.id}`)
                .then((res) => {
                    this.carro = res.data;
                });
        },
        methods: {
            updateCarro() {
                this.axios
                    .patch(`http://localhost:8000/api/carros/${this.$route.params.id}`, this.carro)
                    .then((res) => {
                        this.$router.push({ name: 'edit' });
                    });
            }
        }
    }
</script>