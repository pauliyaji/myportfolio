<template>
    <div>
        <h2 class="text-center">Food List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="fd in food" :key="fd.id">
                <td>{{ fd.id }}</td>
                <td>{{ fd.title }}</td>
                <td>{{ fd.description }}</td>
                <td>{{ fd.price }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: fd.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteFood(fd.id)">Delete</button>
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
                food: []
            }
        },
        created() {
            this.axios
                .get('http://localhost/project2023/public/api/food/')
                .then(response => {
                    this.food = response.data;
                    console.log(response)
                });
        },
        methods: {
            deleteFood(id) {
                this.axios
                    .delete(`http://localhost/project2023/public/api/food/${id}`)
                    .then(response => {
                        let i = this.food.map(data => data.id).indexOf(id);
                        this.food.splice(i, 1)
                    });
            }
        }
    }
</script>
