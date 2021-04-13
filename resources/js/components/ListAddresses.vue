<template>
    <div class="r_col">
        <h2>My Addresses</h2>
        <div >
            <div class="uo_adr_list"
                 v-for="(address, index) in addresses.data"
                 :key="index">
                <list-item :address="address"/>
            </div>
        </div>
<!--            <h4 v-else>Saved addresses are missing</h4>-->
    </div>
</template>

<script>
    import ListItem from "./ListItem";

    export default {
        name: "ListAddresses",
        components: {ListItem},
        props: ['addresses'],

    }
</script>

<style scoped>

</style>
