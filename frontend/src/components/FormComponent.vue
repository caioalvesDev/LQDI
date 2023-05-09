
<script setup lang="ts">
import ToastComponent from '@/components/ToastComponent.vue'
import FormLayoutButton from '@/components/layouts/FormLayoutButton.vue'
import FormLayout from '@/components/layouts/FormLayout.vue'
import { ref, reactive, onMounted} from 'vue';
import axios from 'axios'
import FormLayoutUpload from './layouts/FormLayoutUpload.vue';
const url: string = 'http://localhost:8000/api/contact/create';

interface IContact {
  name: string;
  email: string;
  message?: string;
  subject?: string;
  image?: any;
}
interface IErrroRespose extends IContact {}

const stateRefErrors = ref<IErrroRespose>({} = <IErrroRespose>{})
const stateRefDataForm = ref<IContact>({} = <IContact>{})
const stateRefCreated = ref<boolean>(false)

const save = async() => {
  stateRefErrors.value = <IErrroRespose>{}
  try {
    const { data } = await axios.post(url, stateRefDataForm.value);
    stateRefCreated.value = !!data;
    setTimeout(() => stateRefCreated.value = false, 1000*5)
  }catch(errors: any) {
    console.log(errors.response.data['errors']['email'][0]);
    stateRefErrors.value = await errors.response.data['errors'];
  }
}

const onChange = (event: Event) => {
  console.log((event.target as HTMLInputElement).value);
  // stateRefDataForm.value.image = (event.target as HTMLInputElement).files[0]
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
       
        <transition name="fade">
          <ToastComponent v-if="stateRefCreated"/>
        </transition>

        <FormLayout
        v-model="stateRefDataForm.name"
        type="text" 
        placeholder="Nome" 
        label="Seu nome (requerido)" 
        :statusError="stateRefErrors?.name"
        :errorMessage="stateRefErrors?.name?.[0]"
        />

        <FormLayout
        v-model="stateRefDataForm.email"
        type="email" 
        placeholder="email@exemplo.com" 
        label="Seu E-mail (requerido)" 
        :statusError="stateRefErrors?.email"
        :errorMessage="stateRefErrors?.email?.[0]"
        />

        <FormLayout
        v-model="stateRefDataForm.subject"
        type="text" 
        placeholder="Assunto" 
        label="Assunto" 
        />


        <FormLayout
        v-model="stateRefDataForm.message"
        type="text" 
        placeholder="Deixe seu comentario" 
        label="Mensagem"
        :textArea="true" 
        />

        <FormLayoutUpload
         label="Upload file"
         msg="Anexe um documento explicando seu projeto"
         @change="onChange"
        />

        <FormLayoutButton 
          msg="Enviar"
        />
    </form>
    </div>
  </section>
</template>

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