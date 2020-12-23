<template>
  <div class="row" >
    <div class="col-sm-12">

      <div class="form-group">
        <textarea
          name="comment"
          class="form-control"
          v-model="comment"
          placeholder="Add a new comment">
        </textarea>
      </div>

      <div class="form-group" style="padding-left: 45rem">
        <button class="btn btn-primary" @click="saveNewComment" >Trả lời</button>
      </div>

    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import EventBus from '../Comments/event-bus'
  export default {
    props:[
      'comment_id'
    ],
    data() {
      return {
        comment: ''
      }
    },
    methods: {
      saveNewComment() {
        var url = '/reply'
        var postData = {
          comment: this.comment,
          commentId: this.comment_id
        };
        axios.post(url, postData).then(response => {
          EventBus.$emit('replyAddedEvent', response.data.comment);
          this.comment = '';
        });
      }
    }
  }
</script>