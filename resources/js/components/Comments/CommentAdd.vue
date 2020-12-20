<template>
  <div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <textarea
          name="comment"
          class="form-control"
          v-model="comment"
          placeholder="Viết bình luận, đánh giá của bạn về nhà trọ này vào đây. ...">
        </textarea>
      </div>

      <div class="form-group">
        <button class="btn btn-primary" @click="saveNewComment">Bình luận</button>
      </div>

    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import EventBus from './event-bus'
  export default {
    data() {
      return {
        comment: ''
      }
    },
    methods: {
      saveNewComment() {
        axios.post('/comment', {
          comment: this.comment,
          userId: 1,
          motelId:1,
        }).then(response => {
          this.comment = '';
          EventBus.$emit('commentAddedEvent', response.data.comment);
        }).catch(error => {
          // this.errors = error.response.data.comment
        })
      }
    }
  }
</script>