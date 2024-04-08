<script setup>

</script>

<template>
    <suspense>
        <router-view v-slot="{ Component, route }">
            <div :key="route.name">
                <Component :is="Component"/>
            </div>
        </router-view>
    </suspense>

</template>
