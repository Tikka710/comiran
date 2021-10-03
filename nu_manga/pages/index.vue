<template>
  <v-main>
    <v-container>
          <h2 class="home__notice-h2 is-size-4">
              最近投稿されたマンガランキング
        </h2>
      <v-row>
        
      <v-col class="col-md-8">
          <!-- <section class="home_manga_index"> -->
        
            
            <v-row>
              <!-- <v-col> -->
            
            <v-col v-for="article in articles" :key="article.id">
            <v-card
            class="mx-auto"
            max-width="250"
            >
            <Nuxt-link tag="div" :to="{ name: 'ranking-id', params:{id: article.id}}">
              <p>{{article.nickname}}さんが作ったコミックランキング</p>
              <h1>{{article.thame}}</h1>
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
              <!-- </v-col> -->
            </v-row>
            
            
          <!-- </section> -->
          <section class="make_comiran">
            <nuxt-link to='/manga'>
              <v-btn
              rounded
              color="primary"
              dark
              >
            <h2 class="home_create_manga_ranking is-size-4">
              マンガランキングを作ろう！
            </h2>
          </v-btn>
            </nuxt-link>
          </section>
        </v-col>

        </v-row>



    </v-container>
  </v-main>

</template>

<script>

import axios from 'axios'
export default {
  data () {
    return {
      thames: [],
      articles: [],
    }
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
