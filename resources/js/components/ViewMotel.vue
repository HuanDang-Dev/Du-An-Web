<template>
  <div id="viewMotel">
    <div class="main-body pt-4 text-dark">
      <div class="container">
        <div class="row m-0 p-0  bg-white">
          <div class="card-body">
            <div class="row">
              <div class="position-relative mx-5 w-100">
                  <div v-for="i in [currentIndex]" :key="i">
                    <img :src="currentImg" />
                  </div>
                <a class="prev" @click="prev" href="#">&#10094; </a>
                <a class="next" @click="next" href="#">&#10095; </a>
              </div>
            </div>
            <h3 class="card-title text-left ml-5 mt-4">{{title}}</h3>
            <div class=" text-left mx-5 ">
              <div class="d-flex position-relative">
                <h5 class="text-danger mr-2">{{giatien}}  </h5>
                <span> - </span>
                <h5 class="ml-2">  {{dientich}}m<sup>2</sup></h5>
                <div class="position-absolute btn-rating">Rating: <span v-for="item in rating" :key="item.id"><i class="fas fa-star text-warning"></i></span></div>
                <button class="position-absolute btn-like text-primary" @click="countLike()"><i class="far fa-thumbs-up text-primary btn-i-like"></i>{{like}}</button>
              </div>
              <div>
                <p>Vị trí địa lý: {{des.vitri}}</p>
                <p>Nhà trọ gần trường đại học: {{des.ganTruongDH}}</p>
                <p>Điều kiện cơ sở vật chất: {{des.csvc}}</p>
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
  name: "viewMotel",
  data() {
    return {
      images: [
        "/images/nhatro1.jpg",
        "/images/nhatro2.jpg",
        "/images/nhatro3.jpg",
      ],
      timer: null,
      currentIndex: 0,
      title: "Hoàng Anh Dương",
      name: "Tuấn Hùng",
      date: "01/07/2000",
      status: true,
      like: 40,
      rating: 4,
      giatien: "10Triệu",
      dientich: "50",
      des: {
        vitri: "Cầu giấy",
        ganTruongDH: "Trường Đại học Công nghệ",
        csvc: "Có máy nóng lạnh, điều hòa"
      }
    }
  },

  mounted: function() {
    this.startSlide();
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
      this.like += 1;
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