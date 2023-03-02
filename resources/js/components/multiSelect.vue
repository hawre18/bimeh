<template>
    <div>
        <multiselect v-model="value" :options="options"></multiselect>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
export default {
    components: {
        Multiselect
    },
    data () {
        return {
            customers:[],
            value:customers.id,
            options: customers.f_name

        }
    },
    mounted(){
        axios.get('/api/customer').then(res=> {
            this.customers=res.data.customers
        }).catch(err=>{
            console.log(err)
        })
    },
    methods: {
        nameWithLang ({ name, language }) {
            return `${name} — [${language}]`
        }
    }
}
</script>

<style scoped>

</style>


