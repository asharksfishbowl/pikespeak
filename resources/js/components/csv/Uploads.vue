<template>
    <div>
        <h3 class="text-center">Uploads</h3><br/>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel Vue JS File Upload Example - ItSolutionStuff.com</div>

                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success" role="alert">
                          {{success}}
                        </div>
                        <form @submit="proceedAction" enctype="multipart/form-data">
                        <strong>Name:</strong>
                        <input type="text" class="form-control" v-model="name">
                        <strong>File:</strong>
                        <input type="file" class="form-control" v-on:change="onFileChange">

                        <button class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>File</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="data in csv" :key="data.id">
                <td>{{ data.id }}</td>
                <td>{{ data.name }}</td>
                <td>{{ data.file }}</td>
                <td>{{ data.created_at }}</td>
                <td>{{ data.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: data.id }}" class="btn btn-primary">
                          Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteUpload(data.id)">Delete</button>
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
              error: {},
              import_file: '',
              csv: [],
              name: '',
              success: ''
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/csv/getUploads')
                .then(response => {
                    this.csv = false;
                });
        },
        methods: {
            deleteUpload(id) {
                this.axios
                    .delete(`http://localhost:8000/api/csv/delete/${id}`)
                    .then(response => {
                        let i = this.csv.map(item => item.id).indexOf(id); // find index of your object
                        this.csv.splice(i, 1)
                    });
            },
            onFileChange(e) {
                this.import_file = e.target.files[0];
            },
            proceedAction() {
              let formData = new FormData();
              formData.append('import_file', this.import_file);

                axios.post('/import_process', formData, {
                    headers: { 'content-type': 'multipart/form-data' }
                  })
                  .then(response => {
                      if(response.status === 200) {
                        // codes here after the file is upload successfully
                        debugger;
                      }
                  })
                  .catch(error => {
                      // code here when an upload is not valid
                      this.uploading = false
                      this.error = error.response.data
                      console.log('check error: ', this.error)
                  });
              },
        }
    }
</script>
