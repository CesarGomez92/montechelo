<template>
  <div class="pb-10">
      <navigation-component></navigation-component>
      <div class="flex flex-wrap">
        <div class="w-4/5 shadow-md border rounded-lg p-4 mx-auto">
          <h2 class="text-2xl font-bold text-red-900 pb-6">Users List</h2>
          <div v-if="users.length" class="flex flex-wrap">
            <div class="w-1/5 text-lg font-bold text-blue-400 pb-2">
              First name
            </div>
            <div class="w-1/5 text-lg font-bold text-blue-400 pb-2">
              Last name
            </div>
            <div class="w-1/5 text-lg font-bold text-blue-400 pb-2">
              Phone
            </div>
            <div class="w-1/5 text-lg font-bold text-blue-400 pb-2">
              Identification
            </div>
            <div class="w-1/5 text-lg font-bold text-blue-400 pb-2">
              Date of birth
            </div>
            <div v-for="user in users" :key="user.id" class="w-full pt-2 pb-1 border-t-2 flex flex-wrap">
              <div class="w-1/5">
                {{ user.first_name }}
              </div>
              <div class="w-1/5">
                {{ user.last_name }}
              </div>
              <div class="w-1/5">
                {{ user.phone }}
              </div>
              <div class="w-1/5">
                {{ user.identification }}
              </div>
              <div class="w-1/5">
                {{ formatDate(user.date_of_birth) }}
              </div>
            </div>
          </div>
          <div v-else class="text-center">
            <h2 class="text-xl">No users found</h2>
          </div>
        </div>
      </div>
  </div>
</template>
<script>
  import { business, } from '@/services';
  import NavigationComponent from '@/components/NavigationComponent.vue';
  

  export default {
    components: { NavigationComponent, },
    data() {
      return {
        users: [],
      }
    },
    mounted() {
      this.loadUsers()
    },
    methods: {
      async loadUsers() {
          try {
          const response = await business().get(`/users`)
          this.users = response.data
        } catch (error) {
          this.errors = error.response?.data?.errors
        }
      },
      formatDate(date){
        const newDate = new Date(date);
        return `${newDate.getDate()}-${newDate.getMonth() < 10 ?`0${newDate.getMonth()}`: newDate.getMonth() }-${newDate.getFullYear()}`
      }
    },
  }
</script>