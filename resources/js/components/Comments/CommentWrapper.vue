<template>
  <div class="Comment__wrapper">
    <div>Bình luận:</div>
    <comment-add></comment-add>
    <div v-if="max > 4" >
      <div v-if="!is_more">
        <button type="button" @click="changeAmountComment">Xem nhiều bình luận hơn</button>
      </div>
    <div v-else>
      <button type="button" @click="changeAmountComment">Xem ít bình luận hơn</button>
      </div>
    </div>
    <div v-else>
      <div>các bình luận gần đây:</div>
    </div>
    <div v-for="comment in comments" v-bind:key="comment.id">
    <comment :comment="comment"></comment>
    </div>
  </div>
</template>

<script>
  import CommentAdd from './CommentAdd.vue';
  import Comment from './Comment.vue';
  import EventBus from './event-bus'
  export default {
    components: {
      CommentAdd, Comment
    },
    created() {
      this.loadComments();
      EventBus.$on('commentAddedEvent', (data) => {
        if(data){
          this.loadComments();
        }
      });
    },
    data() {
      return {
        comments: [],
        moreComments: [],
        max: 0,
        is_more: false,
      }
    },
    methods: {
      handleNewCommentAdded(comment) {
        this.comments.unshift(comment);
      },
      loadComments() {
        axios.post('motel/comment', {
          motelId: 1,
        }).then(response => {
          this.comments = response.data.comments;
          this.moreComments = response.data.moreComments;
          this.max = response.data.max;
          if(this.is_more){
            this.comments = response.data.moreComments;
          }else{
            this.comments = response.data.comments
          }
        }).catch(error => {
          this.errors = error.response.data.comment
        })
      },
      changeAmountComment(){
        this.is_more = !this.is_more;
        this.loadComments();
      }
    }
  }
</script>