<template>
   <div id="toast-bottom-right" class="fixed fade flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-[#F1F4F9] divide-x divide-gray-200 rounded-lg shadow right-5 bottom-5 transition-opacity ease-in duration-700 opacity-100  " role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal"> Email enviado com sucesso!</div>
    </div>
</template>

<script setup lang="ts">
interface Props {
  activate: boolean
}

const props = defineProps<Props>()

</script>



<style scoped>

</style>