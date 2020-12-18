<template>
  <div class="contact-component">
    <div class="card border-radius-none">
      <div class="card-body p-0">
        <div class="row m-0 p-0">
          <div class="col-6 bg-yellow d-flex justify-content-center align-items-center">
            <img class="logo-img" src="/images/logo.png" alt />
          </div>
          <div  class="col-6 text-left p-2">
            <div  class="row w-100">
              <div  class="col-12 mb-3">
                <div  class="  vs-con-input-label vs-input w-100">
                  <label for="" class="vs-input--label">Name</label>
                  <div class="vs-con-input">
                    <input type="text" class="vs-input--input normal" placeholder="John Wist">
                  </div>
                </div>
              </div>
              <div  class="col-12 mb-3">
                <div  class="  vs-con-input-label vs-input w-100">
                  <label for="" class="vs-input--label">Email</label>
                  <div class="vs-con-input">
                    <input type="text" class="vs-input--input normal" placeholder="youremail@email.com">
                  </div>
                </div>
              </div>
              <div  class="col-12 mb-3">
                <div  class="  vs-con-input-label vs-input w-100">
                  <label for="" class="vs-input--label">Phone</label>
                  <div class="vs-con-input">
                    <input type="text" class="vs-input--input normal" placeholder="+84 930.293.232">
                  </div>
                </div>
              </div>
              <div  class="col-12 mb-3">
                <label class="mx-2">Mesage</label>
                <div  class="vs-con-textarea">
                  <textarea placeholder="customer's feedback" class="vs-textarea"></textarea>
                </div>
              </div>
              <div  class="col-12 mb-3 text-right">
                <button type="button" class="btn btn-warning">Send us</button>
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
  name: "ContactComponent"
};
</script>

<style scoped>
.logo-img {
  width: 120px;
}
.bg-yellow {
  background-color: rgb(255, 186, 0);
}
.vs-con-input-label {
    position: relative;
    transition: all .3s ease;
    width: 200px;
}
.vs-input--label {
    padding-left: 5px;
    font-size: .85rem;
    color: rgba(0,0,0,.7);
    display: inline-block;
    margin-bottom: .5rem;
}
.vs-con-input-label .vs-con-input {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    position: relative;
    justify-content: center;
}
.vs-input--input {
    color: inherit;
    position: relative;
    padding: .4rem;
    border-radius: 5px;
    border: 1px solid rgba(0,0,0,.2);
    box-sizing: border-box;
    box-shadow: 0 0 0 0 rgba(0,0,0,.15);
    transition: all .3s ease;
    width: 100%;
}
button, input {
    overflow: visible;
}
.vs-con-textarea {
    width: 100%;
    position: relative;
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 0 0 0 transparent;
    border-radius: 6px;
    transform: translate(0);
}
.vs-textarea {
    resize: none;
    border-radius: 6px;
    border: 0 solid transparent;
    display: block;
    padding: 9px;
    color: rgba(0,0,0,.8);
    width: 100%;
    max-width: 100%;
    min-width: 100%;
    background: transparent;
}
</style>
