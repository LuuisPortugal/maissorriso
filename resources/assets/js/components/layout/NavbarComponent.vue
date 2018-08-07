<template>
    <header class="header">
        <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
            <div class="navigation-trigger__inner">
                <i class="navigation-trigger__line"></i>
                <i class="navigation-trigger__line"></i>
                <i class="navigation-trigger__line"></i>
            </div>
        </div>

        <div class="header__logo">
            <h1>
                <a href="#">
                    <img :src="pUrlLogoImage" width="190px">
                </a>
            </h1>
        </div>

        <ul class="top-nav">
            <li class="dropdown hidden-xs-down">
                <a href="#" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" @click.prevent="fUrlLogout(pUrlLogout)">Logout</a>
                </div>
            </li>
        </ul>
    </header>
</template>

<script>
    export default {
    	props: ['pUrlLogoImage', 'pUrlLogout'],
	    methods: {
		    fUrlLogout: async (oUrl) => {
			    await axios
				    .post(oUrl, {})
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
	    }
    }
</script>
