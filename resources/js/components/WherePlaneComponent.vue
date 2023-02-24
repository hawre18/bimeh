<template>
<div>
    <div >
        <label class="form-label">طرح</label>
        <select class="form-control" name="charge">
            <option  disabled>انتخاب کنید</option>
            <option v-for="plane in planes" :value="plane.charge" >{{plane.title+" "}}{{plane.price+"تومان "}}</option>
        </select>
    </div>

</div>
</template>

<script>
export default {
    data(){
        return{

            flag:false,
            planes:null,
        }
    },
    props:['typeplane'],
    mounted(){
        axios.get('/api/plane/'+ this.typeplane).then(res=> {
            console.log(res);
            this.planes=res.data.planes
        }).catch(err=>{
            console.log(err)
        })
    }

}
</script>
