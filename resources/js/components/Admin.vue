<template>
  <div class="admin">
    <div class="navbar-side px-2 justify-content-center">
        <h1>ADMIN</h1>
    </div>
    
    <div class="container-fluid-full px-3 pt-3">
        <div class="row-fluid">
            <div id="content" class="span10">
                <div class="row-fluid sortable">
                    <div class="box span12">
                        <tabs class="my-tabs" width="50%">
                            <tab title="Bài Đăng">
                                <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Tên bài đăng</th>
                                                <th>Ngày đăng</th>
                                                <th>Trạng thái</th>
                                                <th>Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="(ad, i) in motelAdmin" :key="i">
                                            <tr>
                                                <td>{{ad.title}}</td>
                                                <td class="center">{{ad.created_at}}</td>
                                                <td class="center">
                                                    <div class=" d-flex flex-wrap w-auto" v-if="ad.activy == 0">
                                                        <div class="label d-flex align-items-center label-success m-1">Like:  <h2 class="m-0 d-flex align-items-center">{{ad.like}}</h2></div>
                                                        <div class="label d-flex align-items-center label-success m-1">Rating: <span v-for="item in ad.rating" :key="item.id"><i class="fas fa-star"></i></span></div>
                                                    </div>
                                                    <div class=" d-flex flex-wrap w-auto" v-else>
                                                        <div class="label d-flex align-items-center label-important  m-1">Like:  <h2 class="m-0 d-flex align-items-center">{{ad.like}}</h2></div>
                                                        <div class="label d-flex align-items-center label-important m-1">Rating: <span v-for="item in ad.rating" :key="item.id"><i class="fas fa-star"></i></span></div>
                                                        <div class="label d-flex align-items-center label-important m-1">Đã thuê</div>
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success py-1 px-2 my-1" :href="ad.src">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info py-1 pl-2 pr-1 my-1" :href="ad.linkEdit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger py-1 px-2 my-1" href="#" v-on:click="removeElementAdmin(ad.slug,i)">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </tab>

                            <tab title="Đã phê duyệt">
                                <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Tên bài đăng</th>
                                                <th>Ngày đăng</th>
                                                <th>Chủ trọ</th>
                                                <th>Trạng thái</th>
                                                <th>Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="(owner, i) in approve" :key="i">
                                            <tr>
                                                <td>{{owner.title}}</td>
                                                <td class="center">{{owner.created_at}}</td>
                                                <td class="center">{{owner.name}}</td>
                                                <td class="center">
                                                    <div class=" d-flex flex-wrap w-auto" v-if="owner.activy == 0">
                                                        <div class="label d-flex align-items-center label-success m-1">Like:  <h2 class="m-0 d-flex align-items-center">{{owner.like}}</h2></div>
                                                        <!-- <div class="rating"> -->
                                                        <!-- <ul class="d-flex flex-row m-1">
                                                            <li @click="rate(star, i)" v-for="star in maxStars" :class="{ 'active': star <= owner.rating }" :key="star" class="star">
                                                                <i :class="star <= owner.rating ? 'fas fa-star' : 'far fa-star'"></i> 
                                                            </li>
                                                        </ul> -->
                                                        
                                                    <!-- </div> -->
                                                        <div class="label d-flex align-items-center label-success m-1">Rating: <span v-for="item in owner.rating" :key="item.id"><i class="fas fa-star"></i></span></div>
                                                    </div>
                                                    <div class=" d-flex flex-wrap w-auto" v-else>
                                                        <div class="label d-flex align-items-center label-important  m-1">Like:  <h2 class="m-0 d-flex align-items-center">{{owner.like}}</h2></div>
                                                        <div class="label d-flex align-items-center label-important m-1">Rating: <span v-for="item in owner.rating" :key="item.id"><i class="fas fa-star"></i></span></div>
                                                        <div class="label d-flex align-items-center label-important m-1">Đã thuê</div>
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success py-1 px-2 my-1" :href="owner.src">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                    <button class="btn btn-danger py-1 px-2 my-1" href="#" v-on:click="removeElementApprove(owner.slug, i)">
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
                                                <th>Chủ trọ</th>
                                                <th>Phê duyệt</th>
                                                <th>Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="(owner, i) in unapprove" :key="i">
                                            <tr>
                                                <td>{{owner.title}}</td>
                                                <td class="center">{{owner.created_at}}</td>
                                                <td class="center">{{owner.name}}</td>
                                                <td class="center">
                                                    <button class="btn btn-success py-1 px-2 my-1" v-on:click="approveItem(owner.slug, i)">
                                                        <i class="fas fa-check-square"></i>
                                                    </button>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success py-1 px-2 my-1" :href="owner.src">
                                                        <i class="fas fa-search-plus"></i>
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
                            <tab title="Báo Cáo">
                                 <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Nội dung</th>
                                                <th>Xử lý</th>
                                                <th>Ngày khởi tạo</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="(owner, i) in report" :key="i">
                                            <tr>
                                                <td>{{owner.name}}</td>
                                                <td class="center">{{owner.email}}</td>
                                                <td class="center">{{owner.phone}}</td>
                                                <td class="center">{{owner.mess}}</td>
                                                <td class="center">
                                                    <button class="btn btn-success py-1 px-2 my-1" v-on:click="confirmReport(owner.id, i)">
                                                        <i class="fas fa-check-square"></i>
                                                    </button>
                                                </td>
                                                <td class="center">{{owner.created_at}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </tab>
                            <tab title="Chủ trọ">
                                 <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Số bài đăng</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="(owner, i) in user" :key="i">
                                            <tr>
                                                <td>{{owner.name}}</td>
                                                <td class="center">{{owner.email}}</td>
                                                <td class="center">{{owner.count}}</td>
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
            motelAdmin: [],
            approve: [],
            unapprove: [],
            report: [],
            user: [],
            stars: 3,
            maxStars: 5,
        }
    },
    methods: {
        removeElementApprove: function (slugMotel, index) {
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
                }).then(function() {
                    // parent.$delete(parent.approve, index);
                    parent.deleteItem(slugMotel, parent.approve, index);
                    
                }
            );
        },
        removeElementAdmin: function (slugMotel, index) {
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
                }).then(function() {
                    // parent.$delete(parent.motelAdmin, index);
                    parent.deleteItem(slugMotel, parent.motelAdmin, index);
                    
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
                }).then(function() {
                    // parent.$delete(parent.unapprove, index)
                    parent.deleteItem(slugMotel, parent.unapprove, index);
                }
            );
        },
        approveItem: function (slugMotel, index) {
            axios.post('/admin/approve',  {
                    slug: slugMotel
                  }).then((response) => {
                if(response.data.success){
                    Swal.fire("Phê duyệt thành công", "Bầy giờ bài viết đã có thể  được nhìn thầy công khai!", "success");
                    this.$delete(this.unapprove, index)
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
        confirmReport: function (reportId, index) {
            axios.post('/admin/report',  {
                    id: reportId
                  }).then((response) => {
                if(response.data.success){
                    Swal.fire("Phê duyệt thành công", "Bầy giờ bài viết đã có thể  được nhìn thầy công khai!", "success");
                    this.$delete(this.report, index)
                    this.reload();
                }
            })
        },
        reload(){
            axios.get('/admin/getindex').then((response) => {
                this.motelAdmin = response.data.list;
                this.approve = response.data.approve;
                this.unapprove = response.data.unapprove;
                this.user = response.data.users;
                this.report = response.data.report;
            })
        }                
    },
    mounted() {
        axios.get('/admin/getindex').then((response) => {
            this.motelAdmin = response.data.list;
            this.approve = response.data.approve;
            this.unapprove = response.data.unapprove;
            this.user = response.data.users;
            this.report = response.data.report;
            // console.log(this.report)
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