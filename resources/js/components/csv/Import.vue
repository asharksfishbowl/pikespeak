<template>
    <div>
        <h3 class="text-center">Import CSV</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="importFile">
                    <div class="form-group">
                        <label>User</label>
                        <input type="text" class="form-control" v-model="data.name">
                    </div>
                    <div class="form-group">
                        <label>Filename</label>
                        <input type="text" class="form-control" v-model="data.file">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        upload() {
            return {
                data: {}
            }
        },
        methods: {
            importFile() {

                this.axios
                    .post('http://localhost:8000/api/csv/import', this.csv)
                    .then(response => (
                        this.$router.push({
                          name: 'home'
                        })
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
