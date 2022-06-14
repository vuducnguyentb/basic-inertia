<template lang="">
    <Link
    v-if="href"
        :href="href"
        class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap"
        :class="classes"
    >
        <slot />
    </Link>
    <button
    v-else
    class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap"
    :class="classes"
  >
    <slot />
  </button>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps, computed } from "vue";
const props = defineProps({
    href: String,
    mode: {
        type: String,
        default: "add",
    },
});
const classes = computed(() => {
    if (props.mode == "add") {
        return "bg-blue-600 hover:bg-blue-800";
      }
      if (props.mode == "edit") {
        return "bg-yellow-600 hover:bg-yellow-800";
      }
      if (props.mode == "delete") {
        return "bg-red-600 hover:bg-red-800";
      }
      if (props.mode == "view") {
        return "bg-green-600 hover:bg-green-800";
      }
      return "";
});
</script>
