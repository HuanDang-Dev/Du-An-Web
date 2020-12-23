<template>
  <div class="card" style="border-radius: 0px 0px 30px 30px; margin: 1rem; border: 1px solid blue;">
  <h5 class="card-header" style="border-radius: 0px 0px 0px 0px; padding-top: 0.2rem; padding-bottom: 0.2rem; background-color: #00FFFF;">{{comment.user.name}} <h6 id="time"> {{comment.created_at}}</h6></h5>
  
  <div class="card-body" style="padding-top: 0.2rem; padding-bottom: 0.2rem;">
    <p class="card-text" >{{comment.body}}</p>
  </div>
</div>
</template>

<script>
  export default {
    props: ['comment']
  }
</script>