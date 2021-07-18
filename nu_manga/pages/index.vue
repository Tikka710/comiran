<template>
  <v-main>
    <v-container>
      <v-row>
      <v-col class="col-md-8 col-xs-12">
          <section class="home_manga_index">
            <h2 class="home__notice-h2 is-size-4">
              最近投稿されたマンガランキング
            </h2>
            <v-card
            max-width="344"
            >

            </v-card>
          </section>
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
        <v-col class="col-md-4 col-xs-12">
          <section class="sidebar-sns-section">
            <h3 class="text-center sidebar-sns-h3 is-size-4">SNS共有</h3>
            <div class="sidebar-sns-links">
            </div>
          </section>
          <section class="home__notice">
            <h2 class="text-center home__notice-h2 is-size-4">
              お知らせ情報
            </h2>
            <dl>
              <dt>2021/08/23</dt>
              <dd>サイトを開設しました。</dd>
            </dl>
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
      thames: []
    }
  },
  created(){

  },

  method: {
    getThames()
    {
      axios.get('')
    }
  }
}
</script>
