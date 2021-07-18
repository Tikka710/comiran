<template>
<div>
    <v-container>
    <v-row justify="center">
    <v-col
      cols="12"
      sm="8"
    >
          <span class="text-h5 white--text">1 ベスト3のテーマを決めよう</span>
            <Form />
    </v-col>
  </v-row>

    </v-container>

</div>

</template>


<script>
import Form from "../components/Form"

export default {
    commponent: {
        Form
    },

}
</script>
