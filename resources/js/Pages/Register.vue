<template>
    <div>
        
        <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner d-flex justify-content-center">

        <div class=  "col-md-4">

        <div class="card">
        <div class="card-body">
          
          <!-- /Logo -->
          <h4 class="mb-2">ລົງທະບຽນ ສະມາຊິກໃໝ່</h4>

          <div class="alert alert-danger" role="alert" v-if="show_error">
          <i class='bx bx-error-alt fs-4'></i> {{ text_error }}
        </div>

            <!-- {{ name }}
          <hr> -->

            <div class="mb-3">
              <label class="form-label">ຊື່ຜູ້ໃຊ້</label>
              <input type="text" class="form-control"  placeholder="ປ້ອນຊື່ຂອງທ່ານ..." v-model="name">
            </div>

            
            <div class="mb-3">
              <label class="form-label">ອີເມວລ໌</label>
              <input type="text" class="form-control"  placeholder="ປ້ອນອີເມວລ໌ຂອງທ່ານ..." v-model="email">
            </div>

            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">ລະຫັດຜ່ານ</label>

              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" v-model="password" placeholder="············" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

         
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">ຢືນຢັນລະຫັດຜ່ານ</label>

              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" v-model="password2" placeholder="············" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" @click="register()" >ລົງທະບຽນ</button>
            </div>
         

          <p class="text-center">
            <span>ມີບັນຊີແລ້ວ </span>
            <router-link to="/login">

              <span>ເຂົ້າສູ່ລະບົບ</span>
            </router-link>

          </p>
        </div>
      </div>

        </div>
     
      
     
    </div>
  </div>

    </div>
</template>

<script>


export default {
    name: 'Minipos7Register',

    data() {
        return {
            name:'',
            email:'',
            password:'',
            password2:'',
            show_error:false,
            text_error:'',
        };
    },

    mounted() {
        
    },

    methods: {
        register(){
            // console.log(this.name)
            if(this.name == '' || this.email == '' || this.password == '' || this.password2 == ''){
                    this.show_error = true;
                    this.text_error = 'ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ່ວນ!'
                console.log('NO')
            } else {
                
                /// ກວດສອບລະຫັດຜ່ານກົງກັນບໍ
                if(this.password == this.password2){

                    this.show_error = false;
                    this.text_error = ''
                    console.log('OK')

                    this.$axios.post("api/register",{
                        name: this.name,
                        email: this.email,
                        password: this.password
                    }).then((response)=>{

                        if(response.data.success){
                            this.show_error = false;
                            this.text_error = ''

                            this.$router.push('login');

                        } else {

                                                 
                            this.show_error = true;
                            this.text_error = response.data.message;

                        }

                        console.log(response.data)

                    }).catch((error)=>{
                        console.log(error)
                    });

                } else {
                     
                this.show_error = true;
                this.text_error = 'ລະຫັດຜ່ານບໍ່ກົງກັນ!'

                }

        
            }
        }
    },
};
</script>

<style lang="scss" scoped>

</style>