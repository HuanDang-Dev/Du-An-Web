<template>
  <div id="viewMotel">
    <div class="main-body pt-4 text-dark">
      <div class="container">
        <div class="row m-0 p-0  bg-white">
          <div class="card-body">
            <div class="row">
              <div class="position-relative mx-5 w-100">
                  <!-- <div v-for="i in [currentIndex]" :key="i"> -->
                    <img :src="motel.images" />
                  <!-- </div> -->
                <a class="prev"  >&#10094; </a>
                <a class="next" >&#10095; </a>
              </div>
            </div>
            <h3 class="card-title text-left ml-5 mt-4">{{motel.title}}</h3>
            <div class=" text-left mx-5 ">
              <div class="d-flex position-relative">
                <h5 class="text-danger mr-2">{{motel.price}}  VND </h5>
                <span> - </span>
                <h5 class="ml-2">  {{motel.area}} M<sup>2</sup></h5>
                <div class="position-absolute btn-rating">Rating: <span v-for="item in motel.rating" :key="item.id"><i class="fas fa-star text-warning"></i></span></div>
                <button class="position-absolute btn-like text-primary" @click="countLike()">
                  <div v-if="is_like === 1">
                    <i class="fas fa-thumbs-up text-primary btn-i-like"></i>{{likes}}
                  </div>
                  <div v-else-if="is_like === 0">
                    <i class="far fa-thumbs-up text-primary btn-i-like"></i>{{likes}}
                  </div>
                </button>
                  <div v-if="is_like === 2">
                    <a class="position-absolute btn-like text-primary" href="/commentIndex"><i class="far fa-thumbs-up text-primary btn-i-like"></i>{{likes}}</a>
                  </div>
              </div>
              <div>
                <p>Địa chỉ: {{motel.address}}</p>
                <p>
                  Mô tả: <br>
                  {{motel.description}}
                </p>
              </div><br>
              <div class="rating">
                Đánh giá({{ countRating }}):
                  <ul class="d-flex flex-row m-1">
                      <li @click="rate(star)" v-for="star in maxStars" :class="{ 'active': star <= stars }" :key="star" class="star">
                          <i :class="star <= stars ? 'fas fa-star' : 'far fa-star'"></i> 
                      </li>
                  </ul>
                  
              </div>
              <div>
                <comment-wrapper v-bind:motel_id=this.motel.id></comment-wrapper>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <button ref="auth"> -->
    <a href="/commentIndex" id="auth"></a>
    <!-- </button> -->
    
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
      stars: 0,
      maxStars: 5,
      likes: 0,
      countRating: '',
      is_like: 1
    }
  },
  mounted: function() {
    this.startSlide();
    let url = window.location.href;
    this.slug = url.substring(url.search('/viewMotel/') + 11)
    axios.post('/getviewmotel', {slug: this.slug})
    .then((response) => {
      this.motel = response.data.motel[0];
      this.countRating = response.data.countRating;
      this.stars = response.data.rate;
      this.likes = this.motel.like;
      this.checkLike();
    })
  },

  methods: {
    rate(star) {
            if (typeof star === 'number' && star <= this.maxStars && star >= 0) {
                this.stars = this.stars === star ? star - 1 : star
            }
            var parent = this;
            Swal.fire({
                title: 'Xác nhận đánh giá',
                text: "",
                type: 'confirm',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy'
                }).then(function(result) {
                    // parent.$delete(parent.approve, index);
                    if (result.isConfirmed) {
                      parent.rating(parent.stars,);
                    } else {
                      parent.stars = 0;
                    }
                }
            );
        },
    startSlide: function() {
      this.timer = setInterval(this.next, 4000);
    },
    checkLike: function(){
      axios.post('/checkLike',{motelId: this.motel.id,})
        .then((response) => {
          this.is_like = response.data.is_like;
        })
    },
    countLike: function() {
      this.checkLike();
      axios.post('/saveLike',{
        motelId: this.motel.id,
        motelLike: this.motel.like,
        isLike: this.is_like,
      })
      .then((response) => {
        this.is_like = 1 - response.data.is_like;
        this.likes = response.data.likes[0].like;
      })
    }, 
    rating(star){
      axios.post('/viewmotel/rating',  {
              motelId: this.motel.id,
              rating: star,
            }).then((response) => {
          if(response.data.success){
              Swal.fire("Đánh giá thành công", "", "success");
              this.reload();
          } else{
            var parent = this;
            Swal.fire({
                title: 'Vui lòng đăng nhập',
                text: " ",
                type: 'confirm',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'login',
                cancelButtonText: 'Hủy'
                }).then(function(result) {
                    // parent.$delete(parent.approve, index);
                    if (result.isConfirmed) {
                      document.getElementById('auth').click();
                    } else {
                      parent.stars = 0;
                    }
                    
                }
            );
          }
      })
    },
    reload(){
      axios.post('/getviewmotel', {
              slug: this.slug
            }).then((response) => {
        this.motel = response.data.motel[0];
        this.countRating = response.data.countRating;
                this.stars = response.data.rate;

      });
    }
  },

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