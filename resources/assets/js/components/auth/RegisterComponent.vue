<template>
    <div class="login__block" id="l-register">
        <div class="login__block__header palette-Blue bg">
            <i class="zmdi zmdi-account-circle"></i>
            Create an account

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-login" href="#">Already have an account?</a>
                        <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-forget-password" href="#">Forgot password?</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="login__block__body">
            <form class="form-horizontal" :action="pUrlRegister" @submit.prevent="fOnSubmitRegister($event, $validator, user)" novalidate>
                <div class="form-group form-group--float form-group--centered">
                    <input type="text" id="name" name="name" autocomplete="off" data-vv-as="Nome" v-model="user.name" v-bind:class="{'form-control': true, 'is-invalid': this.errors.has('name')}" v-validate="'required'">
                    <span v-bind:class="{'invalid-feedback': this.errors.has('name')}">{{ this.errors.first('name') }}</span>
                    <label for="name">Name</label>
                    <i class="form-group__bar"></i>
                </div>

                <div class="form-group form-group--float form-group--centered">
                    <input type="text" id="email" name="email" autocomplete="off" data-vv-as="Email" v-model="user.email" v-bind:class="{'form-control': true, 'is-invalid': this.errors.has('email')}" v-validate="'required|email'">
                    <span v-bind:class="{'invalid-feedback': this.errors.has('email')}">{{ this.errors.first('email') }}</span>
                    <label for="email">Email Address</label>
                    <i class="form-group__bar"></i>
                </div>

                <div class="form-group form-group--float form-group--centered">
                    <input type="password" id="password" name="password" ref="password" data-vv-as="Senha" v-model="user.password" v-bind:class="{'form-control': true, 'is-invalid': this.errors.has('password')}" v-validate="'required'">
                    <span v-bind:class="{'invalid-feedback': this.errors.has('password')}">{{ this.errors.first('password') }}</span>
                    <label for="password">Password</label>
                    <i class="form-group__bar"></i>
                </div>

                <div class="form-group form-group--float form-group--centered">
                    <input type="password" id="password_confirmation" name="password_confirmation" data-vv-as="Comfirme Senha" v-model="user.password_confirmation" v-bind:class="{'form-control': true, 'is-invalid': this.errors.has('password_confirmation')}" v-validate="'required|confirmed:password'">
                    <span v-bind:class="{'invalid-feedback': this.errors.has('password_confirmation')}">{{ this.errors.first('password_confirmation') }}</span>
                    <label for="password_confirmation">Password Confirmation</label>
                    <i class="form-group__bar"></i>
                </div>

                <button type="submit" class="btn btn--icon login__block__btn" :disabled="this.errors.any()"> <i class="zmdi zmdi-check"></i> </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
    	props: ['pUrlRegister'],
        methods: {
	        fOnSubmitRegister: (oEvent, oValidator, oUser) => {
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
