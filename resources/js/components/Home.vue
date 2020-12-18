<template>
    <div id="welcome">
        <div class="main-body pt-4 text-dark">
        <div class="container">
            <div class="row m-0 p-0  bg-white">
            <div class="card-body">
                <h5 class="card-title text-left">Cho thuê Bất động sản</h5>
                <div class="row">
                <div class="item-component col-md-3 text-left" v-for="(owner, i) in owners" :key="i">
                    <a href="/viewMotel" class=" border-primary" >
                        <div class="item">
                            <div>
                                <img class="w-100" src="/images/nhatro.jpg" alt="">
                            </div>
                            <div class="my-2 ml-2">
                                <h4 class="m-0">{{owner.title}}</h4>
                                <div class="position-relative my-2">
                                <div class="position-absolute btn-rating">Rating: <span v-for="item in owner.rating" :key="item.id"><i class="fas fa-star text-warning"></i></span></div>
                                <button class="position-absolute btn-like text-primary"><i class="far fa-thumbs-up text-primary btn-i-like"></i>{{owner.like}}</button>
                                </div>
                                <br>
                                <div class="d-flex p-1">
                                <h6 class="text-danger mr-2 mb-0">{{owner.giatien}}  </h6>
                                <span> - </span>
                                <h6 class="ml-2 mb-0">  {{owner.dientich}}m<sup>2</sup></h6>
                                </div>
                                <small class="text-muted"><i class="fas fa-angle-right pr-1"></i>{{owner.csvc}}</small>
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
      owners: [
        {
          images: [
            "/images/nhatro.jpg",
          ],
          title: "Hoàng Anh Dương",
          like: 40,
          rating: 4,
          giatien: "10Triệu",
          dientich: "50",
          csvc: "Có máy nóng lạnh, điều hòa"
        },
        {
          images: [
            "/images/nhatro.jpg",
          ],
          title: "Hoàng Anh Dương",
          like: 40,
          rating: 4,
          giatien: "10Triệu",
          dientich: "50",
          csvc: "Có máy nóng lạnh, điều hòa"
        },
        {
          images: [
            "/images/nhatro.jpg",
          ],
          title: "Hoàng Anh Dương",
          like: 40,
          rating: 4,
          giatien: "10Triệu",
          dientich: "50",
          csvc: "Có máy nóng lạnh, điều hòa"
        },
        {
          images: [
            "/images/nhatro.jpg",
          ],
          title: "Hoàng Anh Dương",
          like: 40,
          rating: 4,
          giatien: "10Triệu",
          dientich: "50",
          csvc: "Có máy nóng lạnh, điều hòa"
        }
      ]
    }
  }
};
</script>
<style scoped>

</style>