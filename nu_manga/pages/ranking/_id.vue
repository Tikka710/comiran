<template>
    <div>
        <v-main>
            <v-container>

            

        <v-row class="grey lighten-3" style="height: 600px;">
                <div v-for="manga in showManga" :key="manga.id">
                <v-col>
                <h2>{{manga.nickname}}さんが選んだ{{manga.thame}}マンガトップ3</h2>
                
                <v-card
                class="mx-auto"
                max-width="250"
                >
                
                <v-img
              max-height="300"
              max-width="200"
              :src="manga.img_url1"
              ></v-img>



              </v-card>

              <v-card
                class="mx-auto"
                max-width="250"
                >
                <v-img
              max-height="300"
              max-width="200"
              :src="manga.img_url2"
              ></v-img>
              </v-card>

              <v-card
                class="mx-auto"
                max-width="250"
                >
                <v-img
              max-height="300"
              max-width="200"
              :src="manga.img_url3"
              ></v-img>
                
              </v-card>
                </v-col>
            </div>
        </v-row>

            </v-container>

        </v-main>
    </div>
    
</template>


<script>
import axios from 'axios'

export default {
    data(){
        return {
            showManga: [],
        }
    },

    mounted(){
        this.detailManga();
    },

methods: {
    detailManga()
    {
      axios.get('http://127.0.0.1:8000/api/article/' + this.$route.params.id)
      .then(res => {
        console.log(res.data);
        this.showManga = res.data; 
      }).catch(error => {
        console.log(error.responce);
      });
    },

    handleclick()
      {

      }
  }

}
</script>
