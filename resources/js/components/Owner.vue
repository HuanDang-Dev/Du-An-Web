<template>
  <div class="admin">
    <div class="navbar-side px-2 justify-content-center">
        <h1>Quản lý bài đăng</h1>
    </div>
    
    <div class="container-fluid-full px-3 pt-3">
        <div class="row-fluid">
            <div id="content" class="span10">
                <div class="row-fluid sortable">
                    <div class="box span12">
                        <tabs class="my-tabs" width="50%">
                            <tab title="Đã thuê">
                                <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Tên bài đăng</th>
                                                <th>Ngày đăng</th>
                                                <th>Trạng thái</th>
                                                <th>Chưa Thuê</th>
                                                <th>Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="(ad, i) in rented" :key="i">
                                            <tr>
                                                <td>{{ad.title}}</td>
                                                <td class="center">{{ad.created_at}}</td>
                                                <td class="center">
                                                    <div class=" d-flex flex-wrap w-auto">
                                                        <div class="label d-flex align-items-center label-important  m-1">Like:  <h2 class="m-0 d-flex align-items-center">{{ad.like}}</h2></div>
                                                        <div class="label d-flex align-items-center label-important m-1">Rating: <span v-for="item in ad.rating" :key="item.id"><i class="fas fa-star"></i></span></div>
                                                        <div class="label d-flex align-items-center label-important m-1">Đã thuê</div>
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <button class="btn btn-success py-1 px-2 my-1" v-on:click="notrentItem(ad.slug, i)">
                                                        <i class="fas fa-check-square"></i>
                                                    </button>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success py-1 px-2 my-1" :href="ad.src">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info py-1 pl-2 pr-1 my-1" :href="ad.update">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger py-1 px-2 my-1" href="#" v-on:click="removeElementRented(ad.slug,i)">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </tab>

                            <tab title="Chưa thuê">
                                <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Tên bài đăng</th>
                                                <th>Ngày đăng</th>
                                                <th>Trạng thái</th>
                                                <th>Cho Thuê</th>
                                                <th>Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="(owner, i) in notrent" :key="i">
                                            <tr>
                                                <td>{{owner.title}}</td>
                                                <td class="center">{{owner.created_at}}</td>
                                                <td class="center">
                                                    <div class=" d-flex flex-wrap w-auto">
                                                        <div class="label d-flex align-items-center label-success  m-1">Like:  <h2 class="m-0 d-flex align-items-center">{{owner.like}}</h2></div>
                                                        <div class="label d-flex align-items-center label-success m-1">Rating: <span v-for="item in owner.rating" :key="item.id"><i class="fas fa-star"></i></span></div>
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <button class="btn btn-success py-1 px-2 my-1" v-on:click="rentItem(owner.slug, i)">
                                                        <i class="fas fa-check-square"></i>
                                                    </button>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success py-1 px-2 my-1" :href="owner.src">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                     <a class="btn btn-info py-1 pl-2 pr-1 my-1" :href="owner.update">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger py-1 px-2 my-1" href="#" v-on:click="removeElementNotRent(owner.slug, i)">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </tab>

                            <tab title="Chờ phê duyệt">
                                 <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Tên bài đăng</th>
                                                <th>Ngày đăng</th>
                                                <th>Phê duyệt</th>
                                                <th>Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="(owner, i) in unapprove" :key="i">
                                            <tr>
                                                <td>{{owner.title}}</td>
                                                <td class="center">{{owner.created_at}}</td>
                                                <td class="center">
                                                    <button class="btn btn-success py-1 px-2 my-1" v-on:click="approveItem(owner.slug, i)">
                                                        <i class="fas fa-check-square"></i>
                                                    </button>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success py-1 px-2 my-1" :href="owner.src">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info py-1 pl-2 pr-1 my-1" :href="owner.update">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger py-1 px-2 my-1" href="#" v-on:click="removeElementUnapprove(owner.slug, i)">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </tab>
                        </tabs>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    
    <footer>
        <p>
            <span style="text-align:left;float:left"></span>
        </p>
    </footer>
  </div>
</template>

<script>
import { Tabs, Tab } from 'vue-slim-tabs'
export default {
    components: {
    Tabs, Tab
  },
    name: "admin",
    data() {
        return {
            rented: [],
            notrent: [],
            unapprove: [],
            stars: 3,
            maxStars: 5,
            hasCounter: true
        }
    },
    methods: {
        rate(star, index) {
            if (typeof star === 'number' && star <= this.maxStars && star >= 0) {
                this.approve[index].rating = this.approve[index].rating === star ? star - 1 : star
            }
        },
        removeElementNotRent: function (slugMotel, index) {
            var parent = this;
            Swal.fire({
                title: 'Bạn chắc là muốn xóa chứ?',
                text: "Bài đăng sẽ không thể được tìm thấy bởi bất kỳ ai nữa!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
                }).then(function(result) {
                    // parent.$delete(parent.approve, index);
                     if (result.isConfirmed) {
                        parent.deleteItem(slugMotel, parent.notrent, index);
                    } else {
                    }
                }
            );
        },
        removeElementRented: function (slugMotel, index) {
            var parent = this;
            Swal.fire({
                title: 'Bạn chắc là muốn xóa chứ?',
                text: "Bài đăng sẽ không thể được tìm thấy bởi bất kỳ ai nữa!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
                }).then(function(result) {
                    // parent.$delete(parent.motelAdmin, index);
                    if (result.isConfirmed) {
                        parent.deleteItem(slugMotel, parent.rented, index);
                    } else {
                    }
                }
            );
        },
        removeElementUnapprove: function (slugMotel, index) {
                var parent = this;
               Swal.fire({
                title: 'Bạn chắc là muốn xóa chứ?',
                text: "Bài đăng sẽ không thể được tìm thấy bởi bất kỳ ai nữa!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
                }).then(function(result) {
                    // parent.$delete(parent.unapprove, index)
                    if (result.isConfirmed) {
                        parent.deleteItem(slugMotel, parent.unapprove, index);
                    } else {
                    }
                }
            );
        },
         notrentItem: function (slugMotel, index) {
            axios.post('/owner/notrent',  {
                    slug: slugMotel
                  }).then((response) => {
                if(response.data.success){
                    Swal.fire("Thành công", "", "success");
                    this.$delete(this.rented, index)
                    this.reload();
                }
            })
        },
        rentItem: function (slugMotel, index) {
            axios.post('/owner/rent',  {
                    slug: slugMotel
                  }).then((response) => {
                if(response.data.success){
                    Swal.fire("Thành công", "", "success");
                    this.$delete(this.notrent, index)
                    this.reload();
                }
            })
        },
        deleteItem(slugMotel, list, index){
            this.$delete(list, index);
            axios.post('/admin/delete',  {
                    slug: slugMotel
                  }).then((response) => {
                if(response.data.success){
                    Swal.fire(
                        'Đã xóa!',
                        'Bài đăng đã bị xóa',
                        'success'
                    );
                    this.reload();
                }
            })
        }, 
        reload(){
            axios.get('/owner/getindex').then((response) => {
                this.rented = response.data.rented;
                this.notrent = response.data.notrent;
                this.unapprove = response.data.unapprove;
                // this.user = response.data.users;
            })
        }                
    },
    mounted() {
        axios.get('/owner/getindex').then((response) => {
                this.rented = response.data.rented;
                this.notrent = response.data.notrent;
                this.unapprove = response.data.unapprove;
                // this.user = response.data.users;
            })
    }
}
</script>
<style src="vue-slim-tabs/themes/default.css"></style>

<style>
#app {
    background-color: initial;
    text-align: left;
    font-size: 16px;
}
.navbar-side {
    display: flex;
    position: relative;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    background-color: #e3e3e3;
    padding: .5rem 1rem;
}
.nav.pull-right {
    float: right;
    margin-right: 0;
}
.box {
    border: 2px solid #578EBE;
    background: #fff !important;
    margin-bottom: 28px;
}
.box-header {
    line-height: 16px;
    padding: 10px;
    background: #578EBE;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    overflow: hidden;
}
.dropdown-menu {
    border-top: 5px solid transparent;
    border-radius: 2px !important;
    position: absolute;
    top: 100%;
    left: -10px !important;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    max-width: 300px;
    padding: 0px 0;
    margin: 0px 0 0 0;
    list-style: none;
    text-shadow: none;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
.dropdown-menu:before {
    position: absolute;
    top: -7px;
    left: 9px;
    display: inline-block;
    border-right: 7px solid transparent;
    border-bottom: 7px solid #ccc;
    border-left: 7px solid transparent;
    border-bottom-color: #313131;
    content: '';
    right: 15px;
    left: auto;
}

.dropdown-menu-title {
    background: rgb(49, 49, 49);
    color: #fff;
    padding: 8px 0px;
    position: relative;
}
.label, .badge {
    text-shadow: none;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    font-size: 12px;
    padding: 3px 6px;
    width: auto;
}
 .label-success{
    background: #43B5AD !important;
    border-color: #43B5AD !important;
    color: #fff;
}
 .label-important{
    background: #E25A59 !important;
    border-color: #E25A59 !important;
    color: #fff;
}
.btn-admin {
    border: none;
    background-color: initial;
    font-size: 16px;
}
.btn-admin:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.btn-admin.focus, .btn-admin:focus {
    outline: 0;
}

.btn-admin:hover {
    color: #212529;
    text-decoration: none;
}
.text-font {
    font-size: 20px;
}
</style>