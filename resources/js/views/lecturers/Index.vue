<!--
@Date:   2020-03-31T14:28:37+01:00
@Last modified time: 2020-04-06T15:40:31+01:00
-->
<template>

  <b-row align-h="center">
    <b-col cols="12">

      <b-table-simple hover responsive>
        <b-thead>
          <b-tr>
            <b-th>Name</b-th>
            <b-th>Address</b-th>
            <b-th>Email</b-th>
            <b-th>Phone</b-th>
          </b-tr>
        </b-thead>

        <b-tbody>
          <b-tr  v-for="item in items" :key="item.id">
            <b-td>{{ item.name }}</b-td>
            <b-td>{{ item.address }}</b-td>
            <b-td>{{ item.email }}</b-td>
            <b-td>{{ item.phone }}</b-td>
            <b-td><router-link :to="`/lecturers/edit/${item.id}`">Edit</router-link></b-td>
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
    axios.get('/api/lecturers', {
      headers: { Authorization: "Bearer " + token}
    })
    .then(function (response) {
       console.log(response.data);
       app.items = response.data.data;
    })
    .catch(function (error) {
       console.log(error);
    })
  },
  methods: {
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
