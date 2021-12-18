<template>
    <div>
        <v-btn @click="like()" v-model="id"><b-icon pack="fas" icon="user" /></v-btn>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data () {
        return {
        islike: false,
    }
  },
  props:{
      'id': {
         default: ''
      }
  },
  mounted(){
      console.log(this.islike);
  },
  methods: {
      like(){
          axios.get('http://127.0.0.1:8000/api/like', {
              article_id: this.id
          }).then(res => {
              console.log(res.data);
          }).catch(error => {
        console.log(error.responce);
      });
      }
  }
}


</script>

