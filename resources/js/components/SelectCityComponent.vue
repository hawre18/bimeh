<template>
<div>
    <label for="province" class="form-label">استان </label>
    <select id="province" class="form-control department-name select2input" name="province" v-model="province" @change="getAllCities()">
        <option  disabled>انتخاب کنید</option>
        <option v-for="province in provinces" :value="province.id" >{{province.name}}</option>
    </select>
    <div v-if="cities.length>0">
        <label class="form-label">شهر</label>
        <select class="form-control" id="city" name="city">
            <option> لطفا انتخاب کنید </option>
            <option v-for="city in cities" :value="city.id" >{{city.name}}</option>
        </select>
    </div>
</div>
</template>
<script>
export default {
    data(){
        return{
            province:'استان را انتخاب کنید',
            provinces:[],
            flag:false,
            cities:[]
        }
    },
    mounted(){
        axios.get('/api/province').then(res=> {
            this.provinces=res.data.provinces
        }).catch(err=>{
            console.log(err)
        })
    },
    methods:{
        getAllCities: function () {
            axios.get('/api/cities/'+this.province).then(res=> {
                this.cities=res.data.cities
            }).catch(err=>{
                console.log(err)
            })
        }
    }
}
</script>
