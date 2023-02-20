<template>
    <div>
        <div>
            <label for="province" class="form-label">مشتری </label>
            <select id="province" class="form-control department-name select2input" name="customer" v-model="customer" data-live-search="true" @change="getAllServices(),getWallet()">
                <option  disabled>انتخاب کنید</option>
                <option v-for="customer in customers" :value="customer.id" >{{customer.f_name +" "}}{{customer.l_name +" "}}{{customer.nationalcode}}</option>
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
            flag:false,
        }
    },
    mounted(){
        axios.get('/api/customer').then(res=> {
            this.customers=res.data.customers
        }).catch(err=>{
            console.log(err)
        })
    },
}
</script>
