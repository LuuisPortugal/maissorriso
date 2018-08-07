<template>
    <!-- Older IE warning message -->
    <!--[if IE]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

        <div class="ie-warning__downloads">
            <a v-show="pUrlChromeImage" href="http://www.google.com/chrome">
                <img :src="pUrlChromeImage" alt="">
            </a>

            <a v-show="pUrlFirefoxImage" href="https://www.mozilla.org/en-US/firefox/new">
                <img :src="pUrlFirefoxImage" alt="">
            </a>

            <a v-show="pUrlOperaImage" href="http://www.opera.com">
                <img :src="pUrlOperaImage" alt="">
            </a>

            <a v-show="pUrlSafariImage" href="https://support.apple.com/downloads/safari">
                <img :src="pUrlSafariImage" alt="">
            </a>

            <a v-show="pUrlEdgeImage" href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                <img :src="pUrlEdgeImage" alt="">
            </a>

            <a v-show="pUrlIeImage" href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                <img :src="pUrlIeImage" alt="">
            </a>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
</template>

<script>
    export default {
    	props: [
    		'pUrlChromeImage',
            'pUrlFirefoxImage',
            'pUrlOperaImage',
            'pUrlSafariImage',
            'pUrlEdgeImage',
            'pUrlIeImage'
        ]
    }
</script>
