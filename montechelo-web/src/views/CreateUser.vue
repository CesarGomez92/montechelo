<template>
  <div>
    <navigation-component></navigation-component>
    <div class="w-full md:w-1/2 xl:w-2/5 mx-auto content-center p-4 shadow-lg border rounded-lg">
      <users-form></users-form>
    </div>
  </div>
</template>
<script>
  import UsersForm from '@/components/UsersForm.vue';
  import NavigationComponent from '@/components/NavigationComponent.vue';
  
  export default {
    components: { UsersForm, NavigationComponent, },
    data() {
      return {
        count: 0
      }
    },
    methods: {
      
    }
  }
  
</script>
