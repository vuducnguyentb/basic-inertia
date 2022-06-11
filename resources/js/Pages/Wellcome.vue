<template lang="">
    <div>
        <h2>Wellcome</h2>
        <Link 
        :href="route('another')"
        >Another</Link>    
        </div>
</template>
<script setup>
    import { Link } from '@inertiajs/inertia-vue3'
</script>
