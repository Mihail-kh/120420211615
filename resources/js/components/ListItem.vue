<template>
    <div class="item">
        <h3>{{address.name}}</h3>
        <p>{{address.city}}, {{address.area}}, {{address.street}}, {{address.house}}<br/>{{address.additional_info}}</p>
        <div class="actbox">
            <a href="#" class="bcross"></a>
        </div>
        <div id="map"></div>
    </div>
</template>

<script>
    export default {
        name: "ListItem",
        props: ['address']
    }
</script>

<style scoped>

</style>
