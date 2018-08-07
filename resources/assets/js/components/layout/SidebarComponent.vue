<template>
    <aside class="sidebar">
        <div class="scrollbar-inner">
            <div class="user">
                <a class="user__info" :href="pUrlProfile">
                    <img class="user__img" :src="pUser.photo" alt="">
                    <div>
                        <div class="user__name">{{ pUser.name }}</div>
                        <div class="user__email">{{ pUser.email }}</div>
                    </div>
                </a>
            </div>

            <ul v-if="pMenus.length" class="navigation">
                <li v-for="oMenu in pMenus" :class="{'navigation__sub' : oMenu.children.length, 'navigation__sub--active navigation__sub--toggled' : oMenu.children.length && oMenu.active, 'navigation__active' : !oMenu.children.length && oMenu.active}">
                    <a :href="oMenu.children.length ? '#' : oMenu.link">
                        <i v-show="oMenu.icon" :class="oMenu.icon"></i> {{ oMenu.title }}
                    </a>

                    <ul v-if="oMenu.children.length" class="navigation__sub">
                        <li v-for="oChild in oMenu.children" :class="{'navigation__active' : oChild.active}">
                            <a :href="oChild.link">{{ oChild.title }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script>
    export default {
    	props: ['pUser', 'pUrlProfile', 'pMenus']
    }
</script>
