<template>
 <div>
     <v-form v-model="valid">
    <v-container>
        <v-card>
        <v-card-title class="cyan">
          <span class="text-h5 white--text">1 ベスト3のテーマを決めよう</span>

          <v-spacer></v-spacer>
           
        </v-card-title>
        <v-text-field
            v-model="thamename"
            :rules="nameRules"
            label="テーマ"
            required
          ></v-text-field>
        </v-card>
        <v-card>
        <v-card-title class="cyan">
          <span class="text-h5 white--text">2 マンガを選ぼう</span>

          <v-spacer></v-spacer>
           
        </v-card-title>
        <v-text-field
            v-model="manganame"
            :rules="nameRules"
            label="マンガ"
            required
          ></v-text-field>
        </v-card>
        <v-card>
        <v-card-title class="cyan">
          <span class="text-h5 white--text">3 ニックネーム</span>

          <v-spacer></v-spacer>
           
        </v-card-title>
        <v-text-field
            v-model="nickname"
            :rules="nameRules"
            label="ニックネーム"
            required
          ></v-text-field>

          <v-btn
            depressed
            color="primary"
          >
            つくる
          </v-btn>
        </v-card>
    </v-container>
  </v-form>
 </div>
</template>

<script>
export default {
    data(){
        return {

        };
    },
    
}
</script>