<template>
  <div id="viewMotel">
    <div class="main-body pt-4 text-dark">
      <div class="container">
        <div class="row m-0 p-0  bg-white">
          <div class="card-body">
            <div class="row">
              <div class="position-relative mx-5 w-100">
                  <div v-for="i in [currentIndex]" :key="i">
                    <img :src="motel.images" />
                  </div>
                <a class="prev" @click="prev" >&#10094; </a>
                <a class="next" @click="next">&#10095; </a>
              </div>
            </div>
            <h3 class="card-title text-left ml-5 mt-4">{{motel.title}}</h3>
            <div class=" text-left mx-5 ">
              <div class="d-flex position-relative">
                <h5 class="text-danger mr-2">{{motel.price}}  VND </h5>
                <span> - </span>
                <h5 class="ml-2">  {{motel.area}} M<sup>2</sup></h5>
                <div class="position-absolute btn-rating">Rating: <span v-for="item in motel.rating" :key="item.id"><i class="fas fa-star text-warning"></i></span></div>
                <button class="position-absolute btn-like text-primary" @click="countLike()"><i class="far fa-thumbs-up text-primary btn-i-like"></i>{{motel.like}}</button>
              </div>
              <div>
                <p>Địa chỉ: {{motel.address}}</p>
                <p>
                  Mô tả: <br>
                  {{motel.description}}
                </p>
              </div><br>
              <div>
                <comment-wrapper></comment-wrapper>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</template>

<script>
import CommentWrapper from './Comments/CommentWrapper';
export default {
  components: { CommentWrapper },
  
  name: "viewMotel",
  data() {
    return {
      slug: '',
      motel: {},
    }
  },

  mounted: function() {
    this.startSlide();
    let url = window.location.href;
    this.slug = url.substring(url.search('/viewMotel/') + 11)
    axios.post('/api/getviewmotel', {
          slug: this.slug
        }).then((response) => {
    console.log(response.data[0])
    // console.log(this.owners)
    this.motel = response.data[0];
  })
  },

  methods: {
    startSlide: function() {
      this.timer = setInterval(this.next, 4000);
    },

    next: function() {
      this.currentIndex += 1;
    },
    prev: function() {
      this.currentIndex -= 1;
    },
    countLike: function() {
      this.motel.like += 1;
    }
  },

  computed: {
    currentImg: function() {
      return this.images[Math.abs(this.currentIndex) % this.images.length];
    }
  }
};
</script>
<style scoped>
ul li {
  list-style: none;
}

img {
  height:600px;
  width:100%
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.7s ease;
  border-radius: 0 4px 4px 0;
  text-decoration: none;
  user-select: none;
}

.next {
  right: 0;
}

.prev {
  left: 0;
}

.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.9);
}
.btn-like {
    right: 0;
    border: none;
    background-color: initial;
    top: -5px;
}
.btn-rating {
    left: 40%;
    border: none;
    background-color: initial;
}
i {
  font-size: 20px;
}
.btn-i-like {
    font-size: 30px;
}
button:focus{
  outline: none;
}
</style>