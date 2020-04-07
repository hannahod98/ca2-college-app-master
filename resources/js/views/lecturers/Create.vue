<!--
@Date:   2020-03-31T14:28:01+01:00
@Last modified time: 2020-03-31T19:39:18+01:00
-->



<template>
  <b-row>
    <b-col cols="8">

      <b-card title="Add Lecturer" tag="article">
        <b-form @submit="onSubmit">
          <b-form-group
            id="input-group-1"
            label="Name:"
            label-for="input-1"
          >
          <b-form-input
            id="input-1"
            type="text"
            required
            placeholder="Enter name"
            v-model="form.name"
          >
          </b-form-input>
          </b-form-group>

          <b-form-group
            id="input-group-2"
            label="Address:"
            label-for="input-2"
          >
          <b-form-input
            id="input-2"
            type="text"
            required
            placeholder="Enter address"
            v-model="form.address"
          >
          </b-form-input>
          </b-form-group>

          <b-form-group
            id="input-group-3"
            label="Phone:"
            label-for="input-4"
          >
          <b-form-input
            id="input-3"
            type="tel"
            required
            placeholder="Enter a phone number"
            v-model="form.phone"
          >
          </b-form-input>
          </b-form-group>

          <b-form-group
            id="input-group-4"
            label="Email:"
            label-for="input-4"
          >
          <b-form-input
            id="input-4"
            type="text"
            required
            placeholder="Enter email"
            v-model="form.email"
          >
          </b-form-input>

          </b-form-group>



          <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
      </b-card>
    </b-col>
  </b-row>
</template>
<script>
export default {
  data() {
    return {
      form: {
        name: '',
        address: '',
        phone: '',
        email: ''

      },
      loggedIn: false,
      errors: []
    }
  },
  computed: {
    codeValid() {
      return this.form.code.length <= 5 && this.form.code.length > 0
    }
  },

  methods: {
    onSubmit(evt) {
      evt.preventDefault()

      let app = this;
      let token = localStorage.getItem('token');

      axios.post('/api/lecturers', {
        name: app.form.name,
        address: app.form.address,
        phone: app.form.phone,
        email: app.form.email

      }, {
        headers: { Authorization: `Bearer ${token}`}
      })
      .then(function(response) {
        app.$router.push('/lecturers');
      })
      .catch(function (error) {
        console.log(error.response.data);

        app.errors = error.response.data.errors
      });











    },
    setLoggedIn() {
      this.loggedIn = true;
    },
    setLoggedOut() {
      this.loggedIn = false;
    }
  }
}
</script>
