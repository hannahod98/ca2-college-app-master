<!--
@Date:   2020-03-18T12:21:46+00:00
@Last modified time: 2020-04-06T14:54:50+01:00
-->



<template>
  <b-row align-h="center">
    <b-col cols="12">

      <b-table-simple hover responsive>
        <b-thead>
          <b-tr>
            <b-th>Title</b-th>
            <b-th>Code</b-th>
            <b-th>Description</b-th>
            <b-th>Points</b-th>
            <b-th>Level</b-th>
            <b-th>Actions</b-th>
          </b-tr>
        </b-thead>
        <b-tbody>
          <b-tr v-for="item in items" :key="item.id">
            <b-td>{{ item.title }}</b-td>
            <b-td>{{ item.code }}</b-td>
            <b-td>{{ item.description }}</b-td>
            <b-td>{{ item.level }}</b-td>
            <b-td>{{ item.points }}</b-td>
            <b-td><router-link :to="`/courses/edit/${item.id}`">Edit</router-link></b-td>
            <!-- <b-td><router-link :to="`/courses/show/${item.id}`">view</router-link></b-td> -->
            <!-- <button type="button" class="btn btn-danger" @click="deleteData(course, course.id)">Delete</button> -->
          </b-tr>
        </b-tbody>
      </b-table-simple>
    </b-col>
  </b-row>
</template>
<script>
export default {
  data() {
    return {
      items: []
    }
  },
  created(){
    let app = this;
    let token = localStorage.getItem('token');
    axios.get('/api/courses', {
      headers: { Authorization: "Bearer " + token}
    })
    .then(function (response) {
       console.log(response.data);
       app.items = response.data.data;
    })
    .catch(function (error) {
       console.log(error);
    })
    axios.post('/api/login', {
  email: app.form.email,
  password: app.form.password
})
  .then(function (response) {
  localStorage.setItem('token', response.data.token);
  app.$emit('login'); // <-- this is the new line
})
  .catch(function (error) {
  console.log(error);
});
  },
  methods: {
// deleteData(courses, course.id){
//   axios.delete('http://127.0.0.1:8000/courses' + course.id)
//   .then(response => this.courses.splice(index, 1));
//
//   window.location.reload();
//}
setLoggedIn() {
      this.loggedIn = true;
    },
    setLoggedOut() {
      this.loggedIn = false;
    }

  }
}
</script>
<style>
</style>
