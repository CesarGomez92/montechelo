<template>
  <div class="pb-10">
      <navigation-component></navigation-component>
      <div class="flex flex-wrap">
        <div class="w-4/5 shadow-md border rounded-lg p-4 mx-auto">
          <h2 class="text-2xl font-bold text-red-900 pb-4">Exceptions report</h2>
          <div class="flex flex-wrap pb-4">
            <div class="w-1/2">
              <p>You can filter exceptions by dates</p>
            </div>
            <div class="w-1/2 flex flex-wrap">
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="last-name">
                from
                </label>
                <input v-model="from" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="last-name" type="date">
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="last-name">
                to
                </label>
                <input v-model="to" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="last-name" type="date">
              </div>
            </div>
          </div>
          <div v-if="exceptions.length" class="flex flex-wrap">
            <div class="w-1/5 text-lg font-bold text-blue-400 pb-2">
              Date
            </div>
            <div class="w-2/5 text-lg font-bold text-blue-400 pb-2">
              Description
            </div>
            <div class="w-2/5 text-lg font-bold text-blue-400 pb-2">
              Data
            </div>
            <div v-for="exception in exceptions" :key="exception.id" class="w-full pt-2 pb-1 border-t-2 flex flex-wrap">
              <div class="w-1/5">
                {{ formatDate(exception.created_at) }}
              </div>
              <div class="w-2/5">
                {{ exception.description }}
              </div>
              <div class="w-2/5">
                {{ exception.data }}
              </div>
            </div>
          </div>
          <div v-else class="text-center">
            <h2 class="text-xl">Exceptions no found</h2>
          </div>
        </div>
      </div>
  </div>
</template>
<script>
  import { exceptions, } from '@/services';
  import NavigationComponent from '@/components/NavigationComponent.vue';
  

  export default {
    components: { NavigationComponent, },
    data() {
      return {
        from: '',
        to: '',
        exceptions: [],
      }
    },
    created() {
      this.loadExceptions()
    },
    methods: {
      async loadExceptions() {
        try {
          const response = await exceptions().get(`/exceptions`)
          this.exceptions = response.data
        } catch (error) {
          this.errors = error.response?.data?.errors
        }
      },
      formatDate(date){
        const newDate = new Date(date);
        const formattedDate = `${newDate.getDate()}-${newDate.getMonth() < 10 ?`0${newDate.getMonth()}`: newDate.getMonth() }-${newDate.getFullYear()}`
        const formattedTime = `${newDate.getHours()}:${newDate.getMinutes()}:${newDate.getSeconds()}`
        return `${formattedDate} ${formattedTime}`
      }
    },
  }
</script>