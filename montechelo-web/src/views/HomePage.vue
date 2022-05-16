<template>
  <div>
    <navigation-component></navigation-component>
    <div class="w-full md:w-1/2 mx-auto p-4 flex flex-wrap">
      <div class="w-1/3 px-2">
        <div @click="redirectTo('/create-user')" class="shadow-md hover:shadow-lg border rounded-lg px-4 py-10 text-center cursor-pointer">
          <h3 class="text-gray-700 text-lg font-bold">Create user</h3>
        </div>
      </div>
      <div class="w-1/3 px-2">
        <div @click="redirectTo('/user-list')" class="shadow-md hover:shadow-lg border rounded-lg px-4 py-10 text-center cursor-pointer">
          <h3 class="text-gray-700 text-lg font-bold">Users list</h3>
        </div>
      </div>
      <div class="w-1/3 px-2">
        <div @click="redirectTo('/exceptions')" class="shadow-md hover:shadow-lg border rounded-lg px-4 py-10 text-center cursor-pointer">
          <h3 class="text-gray-700 text-lg font-bold">Exceptions report</h3>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import NavigationComponent from '@/components/NavigationComponent.vue';
  export default {
    components: { NavigationComponent, },
    methods: {
      redirectTo(url) {
        this.$router.push(url)
      }
    }
  }
</script>
