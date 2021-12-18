<template>
 <div>
     <v-form>
    <v-container>
        
        <v-card color="#D8D6D5">
        <v-card-title>
          <span class="text-h5 white--text">1 ベスト3のテーマを決めよう</span>

          <v-spacer></v-spacer>
           
        </v-card-title>
        <v-text-field
            v-model="ArticleData.thame"
            type="text"
            label="テーマ"
          ></v-text-field>
          {{ ArticleData.thame }}
        </v-card>

        <v-card color="#D8D6D5">
        <v-card-title>
          <span class="text-h5 white--text">2 マンガを選ぼう（３つまで）</span>

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

          <div v-show="this.ArticleData.isSelectedImage">
            <div v-for="select in ArticleData.isSelectedImage" :key="select.id"> 

            <v-card>
            
            <v-img
              max-height="200"
              max-width="100"
              :src="select"
            ></v-img>
            </v-card>
          </div>

          </div>
          <!-- <p>選択中: {{ this.isSelectedImage[1] }}</p> -->
          <div v-if="ArticleData.isSelectedImage.length < 3">
           <vue-select-image
              :data-images="Manga_image"
              :is-multiple="true"
              @onselectmultipleimage="onSelectImage"
              v-model="ArticleData.isSelectedImage"
            >
          </vue-select-image>
          </div>
          
          
          <!-- <div v-for="manga in ArticleData.Manga_url" :key="manga.id">
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

          </div> -->

        </v-card>

        <v-card color="#D8D6D5">
        <v-card-title>
          <span class="text-h5 white--text">3 ニックネーム</span>

          <v-spacer></v-spacer>
           
        </v-card-title>
        <v-text-field
            v-model="ArticleData.nickname"
            type="text"
            label="ニックネーム"
          ></v-text-field>
          <p>{{ ArticleData.nickname }}</p>

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
              source_url: [],
              isSelectedImage: [],
              nickname: ''
            },
            keyword: '',
            Manga_image: [],
            // isSelectedImage: [],
            initialSelected: [],
        };
    },


    methods: {
      createArticle() {
        
        axios.post('http://127.0.0.1:8000/api/article', {
            thame: this.ArticleData.thame,
            img_url: this.ArticleData.isSelectedImage,
            source_url: this.ArticleData.source_url,
            nickname: this.ArticleData.nickname
        })
        .then(res => {
          this.$router.push("/");
          this.$store.dispatch("showMessage", {
            message: "投稿しました",
            type: "sucess",
            status: true,
          },
            { root: true }
          )
          
        }).catch(error => {
          console.log(error.responce);
        })
      },

      getManga() {
        axios.get('http://127.0.0.1:8000/api/feed', {
          params: {
          keyword: this.keyword,
        }
        })
        .then(res => {
          if(res.data){
            this.Manga_image = res.data;
            this.ArticleData.source_url = res.data.source_url;

          console.log(res.data[0].source_url);
          }else{
              this.$store.dispatch("showMessage", {
                message: "漫画を検索できませんでした",
                type: "red darken-1",
                status: true,
          },
            { root: true }
          )
          }
          
        }).catch(error => {
          console.log(error.responce);
        })
      },

      onSelectImage(selected){
        let arr = [];
        let source = [];
        for(let i=0; i<selected.length; i++){
       arr.push(selected[i].src);
       source.push(selected[i].source_url)

    }
    // let source = [];
    // for(let x=0; x<selected.length; x++){
    //   source.push(selected[i].source_url)
    // }

    // console.log(arr[0])
    this.ArticleData.isSelectedImage = arr;
    this.ArticleData.source_url = source;
    

    // console.log(this.ArticleData.isSelectedImage.length);
    console.log(this.ArticleData.source_url);
      }
    }
    
}
</script>