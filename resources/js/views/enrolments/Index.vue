<!--
@Date:   2020-03-31T16:07:11+01:00
@Last modified time: 2020-04-06T16:10:26+01:00
-->
<template>
  <b-row align-h="center">
    <b-col cols="12">

      <b-table-simple hover responsive>
        <b-thead>
          <b-tr>
            <b-th>Date</b-th>
            <b-th>Time</b-th>
            <b-th>Status</b-th>
            <b-th>Course id</b-th>
            <b-th>Lecturer id</b-th>
          </b-tr>
        </b-thead>
        <b-tbody>
          <b-tr v-for="item in items" :key="item.id">
            <b-td>{{ item.date }}</b-td>
            <b-td>{{ item.time }}</b-td>
            <b-td>{{ item.status }}</b-td>
            <b-td>{{ item.course_id }}</b-td>
            <b-td>{{ item.lecturer_id }}</b-td>
            <b-td><router-link :to="`/enrolments/edit/${item.id}`">Edit</router-link></b-td>
            
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
  // created(){
  //   let app = this;
  //   let token = localStorage.getItem('token');
  //   axios.get('/api/enrolments', {
  //     headers: { Authorization: "Bearer " + token}
  //   })
  //   .then(function (response) {
  //      console.log(response.data);
  //      app.items = response.data.data;
  //   })
  //   .catch(function (error) {
  //      console.log(error);
  //   })
  // },
  deleteEnrolments() {
      let app = this;
      let token = localStorage.getItem("token");

  // loop through enrolments and send delete request to delete them
      app.course.enrolments.forEach((enrolment) => {
        axios
          .delete("/api/enrolments/" + enrolment.id, {
            headers: { Authorization: "Bearer " + token }
          })
          .catch(function(error) {
            console.log(error);
          });
      });
  // delete course or lecturer
      axios
        .delete("/api/courses/" + app.course.id, {
          headers: { Authorization: "Bearer " + token }
        })
        .then(function(response) {
        //do something
        })
        .catch(function(error) {
          console.log(error);
        });
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
