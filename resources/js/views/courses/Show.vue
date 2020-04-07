<!--
@Date:   2020-03-18T12:21:46+00:00
@Last modified time: 2020-04-02T16:05:54+01:00
-->



<!-- <template>
  <b-row align-h="center">
    <b-col cols="8">
      <h3 v-if="!loggedIn">You are not logged in!!</h3>
      <b-card
        v-else
        title="View Course"
        tag="article">

        <b-table-simple hover responsive>
          <b-thead>
            <b-tr>
              <b-th>Title</b-th>
              <b-th>Code</b-th>
              <b-th>Description</b-th>
              <b-th>Points</b-th>
              <b-th>Level</b-th>
            </b-tr>
          </b-thead>
          <b-tbody>
            <b-tr v-for="course in courses" :key="course.id">
              <b-td>{{ course.title }}</b-td>
              <b-td>{{ course.code }}</b-td>
              <b-td>{{ course.description }}</b-td>
              <b-td>{{ course.level }}</b-td>
              <b-td>{{ course.points }}</b-td>

            </b-tr>
          </b-tbody>
        </b-table-simple>


      </b-card>
    </b-col>
  </b-row>
</template>

<script>
export default {
  data() {
    return {
      course: {},
      show: true,
      loggedIn: false
    }
  },
  created(){
    // console.log(localStorage.getItem('token'));
    if (localStorage.getItem('token')) {
      this.loggedIn = true;
    }
    else {
      this.loggedIn = false;
    }

    let app = this;
    let token = localStorage.getItem('token');
    axios.get(`/api/courses/${app.$route.params.id}`, {
      headers: { Authorization: "Bearer " + token }
    })
    .then(function (response) {
      app.course = response.data.data;
    })
    .catch(function (error) {
      console.log(error);
    });

  },
  methods: {



  }
}
</script>
<style>
</style> -->
