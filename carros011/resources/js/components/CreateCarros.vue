<template>
    <div>
        <h3 class="text-center">Criar Carro</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCarro">
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
                    <button type="submit" class="btn btn-primary">Criar</button>
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
        methods: {
            addCarro() {
                this.axios
                    .post('http://localhost:8000/api/carros', this.carro)
                    .then(response => (
                        this.$router.push({ name: 'create' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>