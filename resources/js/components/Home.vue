<template>
    <div id="welcome">
        <div class="main-body pt-4 text-dark">
        <div class="container">
            <div class="row m-0 p-0  bg-white">
            <div class="card-body">
                <div class="d-flex flex-column m-4">
                        <label class="" for="">Quận</label>
                        <select v-model="districtId" class="p-2" aria-placeholder="Chọn Quận" v-on:change="onSelectChange">
                        <option v-for="option in districts" v-bind:value="option.id">
                        {{ option.name }}
                        </option>
                    </select>
                    </div>
                <div class="row">
                <div class="item-component col-md-3 text-left" v-for="(post, i) in posts" :key="i">
                    <a :href="post.src" class=" border-primary" >
                        <div class="item">
                            <div>
                                <img class="w-100" :src="post.images" alt="">
                            </div>
                            <div class="my-2 ml-2">
                                <h4 class="m-0">{{post.title}}</h4>
                                <div class="position-relative my-2">
                                <div class="position-absolute btn-rating">Rating: <span v-for="item in post.rating" :key="item.id"><i class="fas fa-star text-warning"></i></span></div>
                                <button class="position-absolute btn-like text-primary"><i class="far fa-thumbs-up text-primary btn-i-like"></i>{{post.like}}</button>
                                </div>
                                <br>
                                <div class="d-flex p-1">
                                <h6 class="text-danger mr-2 mb-0">{{post.price}}  </h6>
                                <span> - </span>
                                <h6 class="ml-2 mb-0">  {{post.area}}m<sup>2</sup></h6>
                                </div>
                                <small class="text-muted"><i class="fas fa-angle-right pr-1"></i>{{post.description}}</small>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>

export default {
  name: "welcome",
  data() {
    return {
      districtId: 11,
      posts: [],
      districts: [],
    }
  },
  mounted() {
    axios.post('/api/getmotel', {
            districtId: this.districtId
          }).then((response) => {
      this.posts = response.data;
    })
    axios.get('/api/getdistrict').then((response) => {
              this.districts = response.data
    })
  },
    methods: {
        onSelectChange(event){
            axios.post('/api/getmotel', {
                    districtId: this.districtId
                  }).then((response) => {
              this.posts = response.data;
            })
        }
    },
};
</script>
<style scoped>

</style>