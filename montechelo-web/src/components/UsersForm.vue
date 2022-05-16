<template>
  <form class="w-full max-w-lg">
    <div v-if="errors.length" class="rounded-md bg-red-300 p-2 text-white">
      {{ errors[0] }}
    </div>
    <div v-else-if="status == 'success'" class="rounded-md bg-green-300 p-2 text-white">
      user created successfully
    </div>
    <h2 class="text-2xl font-bold text-red-900 pb-4">Create user</h2>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-name">
          First Name
        </label>
        <input v-model="data.first_name" class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="first-name" type="text" placeholder="Jane" autocomplete="off">
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="last-name">
          Last Name
        </label>
        <input v-model="data.last_name" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="last-name" type="text" placeholder="Doe" autocomplete="off">
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
          phone
        </label>
        <input v-model="data.phone" class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="phone" type="text" placeholder="Phone number" autocomplete="off">
      </div>
      <div class="w-full md:w-1/3 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="identification">
          identification
        </label>
        <input v-model="data.identification" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="identification" type="text" placeholder="123456" autocomplete="off">
      </div>
      <div class="w-full md:w-1/3 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="date_of_birth">
          Date of birth
        </label>
        <input v-model="data.date_of_birth" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="last-name" type="date" autocomplete="off">
      </div>
    </div>
    <button @click.prevent="validateData" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      Save
    </button>
  </form>
</template>

<script>
import { exceptions, business } from '@/services';
export default {
  data() {
    return {
      data: {
        first_name: '',
        last_name: '',
        phone: '',
        identification: '',
        date_of_birth: '',
      },
      status: '',
      errors: [],
    }
  },
  methods: {
    async validateData() {
      const dataToValidate = [];
      for(const [key, value] of Object.entries(this.data)){
        dataToValidate.push(exceptions().get(`/validations/key/${key}?value=${value}`))
      }
      try {
        await Promise.all(dataToValidate)
        this.saveUser()
      } catch (error) {
        console.log(error)
        this.errors = error.response.data
      }
    },
    async saveUser() {
      try {
        await business().post('/users', {
                    first_name: this.data.first_name,
                    last_name: this.data.last_name,
                    identification: this.data.identification,
                    phone: this.data.phone,
                    date_of_birth: this.data.date_of_birth,
                })
        this.status = 'success'
      } catch (error) {
        console.error(error)
      }
    },
  },
}
</script>