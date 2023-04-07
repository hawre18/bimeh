<template>
    <div>
        <div>
            <label for="main" class="form-label">بخش اصلی</label>
            <select id="main" class="form-control department-name select2input" name="main" v-model="mains" data-live-search="true" >
                <option selected>انتخاب کنید</option>
                <option value="customer" >مشتری</option>
                <option value="users" >بازاریاب</option>
                <option value="orders" >فروش ها</option>
                <option value="doctors" >دکترها</option>
            </select>
        </div>
        <div v-if="mains=='customer'">
            <label for="conditionCustomer" class="form-label">براساس</label>
            <select id="conditionCustomer" class="form-control department-name select2input" name="conditionCustomer" v-model="conditionCustomers" data-live-search="true">
                <option selected>انتخاب کنید</option>
                <option value="" >مشتری هایی که خرید داشته اند</option>
                <option value="users" >مشتری هایی که خرید نداشته اند</option>
                <option value="created_at" >تاریخ ثبت نام</option>
            </select>
        </div>
        <div v-if="conditionCustomers=='created_at'">
            <label class="form-label"> از تاریخ: </label>
            <input name="dateS" type="date" class="flatpickr flatpickr-input form-control" id="checkin-date" placeholder="1400-12-06">
            <label class="form-label"> تا تاریخ: </label>
            <input name="dateE" type="date" class="flatpickr flatpickr-input form-control" id="checkin-date" placeholder="1400-12-06">
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            mains:'مشتری را انتخاب کنید',
            conditionCustomers:'انتخاب کنید',
        }
    }
    }
</script>


