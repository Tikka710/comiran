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
            v-model="ArticleData.thame"
            id="thame"
            type="text"
            label="テーマ"
          ></v-text-field>
          {{ ArticleData.thame }}
        </v-card>

        <!-- <v-card>
        <v-card-title class="cyan">
          <span class="text-h5 white--text">2 マンガを選ぼう</span>

          <v-spacer></v-spacer>
           
        </v-card-title>
        <v-text-field
            v-model="ArticleData.Manga_url1"
            id="thame"
            label="マンガ1"
          ></v-text-field>
        <v-btn>
      <v-btn>マンガを検索</v-btn>
      </v-btn>
        </v-card> -->

        <v-card>
        <v-card-title class="cyan">
          <span class="text-h5 white--text">3 ニックネーム</span>

          <v-spacer></v-spacer>
           
        </v-card-title>
        <v-text-field
            v-model="ArticleData.nickname"
            id="nickname"
            type="text"
            label="ニックネーム"
          ></v-text-field>

          <v-btn
            depressed
            color="primary"
            @click="createArticle"
          >
            つくる
          </v-btn>
        </v-card>
    </v-container>
  </v-form>
 </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return {
            ArticleData: {
              thame: '',
              // Manga_url1: '',
              // Manga_url2: '',
              // Manga_url3: '',
              nickname: ''
            }
        };
    },

    methods: {
      createArticle() {
        axios.post('http://127.0.0.1:8000/api/article', {
            thame: this.ArticleData.thame,
            // img_url1: this.ArticleData.Manga_url1,
            // img_url2: this.ArticleData.Manga_url2,
            // img_url3: this.ArticleData.Manga_url3,
            nickname: this.ArticleData.nickname
        })
        .then(res => {
          console.log(res);
        })
      }
    }
    
}
</script>