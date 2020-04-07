<!--
@Date:   2020-03-18T12:21:46+00:00
@Last modified time: 2020-04-07T14:46:42+01:00
-->



<template>
  <div>
    <MyNavbar :loggedIn="this.loggedIn" v-on:login="setLoggedIn" v-on:logout="setLoggedOut" />
    <b-container>
      <router-view :loggedIn="this.loggedIn" v-on:login="setLoggedIn" v-on:logout="setLoggedOut" />
    </b-container>
  </div>
</template>
<script>
import MyNavbar from './components/MyNavbar'

export default {
  name: 'app',
  components: {
    MyNavbar
  },
  data() {
    return {
      loggedIn: false
    }
  },
  created() {
    if (localStorage.getItem('token')) {
      this.loggedIn = true;
      console.log("APP: ",this.loggedIn);
    }
    else {
      this.loggedIn = false;
    }
  },

  methods: {

 }
}
</script>
<style>
</style>
