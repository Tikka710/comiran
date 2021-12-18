<template>
    <div>
              <v-textarea
                name="input-7-1"
                filled
                auto-grow
                value=""
                v-model="inputs"
              ></v-textarea>
        <emoji-picker @emoji="insert" :search="search">
                <div slot="emoji-picker" slot-scope="{ emojis, insert}">
                  <div>
                  <div>
                    <input type="text" v-model="search">
                  </div>
                  <div>
                <div v-for="(emojiGroup, category) in emojis" :key="category">
                <h5>{{ category }}</h5>
                <div>
                  <span
                    v-for="(emoji, emojiName) in emojiGroup"
                    :key="emojiName"
                    @click="insert(emoji)"
                    :title="emojiName"
                  >{{ emoji }}</span>
                </div>
                </div>
              </div>
            </div>
            </div>
        <div slot="emoji-invoker" slot-scope="{ events: { click: clickEvent } }" @click.stop="clickEvent">
          <v-btn type="button">リアクション</v-btn>
        </div>
        </emoji-picker>

    </div>
</template>

<script>
import EmojiPicker from 'vue-emoji-picker'
import { mapGetters } from "vuex"

export default {
    // data(){
    //     return {
    //         inputs: '',
    //         // search: '',
    //     }
    //     },
    components: {
      EmojiPicker,
    },

    computed: {
      ...mapGetters(["inputs", "search"])
    },

    mounted(){
      this.$store.watch(
        (state, getters) => getters.inputs,
        // inputs => console.log(inputs, 'stateのinputsが変わったよ'),
        (newValue, oldValue) => {
         console.log('prefecture changed! %s => %s', oldValue, newValue)
      }
      )
    },

    methods :{
      insert(emoji){
        this.$store.dispatch('insertactions', emoji)
      }
    }
}


</script>