<template>
  <div class="footer-component text-black py-2 pt-4 mx-5">
    <div class="container">
      <div class="row m-0 p-0 text-left">
        <div class="col-md-8 col-sm-12 m-0 px-5 d-flex flex-column">
          <h4>Chúng tôi</h4>
          <p>Với hệ thống căn hộ tiện ích đạt chuẩn, Nhà Trọ Tốt chú trọng xây dựng tính cộng đồng và phát triển đời sống xã hội cho thế hệ trẻ dựa trên sức mạnh của công nghệ.</p>
          <br>
          <p>CÔNG TY TNHH NHÀ TRỌ TỐT - Địa chỉ: Hà Nội </p>
          <p>Email: trogiup@chotot.vn - Đường dây nóng: (028)123456789</p>
        </div>
        <div class="col-md-4 col-sm-6 m-0 p-1">
          <ul class="text-left list-nostyle">
              <li class="my-2">HỖ TRỢ KHÁCH HÀNG</li>
              <li class="my-1"><a href="#">Trung tâm trợ giúp</a></li>
              <li class="my-1"><a href="/rule">Quy định cần biết</a></li>
          </ul>
        </div>
      </div>
      <div class="row m-0 p-0 pt-4 border-top text-left">
        <div class="col-md-6 col-sm-4 px-5">
          <h5>Liên hệ</h5>
          <div class="text-left list-nostyle d-flex flex-row">
            <div><a href="#"><img  class="w-50" src="/images/facebook.png" alt=""></a></div>    
            <div><a href="#"><img class="w-50" src="/images/google.png" alt=""></a></div>
            <div><a href="#"><img class="w-50" src="/images/skype.png" alt=""></a></div>   
          </div>
        </div>
        <div class="col-md-6 col-sm-4 px-5">
          <h5>Chứng nhận</h5>
          <div class="text-left d-flex flex-row py-2">
            <div class="mt-1 ml-1"><img  class="w-100" src="/images/cerfiticate.png" alt=""></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
   name: "FooterComponent",
};
</script>

<style scoped>
.footer-component {
  border-top: 2px solid #c3c3c3;
}
.list-nostyle {
  list-style: none;
}
a {
  text-decoration: none;
  color: inherit;
}
.border-top{
  border-top: 2px solid #c3c3c3 !important;
}
</style>
