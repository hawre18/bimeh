<template>
    <div>
        <div>
            <label for="province" class="form-label">مشتری </label>
            <select id="province" class="form-control department-name select2input"  name="customer" v-model="customer" data-live-search="true" @change="getWallet()">
                <option  disabled>انتخاب کنید</option>
                <option v-for="customer in customers" :value="customer.id" >{{customer.f_name +" "}}{{customer.l_name +" "}}{{customer.nationalcode}}</option>
            </select>
        </div>
        <div v-if="customer>0">
            <label for="pay" class="form-label">راه پرداختی</label>
            <br/>
                <input type="radio" name="pay" value="cache">نقدی<br/>
                <input type="radio" name="pay" value="transfer">کارت به کارت<br/>
                <input type="radio" name="pay" value="pos">کارت خوان<br/>

        </div>
        <div v-if="customer>0">
            <label for="codePay" class="form-label">شناسه پرداخت</label>
            <input type="text" name="codePay">

        </div>
        <div v-if="customer>0">
            <label class="form-label">کیف پول</label>
            <select class="form-control" id="wallet" name="wallet" v-model="wallet" @change="getAllPlanes()">
                <option  disabled>انتخاب کنید</option>
                <option v-for="wallet in wallets" :value="wallet.id" >{{wallet.label}}</option>
            </select>
        </div>
        <div v-if="wallet>0">
            <label class="form-label">طرح</label>
            <select class="form-control" id="plane" name="plane">
                <option  disabled>انتخاب کنید</option>
                <option v-for="plane in planes" :value="plane.id" >{{plane.title+" "}}{{plane.price +"تومان "}}</option>
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
            wallets:null,
            wallet:'انتخاب کنید',
            flag:false,
            price:'',
            plane:'انتخاب کنید',
            sumMoney:'0',
            wher:null,
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
        getAllPlanes: function (wallet) {
            axios.get('/api/planes/'+this.wallet).then(res=> {
                this.planes=res.data.planes
            }).catch(err=>{
                console.log(err)
            })
        },

        getWallet: function (customer) {
            axios.get('/api/wallets/'+this.customer).then(res=> {
                this.wallets=res.data.wallets
            }).catch(err=>{
                console.log(err)
            })
        }
    }
}
</script>
