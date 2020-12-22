<template>
<div class="card">
  <h5 class="card-header">{{comment.user.name}} <h6 id="time"> {{comment.created_at}}</h6></h5>
  
  <div class="card-body">
    <p class="card-text">{{comment.body}}</p>
    <button class="btn btn-primary">Thích</button>
    <button class="btn btn-primary">Trả lời</button>
  </div>
</div>
</template>

<script>
  export default {
    props: ['comment']

   }
</script> 
<style>
  #time{
    display: inline;
  }
</style>