<template>
  <div class="card pb-1">
    <div class="card-body">
      <div id="name"> {{comment.user.name}}: </div>
      <div id="created_at" >{{comment.created_at}}</div>
      <br>
    <div id="body"> {{comment.body}} </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['comment']
  }
</script> 

<style>
  #created_at{
    display: inline; 
    color: #797979;
    font-size: 14px;
    padding-top: 10px;
    padding-left: 800px;
  }
  #name{
    display: inline; 
    font-size: 19px;
    font-weight: bold;
    color: #000FFF;
  }
  #body{
    display: inline; 
    font-size: 24px;
    color: #000FFF;
  }
</style>