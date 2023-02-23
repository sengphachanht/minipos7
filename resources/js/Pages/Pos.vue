<template>
    <div>
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4" >
                    <div class="card-body">
                        <input type="text" class=" form-control" placeholder="ຄົ້ນຫາສິນຄ້າ..." v-model="search" @keyup.enter="getStore()">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-3" v-for="list in StoreData.data" :key="list.index">
                        <div class="card mb-3">
                            <div class="num-img">10</div>
                            <img class="card-img-top img-cover" src="assets/img/elements/18.jpg" alt="Card image cap">
                            <div class="card-body p-1 text-center">
                                <strong>{{ list.name}}</strong>
                                <p class="card-text">
                                    {{ formatPrice(list.price_sell)}}
                                </p>
                                
                            </div>
                        </div>
                    </div>

                     

                </div>
            </div>
        <div class="col-md-4">
            <div class="card">
                <div class="class-body p-3">
                    <div class=" d-flex justify-content-lg-between fs-4 text-primary">
                            <span><strong>ລາມຍອດເງິນ:</strong></span>
                            <span><strong>10,000,000 Kip</strong></span>
                    </div>

                        <button type="button" class="btn rounded-pill btn-info mt-2" style="width:100%">ຊຳລະເງິນ</button>

                        <div class="table-responsive text-nowrap mt-4 border">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                    <th>ລາຍການ</th>
                                    <th>ລາຄາ</th>
                                    <th>ລວມຍອດ</th>
                                    </tr>
                                </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>00</td>
                                <td>11</td>
                                <td>22</td>
                            </tr>
                        </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Minipos7Pos',

    data() {
        return {

            StoreData:[],
            search:''
        };
    },

    mounted() {
        
    },

    methods: {
        formatPrice(value) {
            let val = (value / 1 ).toFixed(0).replace(",",".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+" ກີບ";
        },
        getStore(page){

            this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
                this.$axios.get(`api/store?page=${page}&s=${this.search}`).then((response)=>{
                this.StoreData = response.data
                // console.log(response.data)

                    }).catch((error)=>{
                    console.log(error)
                    // console.log(error.response.status)
                    if(error.response.status==401){
                        this.$storage.setStorageSync("vue-isLoggin",false);
                        location.reload()
                    }
                })
            })           
        }
    },
    watch:{
        'search'(){
            if(this.search  == ''){
                this.getStore()
            }
        }
    },
    created(){
        this.getStore()
    }
};
</script>

<style scoped>
.img-cover{
    height: 110px;
    width: 100%;
    object-fit: cover;
    object-position: center;
}
.num-img{
    position: absolute;
    right: 5px;
    top: 5px;
    background-color: darkorchid;
    color: white;
    border-radius: 0px 10px 0px 10px;
    padding: 4px;
}

</style>