<template>
    <div>
        <v-snackbar
            v-model="status"
            transiton="slide-x-reverse-transiton"
            right
            top
            :color="type"
        >
        <div class="ml-5 font-weight-bold white--text">
            {{ message }}
        </div>
  </v-snackbar>
    </div>  
</template>

<script>
import { mapGetters } from "vuex"
// import { defineComponent, reactive, onMounted } from '@vue/composition-api'

export default {
   computed: {
       ...mapGetters({
           message: "message",
           type: "type",
           status: "status",
       }),
   },
}
</script>
