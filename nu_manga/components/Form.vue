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

        <v-card>
        <v-card-title class="cyan">
          <span class="text-h5 white--text">2 マンガを選ぼう</span>

          <v-spacer></v-spacer>
        </v-card-title>
        <v-text-field
            v-model="keyword"
            id="keyword"
            type="text"
            label="キーワードを入力しよう"
          ></v-text-field>
          {{ keyword }}
          <v-btn
            depressed
            color="primary"
            @click="getManga"
          >
            検索
          </v-btn>
          <div v-for="manga in ArticleData.Manga_url" :key="manga.id">
            <v-row align="center">       
              <v-col
                class="d-flex"
                cols="12"
                sm="6"
              >
              <v-card>
              <v-img
              max-height="200"
              max-width="100"
              :src="manga.ImageUrl"
              ></v-img>
              <h1>{{manga.title}}</h1>
            </v-card>
            </v-col>
            </v-row>

          </div>

        </v-card>

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
              Manga_url: [],
              // Manga_url2: '',
              // Manga_url3: '',
              nickname: ''
            },
            keyword: '',
            isSelected: ''
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
      },

      getManga() {
        axios.get('http://127.0.0.1:8000/api/feed', {
          params: {
          keyword: this.keyword,
        }
        })
        .then(res => {
          this.ArticleData.Manga_url = res.data;
          console.log(res);
        }).catch(error => {
          console.log(error.responce);
        })
      }
    }
    
}
</script>