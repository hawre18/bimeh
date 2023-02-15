<template>
    <div>
        <div>
            <label for="province" class="form-label">مشتری </label>
            <select id="province" class="form-control department-name select2input" name="customer" v-model="customer" data-live-search="true" @change="getAllPlanes()">
                <option  disabled>انتخاب کنید</option>
                <option v-for="customer in customers" :value="customer.id" >{{customer.f_name +" "}}{{customer.l_name +" "}}{{customer.nationalcode}}</option>
            </select>
        </div>
        <div v-if="customer>0">
            <label class="form-label">طرح</label>
            <select class="form-control" id="plane" name="plane">
                <option  disabled>انتخاب کنید</option>
                <option v-for="plane in planes" :value="plane.id" >{{plane.title+" "}}{{plane.price+"تومان "}}</option>
            </select>
        </div>

    </div>
</template>
<script>
export default {
    data(){
        return{
            customer:'مشتری را انتخاب کنید',
            customers:[],
            planes:null,
            flag:false,
            price:'',
            sumMoney:'0',
        }
    },
    mounted(){
        axios.get('/api/customer').then(res=> {
            this.customers=res.data.customers
        }).catch(err=>{
            console.log(err)
        })
    },
    methods:{
        getAllPlanes: function () {
            axios.get('/api/planes').then(res=> {
                this.planes=res.data.planes
            }).catch(err=>{
                console.log(err)
            })
        }
    }
}
</script>
