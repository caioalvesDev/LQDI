
<script setup lang="ts">
import Toast from '@/components/Toast.vue'
import { ref, reactive, onMounted} from 'vue';
import axios from 'axios'
interface IContact {
  name: string;
  email: string;
  message?: string;
  subject?: string;
  image?: string;
}
interface IErrroRespose {
  name: string;
  email: string;
  message?: string;
  subject?: string;
  image?: string;
}


let stateErrors = ref<IErrroRespose>({
  name: '',
  email: '',
  message: '',
  subject: ''
})
const stateRefDataForm = ref<IContact>({
  name: '',
  email: '',
  message: '',
  subject: '',
  image: ''
})
const close = ref(true)
const stateCreated = ref<boolean>(false)
const save = async() => {
  stateErrors.value = <IErrroRespose>{}
    try {
      const { data } = await axios.post('http://localhost:8000/api/contact/create', stateRefDataForm.value);
      stateCreated.value = !!data;
      setTimeout(() => stateCreated.value = false, 4000)

  }catch(errors: any) {
    console.log(errors.response.data['errors']);
    stateErrors.value = errors.response.data['errors'];
  }
}

const onChange = (e: any) => {
  // console.log(e.target.files[0]);
  
  stateRefDataForm.value.image = e.target.files[0]
  console.log(stateRefDataForm.value.image);
}




</script>

<template>
   <section class="px-4 grid lg:grid-cols-2 gap-20 lg:gap-6 ">
    <div class="lg:ml-44">
      <h2 class="max-w-lg text-3xl font-semibold leading-normal text-gray-900 ">Viva uma nova experiência de comunicação integrada com foco nos resultados.</h2>
      <p class="mt-4 font-semibold">Escreva-nos sobre o seu projeto</p>
    </div>
    <div>
      <form class="lg:max-w-lg" @submit.prevent="save">
       
          <toast  :class="[{'opacity-0': !stateCreated}, 'transition-opacity ease-in duration-700 opacity-1',]"/>

        
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ml-3">Seu nome (requerido)</label>
          <input v-model="stateRefDataForm.name" type="text" id="email" class="shadow-sm mb-2 bg-[#F1F4F9] rounded-2xl  text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="Nome" >
          <span class="text-red-600 font-semibold ml-2" v-if="stateErrors?.name">{{ stateErrors?.name[0] }}</span>
        </div>
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ml-3">Seu E-mail (requerido)</label>
          <input v-model="stateRefDataForm.email" type="email" id="email" class="shadow-sm mb-2 bg-[#F1F4F9] rounded-2xl  text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="email@exemplo.com" >
          <span class="text-red-600 font-semibold ml-2" v-if="stateErrors?.email">{{ stateErrors?.email[0] }}</span>
        </div>
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ml-3">Assunto</label>
          <input v-model="stateRefDataForm.subject" type="text" id="email" class="shadow-sm mb-2 bg-[#F1F4F9] rounded-2xl  text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="Assunto" >
        </div>
        <div class="mb-6">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Mensagem</label>
          <textarea v-model="stateRefDataForm.message" id="message" rows="4" class="block p-2.5 w-full text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-[#F1F4F9]  placeholder-gray-400 " placeholder="Deixe seu comentario"></textarea>
        </div>
        <div class="mb-6">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white " for="file_input">Upload file</label>
          <p class="text-black font-medium">Anexe um documento explicando seu projeto</p>
          <input class="block w-full text-lg border-dashed text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none " id="file_input" type="file" @change="onChange">
        </div>

        <div class="mb-6">
        <button class="rounded-full bg-black text-white py-2 px-8 font-medium">
          Enviar
        </button>
        </div>
    </form>
    </div>
  </section>
</template>

<style>


</style>