<template>
    <div>
        <v-main>
            <v-container class="grey lighten-5">

            

        <v-row justify="center">
                <div v-for="manga in showManga" :key="manga.id">
                  <v-col>
                    <h2>{{manga.nickname}}さんが選んだ{{manga.thame}}マンガトップ3</h2>
                  </v-col>
                  
                <v-col>
                  
                  
                <v-card
                  class="mx-auto"
                  max-width="600"
                >
                <v-row>
                <v-col>
                <v-img
                  max-height="270"
                  max-width="170"
                  :src="manga.img_url1"
                ></v-img>
                </v-col>
              <v-col align="center">
                <v-btn
                color="error"
                large
                rounded
                @click="OpenSource(manga.source_url1)"
                >
                楽天
                <!-- <Nuxt-link to="manga.source_url1">楽天</Nuxt-link> -->
              </v-btn>
              </v-col>
              </v-row>
              </v-card>
              </v-col>

            <v-col>
              <v-card
                class="mx-auto"
                max-width="600"
                >
                <v-row>
                <v-col>
                <v-img
              max-height="270"
              max-width="170"
              :src="manga.img_url2"
              ></v-img>
              </v-col>
                <v-col align="center">
                  <v-btn
                color="error"
                large
                rounded
                href="manga.source_url2"
                >
              楽天
            </v-btn>
                </v-col>
              </v-row>
              </v-card>
            </v-col>

            <v-col>
              <v-card
                class="mx-auto"
                max-width="600"
                >
                <v-row>
                <v-col>
                <v-img
              max-height="270"
              max-width="170"
              :src="manga.img_url3"
              ></v-img>
              </v-col>
                <v-col align="center">
                  <v-btn
                color="error"
                large
                rounded
                href="manga.source_url3"
                >
              楽天
            </v-btn>
                </v-col>
              </v-row>
              </v-card>
            </v-col>
                
            </div>
        </v-row>
        <v-col align="center">
          <Action />
        </v-col>
            </v-container>

        </v-main>
    </div>
    
</template>


<script>
import axios from 'axios'
import Action from '../../components/Action.vue'

export default {
    data(){
        return {
            showManga: [],
            
        }
    },
    components:{
      Action,
    },

    mounted(){
        this.detailManga();
    },

methods: {
    detailManga()
    {
      axios.get('http://127.0.0.1:8000/api/article/' + this.$route.params.id)
      .then(res => {
        this.showManga = res.data;
        console.log(this.showManga); 
      }).catch(error => {
        console.log(error.responce);
      });
    },

    OpenSource(url){
      window.location.href = url
    }
  }

}
</script>

<style scoped>
.action{}
</style>
