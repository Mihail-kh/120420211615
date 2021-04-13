<template>
    <div class="l_col adrs">
        <h2>Add New Address</h2>

        <form action="" method="">
            <div class="field">
                <label>Name *</label>
                <input type="text" value="" palceholder="" class="vl_empty" v-model="fields.name"/>
                <div v-if="errors & errors.name">
                    {{errors.name[0]}}
                </div>
            </div>
            <div class="field">
                <label>Your city *</label>
                <select class="vl_empty" v-model="fields.city">
                    <option class="plh"></option>
                    <option value="1">City 1</option>
                    <option value="2">City 2</option>
                </select>
            </div>
            <div v-if="errors && errors.city">
                {{errors.city[0]}}
            </div>
            <div class="field">
                <label>Your area *</label>
                <select v-model="fields.area">
                    <option class="plh"></option>
                    <option>Area 1</option>
                    <option>Area 2</option>
                </select>
            </div>
            <div v-if="errors && errors.area">
                {{errors.area[0]}}
            </div>
            <div class="field">
                <label>Street</label>
                <input type="text" value="" palceholder="" class="vl_empty" v-model="fields.street"/>
            </div>
            <div class="field">
                <label>House # </label>
                <input type="text" value="" palceholder="House Name / Number" v-model="fields.house"/>
            </div>

            <div class="field">
                <label class="pos_top">Additional information</label>
                <textarea v-model="fields.additional_info"></textarea>
            </div>

            <div class="field">
                <input type="submit" value="add address" class="green_btn" @click.prevent="addAddress()"/>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AddAddress",
        data() {
            return {
                fields: {
                    name: '',
                    city: '',
                    area: '',
                    street: '',
                    house: '',
                    additional_info: '',
                },
                errors: {},
            }
        },
        methods: {
            addAddress() {
                if (this.fields.name === '') {
                    return;
                }

                axios.post('api/address', this.fields)
                .then(response => {
                    for (let field in this.fields) {
                        this.fields[field] = '';
                    }

                    if (response.status === 200) {
                        this.$emit('reloadList');
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                    console.log(this.errors['city']);
                })
            }
        }
    }
</script>

<style scoped>

</style>
