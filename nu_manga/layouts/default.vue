<template>
  <div>
    <v-app>
      <v-main>
      <header>
        <Header />
      </header>

      <Nuxt />

      <footer>
      <Footer />
      </footer>
      </v-main>
    </v-app>
  </div>
</template>

<script>
import Header from '@/components/Header'
import Footer from '@/components/Footer'

export default {
  data () {
    return {
    }
  },

  components: {
    Header,
    Footer
  }
}
</script>
