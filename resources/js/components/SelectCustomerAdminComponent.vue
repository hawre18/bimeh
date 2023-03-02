<template>
    <div>
    <div>
        <label for="customer" class="form-label">مشتری </label>
        <multiselect  id="customer" class="form-control department-name select2input" name="customer" v-model="customer" data-live-search="true"  @change="getAllServices(),getWallet()">
            <option  disabled>انتخاب کنید</option>
            <option v-for="customer in customers" :value="customer.id" >{{customer.f_name +" "}}{{customer.l_name +" "}}{{customer.nationalcode}}</option>
        </multiselect >
    </div>
        <div v-if="customer>0">

            <label class="form-label" >موجودی کیف پول:</label>
            <br/>
            <label class="alert alert-info" v-for="wallet in wallets">{{wallet.modeCharge+" تومان"}}</label>
        </div>
    <div v-if="customer>0">
        <label class="form-label">خدمات</label>
        <select class="form-control" id="service" name="service[]" multiple>
            <option v-for="service in services" :value="service.id" >{{service.title+" "}}{{service.price+"تومان"}}</option>
        </select>
    </div>
    </div>
</template>
<script>
import Multiselect from 'vue-multiselect'



export default {

    data () {
        return {
            value: [],
            customer:'مشتری را انتخاب کنید',
            customers:[],
            services:[],
            wallets:[],
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
        getAllServices: function () {
            axios.get('/api/service').then(res=> {
                this.services=res.data.services
            }).catch(err=>{
                console.log(err)
            })
        },
        getWallet: function () {
            axios.get('/apiDoctor/wallet/'+this.customer).then(res=> {
                this.wallets=res.data.wallets
            }).catch(err=>{
                console.log(err)
            })
        }
    }
}
</script>
