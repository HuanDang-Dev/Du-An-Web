<template>
<div class="card" style="border-radius: 0px 0px 30px 30px; margin: 1rem; border: 3px solid blue;">
  <h5 class="card-header" style="border-radius: 0px 0px 0px 0px; padding-top: 0.2rem; padding-bottom: 0.2rem; background-color: #00FFFF;">{{comment.user.name}} <h6 id="time"> {{comment.created_at}}</h6></h5>
  
  <div class="card-body" style="padding-top: 0.4rem; padding-bottom: 0.2rem;">
    <p class="card-text">{{comment.body}}</p>
  </div>
  <div class="card-body" style="padding-top: 0.4rem; padding-bottom: 0.2rem;">
    <button class="btn btn-primary">Thích</button>
    <button class="btn btn-primary" @click="displayReply">Trả lời</button>
  </div>
  <div v-if="status">
    <div style="width: 60rem; padding-left: 6rem">
      <comment-wrapper v-bind:comment_id=this.comment.id></comment-wrapper>
    </div>
  </div>
</div>
</template>

<script>
import CommentWrapper from '../CommentsReply/CommentWrapper'
  export default {
  components: { CommentWrapper },
    props: ['comment'],
    data(){
      return {
        status: false
      }
    },
    methods: {
      displayReply() {
        this.status = !this.status;
      }
    }
   }
</script> 
<style>
  #time{
    display: inline;
  }
  #reply{
    padding-right: 100px;
  }
</style>