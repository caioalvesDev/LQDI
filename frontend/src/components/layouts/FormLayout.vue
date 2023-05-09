<template>
    <div class="mb-6">
        <label 
        for="email" 
        class="
        block
        mb-2
        text-sm
        font-medium
        text-gray-900
        ml-3
        "
        >
        {{ props.label }}
        </label>

        <input
        v-if="!props.textArea"
        class="
        shadow-sm
        mb-2 
        bg-[#F1F4F9] 
        rounded-2xl  
        text-gray-900 
        text-sm  
        focus:ring-blue-500 
        focus:border-blue-500 
        block 
        w-full 
        p-2.5
        " 
        id="email" 
        :type="props.type" 
        :placeholder="props.placeholder"
        :value="props.modelValue"
        @input="dispach"
        >
        <textarea
        v-if="props.textArea" 
        id="message"
        :value="props.modelValue" 
        @input="dispach"
        rows="4" 
        class="
        block 
        p-2.5 
        w-full 
        text-sm 
        rounded-lg 
        border 
        border-gray-300 
        focus:ring-blue-500 
        focus:border-blue-500 
        bg-[#F1F4F9]  
        placeholder-gray-400 
        " 
        :placeholder="props.placeholder"
        />
        
        <transition name="fade">
            <span class="
            text-red-600 
            font-semibold 
            ml-2
            "
            v-if="statusError">{{ errorMessage }}</span>
        </transition>
    </div>
</template>

<script setup lang="ts">
// import {Props} from '@/model/interfaces'
interface IProps {
    label?: string
    placeholder?: string 
    type?: string
    modelValue?: string
    statusError?: string|boolean|object
    errorMessage?: string|boolean
    textArea?: boolean
}
const props = defineProps<IProps>()
const emit = defineEmits(['update:modelValue'])
const dispach = (event: Event) => {
    emit('update:modelValue', (event.target as HTMLInputElement).value)
}
</script>

<style scoped>
.fade-enter-from {
  opacity: 0;
  transform: translateX(400px)
}
.fade-enter-active{
  transition: all 0.50s linear;
}
.fade-leave-to {
  transition: all .50s linear;
  transform: translateX(400px);
  opacity: 0;
}

</style>