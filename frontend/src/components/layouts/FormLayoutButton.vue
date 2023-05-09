<template>
     <div class="mb-6">
        <button class="
        rounded-full
        bg-black
        text-white 
        py-2 px-8 
        font-medium
        "
        >
          {{ msg }}
        </button>
    </div>
</template>

<script setup lang="ts">
defineProps<{ msg: string}>()
</script>