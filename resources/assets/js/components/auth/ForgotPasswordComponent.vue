<template>
    <div class="login__block" id="l-forget-password">
        <div class="login__block__header palette-Purple bg">
            <i class="zmdi zmdi-account-circle"></i>
            Forgot Password?

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-login" href="#">Already have an account?</a>
                        <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-register" href="#">Create an account</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="login__block__body">
            <form class="form-horizontal" :action="pUrlForgotPassword" @submit.prevent="fOnSubmitForgotPassword($event, $validator, user)" novalidate>
                <p class="mt-4">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

                <div class="form-group form-group--float form-group--centered">
                    <input type="text" id="email" name="email" autocomplete="off" data-vv-as="Email" v-model="user.email" v-bind:class="{'form-control': true, 'is-invalid': this.errors.has('email')}" v-validate="'required|email'">
                    <span v-bind:class="{'invalid-feedback': this.errors.has('email')}">{{ this.errors.first('email') }}</span>
                    <label for="email">Email Address</label>
                    <i class="form-group__bar"></i>
                </div>

                <button type="submit" class="btn btn--icon login__block__btn" :disabled="this.errors.any()"> <i class="zmdi zmdi-check"></i> </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
    	props: ['pUrlForgotPassword'],
        methods: {
	        fOnSubmitForgotPassword: (oEvent, oValidator, oUser) => {
		        oValidator.validateAll()
                    .then(async () => {
	                    if(!oValidator.errors.any()){
		                    await axios
		                    .post(oEvent.target.action, oUser)
		                    .then(response => { location.href = response.request.responseURL })
		                    .catch(errors => {
			                    swal({
				                    title: errors.response.data.message,
				                    text: _.values(errors.response.data.errors)[0],
				                    type: 'warning',
				                    buttonsStyling: false,
				                    confirmButtonClass: 'btn btn-primary'
			                    })
		                    });
                        }
                    });
            }
        },
        data(){
    		return {
    			user: {}
    		};
        }
    }
</script>
