<script setup lang="ts">
import { ref, reactive, onMounted} from 'vue';
import Form from '@/components/Form.vue'
import Nav from '@/components/Nav.vue'
import Footer from '@/components/Footer.vue'
import FirstSection from '@/components/FirstSection.vue'
import SecondSection from '@/components/SecondSection.vue'
</script>

<template>
    
<Nav />

<main class="h-screen">
 

  <FirstSection />
  <SecondSection />

 <Form />
  
<Footer />
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