<template>

    <div class="wrapper">
        <div class="sidebar" :class="{active: isSidebarActive}">
            <div class="sidebar-header">
                <router-link :to="{name:'dashboard'}" class="logo">
                    Admin Portal
                </router-link>
                <a href="javascript:void(0)" class="close-icon" @click="remove">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="sidebar-body">
                <router-link :to="{name:'dashboard'}" class="sidebar-link" active-class="active" @click="remove">
                    Dashboard
                </router-link>
                <div class="badge-text">Components</div>
                <router-link :to="{name:'category'}" class="sidebar-link" active-class="active" @click="remove">
                    Categories
                </router-link>
                <router-link :to="{name:'product'}" class="sidebar-link" active-class="active" @click="remove">
                    Products
                </router-link>
            </div>
        </div>
        <div class="section">
            <div class="header">
                <div class="controller" @click="sidebarController">
                    <i class="bi bi-justify-left"></i>
                </div>
                <div class="profile">
                    <div class="marge" @click="profileDropdownController">
                        <div class="avatar">
                            <img :src="'/images/avatar.png'" class="img-fluid" alt="avatar">
                        </div>
                        <div class="admin-info">
                            <div class="name">Mahi Bashar Akash</div>
                            <div class="designation">Redishketch</div>
                        </div>
                    </div>
                    <div class="profile-dropdown-menu" :class="{active: isDropdownActive}">
                        <a href="javascript:void(0)" class="profile-link">
                            Profile
                        </a>
                        <a href="javascript:void(0)" class="profile-link">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
            <div class="content">
                <router-view/>
            </div>
        </div>
    </div>

</template>

<script>

    export default {

        data(){

            return{

                isDropdownActive: false,

                isSidebarActive: false,

            }

        },

        mounted() {

            function setThemeColor(color) {
                document.querySelector(':root').style.setProperty('--main-color', color);
            }

            function handleButtonClick(event) {
                let dataColor = event.target.getAttribute('data-color');
                setThemeColor(dataColor);
                localStorage.setItem('selectedColor', dataColor);
            }
            let themeButtons = document.querySelectorAll('.btn-color');
            themeButtons.forEach(color => {
                color.addEventListener('click', handleButtonClick);
            });
            const storedColor = localStorage.getItem('selectedColor');
            if (storedColor) {
                setThemeColor(storedColor);
            }

        },

        methods: {

            sidebarController(){
                this.isSidebarActive = !this.isSidebarActive;
                this.isDropdownActive = false;
            },

            profileDropdownController(){
                this.isDropdownActive = !this.isDropdownActive;
                this.isSidebarActive = false;
            },

            remove(){
                this.isDropdownActive = false;
                this.isSidebarActive = false;
            },

        }

    }

</script>
