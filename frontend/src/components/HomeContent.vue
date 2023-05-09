<script setup lang="ts">
import { ref, reactive, onMounted} from 'vue';
import FormComponent from '@/components/FormComponent.vue'
import NavComponent from '@/components/NavComponent.vue'
import FooterComponent from '@/components/FooterComponent.vue'
import FirstSectionComponent from '@/components/FirstSectionComponent.vue'
import SecondSectionComponent from '@/components/SecondSectionComponent.vue'
</script>

<template>
<NavComponent />
<main class="h-screen">
  <FirstSectionComponent />
  <SecondSectionComponent />
  <FormComponent />
  <FooterComponent />
</main> 
</template>


<style scoped>
.section-1{
  height: 50vh;
};
.section-2{
  height: 80vh;
};

</style>