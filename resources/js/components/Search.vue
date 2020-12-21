<template>
  <div id="search">
        <div class="main-body pt-4 text-dark">
        <div class="container">
            <div class="row m-0 p-0  bg-white">
            <div class="card-body">
                <div class="d-flex flex-row m-4">
                      <h1 class="pr-2" for="">Quận</h1>
                      <select v-model="districtId" class="p-2 w-50" aria-placeholder="Chọn Quận">
                        <option v-for="option in districts" v-bind:value="option.id">
                          {{ option.name }}
                          </option>
                      </select>
                  </div>
                    <h4 class="card-title text-left ml-4" >Kết quả tìm kiếm truyện: <strong>{{key}}</strong></h4>
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
  name: "Search",
  data() {
    return {
      key: this.$route.params.search,
      districtId: 11,
      posts: [],
      districts: [],
    }
  },
  mounted() {
    axios.get('/api/index').then((response) => {
      this.truyenNgonTinh = response.data['truyenngontinh']
      this.truyenTienHiep = response.data['truyentienhiep']
      this.truyenTeen = response.data['truyenteen']
    })
    axios.get('/api/search/?search='+ this.key).then((response) => {
      this.search = response.data['search']
    })
  }
};
</script>
<style scoped>
ul > li {
  list-style: none;
}
.border-item {
  border-top: 2px dashed #cfcfcf;
}
a {
  color: #2c3e50;
  text-decoration: none;
}
.image-item {
  display: block;
  width: 35px;
  flex-shrink: 0;
}
.image-item img {
  max-width: 100%;
  vertical-align: middle;
}
h1, h5, select {
  font-family: 'Noto Serif', serif;
}
h4 {
  font-size: 26px;
}
</style>