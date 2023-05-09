<template>
     <div class="mb-6">
        <label for="file_input" 
        class="
        block 
        mb-2 
        text-sm 
        font-medium 
        text-gray-900 
        dark:text-white
        " 
        >{{ props.label }}</label>
        <p class="
        text-black
        font-medium
        "
        >{{ props.msg }}</p>

        <input id="file_input"
        class="
        block 
        w-full 
        text-lg 
        border-dashed 
        text-gray-900 
        border 
        border-gray-300 
        rounded-lg 
        cursor-pointer 
        bg-gray-50 
        dark:text-gray-400 
        focus:outline-none
        " 
        type="file" 
        :value="changeValue"
        >
    </div>
</template>


<script setup lang="ts">
interface IProps {
    label?: string,
    msg?: string 
    changeValue?: string
}
const props = defineProps<IProps>()
</script>