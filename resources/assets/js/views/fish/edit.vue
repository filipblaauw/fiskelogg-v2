<template>
  <div>
    <div class="row page-titles">
      <div class="col-md-6 col-12 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{trans('fish.edit_fish')}}</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><router-link to="/home">{{trans('general.home')}}</router-link></li>
          <li class="breadcrumb-item"><router-link to="/fish">{{trans('fish.fish')}}</router-link></li>
          <li class="breadcrumb-item active">{{trans('fish.edit_fish')}}</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{trans('fish.edit_fish')}}</h4>
            <todo-form :uuid="uuid"></todo-form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import todoForm from './form';

  export default {
    components : { todoForm },
    data() {
      return {
        uuid:this.$route.params.uuid
      }
    },
    mounted(){
      if(!helper.hasPermission('access-fish')){
        helper.notAccessibleMsg();
        this.$router.push('/home');
      }

      if(!helper.featureAvailable('fish')){
        helper.featureNotAvailableMsg();
        this.$router.push('/home');
      }
    }
  }
</script>
