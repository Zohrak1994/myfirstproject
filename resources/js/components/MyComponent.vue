<template>
    <div>
        <h1>Admin panel</h1>
        <ul>
            <li v-for="link in links">
                <router-link :to="link.href">{{link.title}}</router-link>
            </li>
        </ul>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                links:[
                    {
                        title: "Requests",
                        href: "/admin/requests"
                    },
                    {
                        title: "Add Category",
                        href: "/admin/addcategory"
                    }
                ]
            }
        }
    }
</script>