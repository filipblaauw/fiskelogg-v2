<template>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(/images/salmon.jpg);">
          <div class="login-box p-4 text-center">
            <img src="/images/fisk-hvit.svg">
          </div>
            <div class="login-box card">
            <div class="card-body">
                <h3 class="box-title m-b-20 text-center">{{trans('auth.logging_in')}}</h3>

                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>{{trans('auth.back_to_login?')}} <router-link to="/login" class="text-info m-l-5"><b>{{trans('auth.sign_in')}}</b></router-link></p>
                    </div>
                </div>
            </div>
            <guest-footer></guest-footer>
          </div>
        </div>
        <intro></intro>
    </section>
</template>

<script>
    import guestFooter from '../../layouts/guest-footer.vue'
    import intro from '../../layouts/intro.vue'

    export default {
        data() {
            return {}
        },
        components: {
            guestFooter,
            intro
        },
        mounted(){

            if(!helper.featureAvailable('social_login')){
                helper.featureNotAvailableMsg();
                return this.$router.push('/home');
            }

            axios.post('/api/auth/social/token')
                .then(response => response.data)
                .then(response => {
                    localStorage.setItem('auth_token',response.token);
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('auth_token');
                    this.$store.dispatch('setAuthStatus');
                    toastr.success(response.message);
                    this.$router.push('/home');
                }).catch(error => {
                    helper.showDataErrorMsg(error);
                    this.$router.push('/');
                });
        }
    }
</script>
