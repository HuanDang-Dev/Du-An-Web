<template>
    <div class="admin">
        <div class="navbar-side px-2 justify-content-center">
            <h1>Đăng Tin</h1>
        </div>
        
        <div class="container-fluid-full mx-5 my-3 align-center">
            
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h4><i class="halflings-icon white user"></i><span class="break"></span>Bài đăng</h4>
                </div>
                <div class="d-flex flex-column mx-5 my-1">
                   <div class="card-body">
                       <div class="row">
                          <div class="col-md-6">
                              <input type="file" v-on:change="onFileChange" class="form-control">
                          </div>
                        <img v-bind:src="imagePreview" width="50%" height="50%" v-show="showPreview"/> 
                       </div>
                    </div>
                    <div class="d-flex flex-column m-4">
                        <label class="" for="">Tiêu đề</label>
                        <input class="p-2" type="text" v-model="title">
                    </div>
                     <div class="d-flex flex-column m-4">
                        <label class="" for="">Quận</label>
                        <select v-model="district_id" class="p-2" aria-placeholder="Chọn Quận">
                        <option v-for="option in districts" v-bind:value="option.id">
                        {{ option.name }}
                        </option>
                    </select>
                    </div>
                    <div class="d-flex flex-column m-4">
                        <label class="" for="">Địa chỉ</label>
                        <input class="p-2" v-model="address" type="text">
                    </div>    
                    <div class="d-flex flex-column m-4">
                        <label class="" for="">Diện tích (M<sup>2</sup>)</label>
                        <input class="p-2" type="number" v-model="area">
                    </div>
                    <div class="d-flex flex-column m-4">
                        <label class="" for="">Điện thoại</label>
                        <input class="p-2" type="text" v-model="phone">
                    </div>
                    <div class="d-flex flex-column m-4">
                        <label class="" for="">Giá tiền (VND)</label>
                        <input class="p-2" type="number" v-model="price">
                    </div>
                    <div class="d-flex flex-column m-4">
                        <label class="" for="">Mô tả nhà trọ</label>
                        <textarea name="" id="" cols="30" rows="10" v-model="description">
                    </textarea>
                    </div>
                    <div class="d-flex flex-column m-4">
                        <div class="p-2 w-100 " v-if="success == 1">
                            <div class="alert alert-success">Đăng tin thành công</div>
                        </div>
                        <div class="p-2 w-100 align-items-center" v-else>
                            <div class="p-2 w-100 " v-if="success == 0">
                                <div class="alert alert-danger">Đăng tin không thành công</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column m-4">
                        <div class="p-2 w-100 " v-if="success == 2">
                            <div class="alert alert-success">Cập nhật thành công</div>
                        </div>
                        <div class="p-2 w-100 align-items-center" v-else>
                            <div class="p-2 w-100 " v-if="success == 3">
                                <div class="alert alert-danger">Cập nhật không thành công</div>
                            </div>
                        </div>
                    </div>
                     
                    <div class="d-flex px-4 py-3 mb-2">
                        <button class="login__btn mx-3 w-25" id="postMotel"><a class="btn-register" @click="post" >Đăng Tin</a></button>
                        <button class="login__btn mx-3 w-25" id="updateMotel"><a class="btn-register" @click="update" >Cập nhật</a></button>
                        <button class="login__btn mx-3 w-25"><a class="btn-register" href="/">Hủy</a></button>
                    </div>
                </div>
                </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "post",
    data() {
        return {
            districts: [],
            image: null,
            district_id: 1,
            title: null,
            address: null,
            area: null,
            phone: null,
            price: null,
            description: null,
            user_id: null,
            imagePreview: null,
            showPreview: false,
            success: null,
            slug: null,
            motelId: null,
        }
    },
    methods: {
        onFileChange(event){
            
            this.image = event.target.files[0];

            let reader  = new FileReader();
            reader.addEventListener("load", function () {
                this.showPreview = true;
                this.imagePreview = reader.result;
            }.bind(this), false);

            if( this.image ){
                if ( /\.(jpe?g|png|gif)$/i.test( this.image.name ) ) {
                    reader.readAsDataURL( this.image );
                }
            }
        },
        post(){
            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
 
            let formData = new FormData();
            formData.append('image', this.image);
            formData.append('title', this.title);
            formData.append('description', this.description);
            formData.append('price', this.price);
            formData.append('area', this.area);
            formData.append('address', this.address);
            formData.append('phone', this.phone);
            formData.append('user_id', this.user_id);
            formData.append('district_id', this.district_id);

            axios.post('/storemotel', formData, config).then(response => {
                if(response.data.success){
                    this.success = 1;
                } else{
                    this.success = 0;
                }
        }).catch(error => {
          this.errors = error.response.data.comment
        })
      },
        update(){
            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
 
            let formData = new FormData();
            formData.append('motelId', this.motelId);
            formData.append('image', this.image);
            formData.append('title', this.title);
            formData.append('description', this.description);
            formData.append('price', this.price);
            formData.append('area', this.area);
            formData.append('address', this.address);
            formData.append('phone', this.phone);
            formData.append('user_id', this.user_id);
            formData.append('district_id', this.district_id);

            axios.post('/post/update', formData, config).then(response => {
                if(response.data.success){
                    this.success = 2;
                } else{
                    this.success = 3;
                }
        }).catch(error => {
          this.errors = error.response.data.comment
        })
        }
    },
    mounted() {
        let url = window.location.href;
        this.slug = url.substring(url.search('/post/update/') + 13)
        if(url.includes('/post/update/')){
            document.getElementById('postMotel').style.display = "none";
            axios.post('/post/get/motel',{
                slug: this.slug
            }).then((response) => {
                console.log(response.data.motel[0])
                var motel = response.data.motel[0];
                this.title = motel.title;
                this.district_id = motel.district_id;
                this.address = motel.address;
                this.area = motel.area;
                this.phone = motel.phone;
                this.price = motel.price;
                this.description = motel.description;
                this.motelId = motel.id
                // console.log(this.title)
            })
        } else {
            document.getElementById('updateMotel').style.display = "none";
        }
        axios.get('/api/getdistrict').then((response) => {
            this.districts = response.data
        })
        
    }
}

</script>

<style>
#app {
    background-color: initial;
    text-align: left;
    font-size: 18px;
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
    .login__btn{
    background: linear-gradient(to right, #6190e9, #4236f0);
    box-shadow: 0px 11px 34px -10px #6190e9;
     padding:1rem;
     border:none;
     outline:none;
     border-radius: 100px;
     color:white;
     font-weight: bold;
     display:flex;
     justify-content: center;
     align-items: center;
     cursor: pointer;
    }
    .btn-register {
      color: inherit;
      text-decoration: none;
    }
    button:focus {
      outline: none;
    }
    a:hover {
      color: inherit !important;
      text-decoration: none !important;
    }
    label {
        font-size: 20px;
    }
    input, textarea {
        border: 0.5px solid #cccccc;
        border-radius: 10px;
    }
.text-font {
    font-size: 20px;
}
</style>