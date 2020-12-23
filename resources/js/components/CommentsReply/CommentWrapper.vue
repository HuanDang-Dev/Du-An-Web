<template>
  <div class="Comment__wrapper">
    <comment-add v-bind:comment_id=this.comment_id></comment-add>
    <div v-if="max > 4" >
      <div v-if="!is_more">
        <button type="button" class="btn btn-outline-primary" @click="changeAmountComment">Xem nhiều bình luận hơn</button>
      </div>
      <div v-else>
      <button type="button" class="btn btn-outline-primary" @click="changeAmountComment">Xem ít bình luận hơn</button>
      </div>
    </div>
    <div v-for="comment in comments" v-bind:key="comment.id">
    <comment :comment="comment"></comment>
    </div>
  </div>
</template>

<script>
  import CommentAdd from './CommentAdd.vue';
  import Comment from './Comment.vue';
import EventBus from '../Comments/event-bus';
  export default {
    props:[
      'comment_id'
    ],
    components: {
      CommentAdd, Comment
    },
    created() {
      this.loadComments();
      EventBus.$on('replyAddedEvent', (data) => {
        if(data){
          this.loadComments();
        }
      });
    },
    data() {
      return {
        comments: [],
        max: 0,
        is_more: false,
      }
    },
    methods: {
      handleNewCommentAdded(comment) {
        this.comments.unshift(comment);
      },
      loadComments() {
        var url = '/reply/comment';
        var postData = {
          commentId: this.comment_id
        };
        axios.post(url, postData).then(response => {
          this.comments = response.data.comments;
          this.moreComments = response.data.moreComments;
          this.max = response.data.max;
          if(this.is_more){
            this.comments = response.data.moreComments;
          }else{
            this.comments = response.data.comments
          }
        })
      },
      changeAmountComment(){
        this.is_more = !this.is_more;
        this.loadComments();
      }
    }
  }
</script>

