<template>
    <div>
        <div>
            <label class="form-label">طرح</label>
            <select class="form-control" id="plane" name="charge">
                <option  disabled>انتخاب کنید</option>
                <option v-for="plane in planes" :value="plane.charge" >{{plane.title+" "}}{{plane.price+"تومان "}}</option>
                <label v-if="plane>0"> {{"مقدار شارژ"}}{{plane.charge}}</label>
            </select>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return{
            planes:null,
            flag:false,
        }
    },
    mounted(){
        axios.get('/api/planes').then(res=> {
            this.planes=res.data.planes
        }).catch(err=>{
            console.log(err)
        })
    }

}
</script>
