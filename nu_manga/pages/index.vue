<template>
  <v-main>
    <v-container>
      <Alert />
        <v-row justify="center">
          <v-col align="center">
              <h2 class="index_title is-size-4">
                最近投稿されたマンガランキング
              </h2>
            </v-col>
        </v-row>
    
              
        <v-row justify="center">
          
            <v-col v-for="article in articles" :key="article.id" cols=5 md=5 align="center">
            <v-card
            color="#F5F5F4"
            class="mx-auto"
            >
            <Nuxt-link tag="div" :to="{ name: 'ranking-id', params:{id: article.id}}">
              <p class="index_p text-subtitle-1 text-left">{{article.nickname}}さんが作ったコミックランキング</p>
              <p class="index_p text-h5 text-left">{{article.thame}}</p>
              <v-row>
                <v-col>
              <v-img
              max-height="200"
              max-width="100"
              :src="article.img_url1"
              ></v-img>
              </v-col>
              <v-col>
              <v-img
              max-height="200"
              max-width="100"
              :src="article.img_url2"
              ></v-img>
              </v-col>
              <v-col>
              <v-img
              max-height="200"
              max-width="100"
              :src="article.img_url3"
              ></v-img>
              </v-col>
              </v-row>
            </Nuxt-link> 
            </v-card>
            </v-col>
          </v-row>

          <v-row justify="center">
            <v-col align="center">
            <nuxt-link to='/manga'>
              <v-btn
              rounded
              color="#cd6118"
              dark
              >
            <h2 class="home_create_manga_ranking is-size-4">
              マンガランキングを作ろう！
            </h2>
          </v-btn>
            </nuxt-link>
            </v-col>
        </v-row>

       
    </v-container>
  </v-main>

</template>

<script>
import Alert from '../components/Alert.vue';
import axios from 'axios';
import Like from '../components/Like.vue';

export default {
  data () {
    return {
      thames: [],
      articles: [],
    }
  },
  commponent: {
        Alert,
        Like
    },

  created(){
    this.getArticles();
  },

  methods: {
    getArticles()
    {
      axios.get('http://127.0.0.1:8000/api/article')
      .then(res => {
        console.log(res.data);
        this.articles = res.data;
      }).catch(error => {
        console.log(error.responce);
      });
    }
  }
}
</script>
<style lang="scss">

.index_title {
  color: $font-color; 
}

.index_p {
  color: $font-color; 
}

.home_create_manga_ranking {
  color: $header-font-color;
}


</style>
