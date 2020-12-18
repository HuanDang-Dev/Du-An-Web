<template>
  <div class="navigation-component">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-12 text-left px-5 py-2">
          <img class="logo-img w-25" src="/images/logo.png" alt />
        </div>
        <div class="col-md-7 col-sm-12 py-3 d-flex">
          <div class="px-4">
            <a href="/" class="btn-icon"><i class="fas fa-home pr-2"></i>Home </a>
          </div>
          <div class="px-4">
            <a href="/owner" class="btn-icon"><i class="far fa-user pr-2"></i>Tôi bán </a>
          </div>
          <div class="px-4">
            <a href="" class="btn-icon"><i class="far fa-comments pr-2"></i>Chat </a>
          </div>
          <div class="px-4">
            <a href="" class="btn-icon"><i class="far fa-bell pr-2"></i>Thông báo </a>
          </div>
        </div>
      </div>
      <div class="row pb-1">
        <div class="col-md-6 col-sm-12 text-left py-2 pl-5">
          <div class="d-flex pl-5">
            <button class="bg-search"><i class="fas fa-search pt-1 pl-2 pr-1"></i></button>
            <input placeholder="Bất động sản" id="__inputItemProps" type="text" class="input-search w-100">
          </div>
        </div>
        <div class="col-md-5 col-sm-12 ml-4 pl-5 d-flex align-items-center">
          <div class="btn-edit py-2 px-4">
            <a href="/post"><i class="far fa-edit pr-2"></i>Đăng tin</a>
          </div>
          <div class="pl-3 ml-3">
            <a href="/login">
              <div class="d-flex align-items-center">
                <i class="far fa-user-circle pr-2 btn-icon-big"></i>
                <h5 class="pt-2">Đăng nhập</h5>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
   name: "NavigationComponent",
};
</script>

<style scoped>
.list-nostyle {
  list-style: none;
}
a {
  text-decoration: none;
  color: inherit;
}
.navigation-component {
  font-family: Helvetica, Arial, sans-serif;
  position: sticky;
  background-color: rgb(255, 186, 0);
  border-color: rgb(255, 161, 0);
  top: 0px;
  width: 100%;
  font-size: 16px;
  z-index: 1000;
  user-select: none;
  transition-property: height;
  transition-duration: 0.1s;
}
.btn-icon {
  color: black;
}
.btn-icon-big {
  font-size: 30px;
}
.btn-icon:hover {
  color: #505050;
}
i {
  font-size: 20px;
}
.input-search {
    height: 36px;
    background-color: rgb(255, 255, 255);
    border-radius: 0 5px 5px 0;
    border: none;
    position: relative;
    padding: 0px;
    font-size: 15px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.33;
    letter-spacing: normal;
    outline: none;
    color: rgb(34, 34, 34);
    text-indent: 12px;
}
.bg-search {
  background: white;
  border-radius: 5px 0 0 5px;
  border: white;
}
button:focus {
  outline: none;
}
.btn-edit {
    text-transform: uppercase;
    background: #fc9807;
    color: #fff;
    font-weight: bold;
    border-radius: 4px;
    text-decoration: none;
}
</style>
