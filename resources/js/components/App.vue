<template>
    <div>
        <add-address v-on:reloadList="getList()"/>
        <list-addresses :addresses="addresses"/>
    </div>
</template>

<script>
    import AddAddress from "./AddAddress";
    import ListAddresses from "./ListAddresses";

    export default {
        name: "App",
        components: {ListAddresses, AddAddress},
        data: function () {
            return {
                addresses: []
            }
        },
        methods: {
            getList() {
                axios.get('api/address').then(response => {
                    this.addresses = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
            }
        },
        created() {
            this.getList();
        }
    }
</script>

<style scoped>

</style>
