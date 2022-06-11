<template lang="">
    <div>
        <h2>Another</h2>
                <Link :href="route('home')">
                Wellcome</Link> 
                <h3>{{$page.props.appName}}</h3>
    </div>
</template>
<script setup>
        import { Link } from '@inertiajs/inertia-vue3'
</script>
