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
        <div v-if="status">
            <button class="btn btn-primary" @click="saveNewComment">Bình luận</button>
        </div>
        <div v-else>
            <a href="/commentIndex" class="btn btn-primary">Bình luận </a>
        </div>
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
        comment: '',
        status: true,
      }
    },
    mounted: function(){
      axios.post('/comment', {
          comment: this.comment,
          motelId: this.motel_id,
        }).then(response => {
          this.status = true;
        }).catch(error => {
          if(error.response.data.message === 'Unauthenticated.'){
            this.status = false;
          }
        })
    },
    props:[
      'motel_id'
    ],
    methods: {
      saveNewComment() {
        axios.post('/comment', {
          comment: this.comment,
          motelId: this.motel_id,
        }).then(response => {
          this.comment = '';
          EventBus.$emit('commentAddedEvent', response.data.comment);
        }).catch(error => {
          this.errors = error.response.data.message;
        })
      }
    }
  }
</script>