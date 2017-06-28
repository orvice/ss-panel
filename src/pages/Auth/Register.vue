<template>
    <div class="container">
        <div class="content-center">
            <div class="card card-signup" data-background-color="orange">
                    <div class="header header-primary text-center">
                        <h4 class="title title-up">Sign Up</h4>
                        <div class="social-line" v-if="false">
                            <a href="#pablo" class="btn btn-neutral btn-facebook btn-icon btn-icon-mini">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#pablo" class="btn btn-neutral btn-twitter btn-icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#pablo" class="btn btn-neutral btn-google btn-icon  btn-icon-mini">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                            <input type="text" class="form-control" placeholder="First Name...">
                        </div>
                        <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_email-85"></i>
                                        </span>
                            <input type="text" class="form-control" placeholder="Email...">
                        </div>
                        <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                        </span>
                            <input type="password" placeholder="Password..." class="form-control" />
                        </div>
                        <!-- If you want to add a checkbox to this form, uncomment this code -->
                        <!-- <div class="checkbox">
                          <input id="checkboxSignup" type="checkbox">
                              <label for="checkboxSignup">
                              Unchecked
                              </label>
                            </div> -->
                    </div>
                    <div class="footer text-center">
                        <a href="#pablo" class="btn btn-neutral btn-round btn-lg">Get Started</a>
                    </div>
            </div>
        </div>
    </div>

</template>

<script>
    import http from '../../http/base'
    import * as types from '../../store/types'
    import * as code from '../../code/auth'
    export default {
        name: 'Login',
        components: {},
        data () {
            return {
                isError: false,
                errorMsg: '',
                email: '',
                password: '',
                message: '',
            }
        },
        methods: {
            login() {
                console.log("start login");
                http.post("token", {
                    email: this.email,
                    password: this.password,
                })
                    .then(response => {
                        console.log("success");
                        // Save token in cookie
                        let token = response.data.data.token;
                        let id = response.data.data.user_id;
                        let user = {
                            token: token,
                            id: id,
                        };
                        this.$store.commit(types.Login, user);
                        this.$cookie.set('Token', token, 1);
                        this.$router.push({name: "dashboard"});
                    })
                    .catch(e => {
                        console.log("error");
                        this.isError = true;
                        if (e.response) {
                            console.log(e.response.status);
                        }
                        switch (e.response.data.error_code) {
                            case code.PasswordWrong:
                                this.errorMsg = this.$t('auth.login-fail');
                                break;
                            default:
                                this.errorMsg = this.$t('base.system-error');
                                break;
                        }
                    })
            }
        }
    }
</script>

<style>
    .tim-row{
        margin-bottom: 20px;
    }

    .tim-white-buttons {
        background-color: #777777;
    }
    .typography-line{
        padding-left: 25%;
        margin-bottom: 35px;
        position: relative;
        display: block;
        width: 100%;
    }
    .typography-line span{
        bottom: 10px;
        color: #c0c1c2;
        display: block;
        font-weight: 400;
        font-size: 13px;
        line-height: 13px;
        left: 0;
        margin-left: 20px;
        position: absolute;
        width: 260px;
        text-transform: none;
    }
    .tim-row{
        padding-top: 60px;
    }
    .tim-row h3{
        margin-top: 0;
    }
    .switch{
        margin-right: 20px;
    }
    #navbar-full .navbar{
        border-radius: 0 !important;
        margin-bottom: 15px;
        z-index: 2;
    }

    #menu-dropdown .navbar{
        border-radius: 3px;
    }

    #pagination-row .pagination-container{
        height: 100%;
        max-height: 100%;
        display: flex;
        align-items: center;
    }

    #icons-row i.now-ui-icons{
        font-size: 30px;
    }

    .space{
        height: 130px;
        display: block;
    }
    .space-110{
        height: 110px;
        display: block;
    }
    .space-50{
        height: 50px;
        display: block;
    }
    .space-70{
        height: 70px;
        display: block;
    }
    .navigation-example .img-src{
        background-attachment: scroll;
    }

    .navigation-example{
        background-position: center center;
        background-size: cover;
        margin-top:0;
        min-height: 740px;
    }
    #notifications{
        background-color: #FFFFFF;
        display: block;
        width: 100%;
        position: relative;
    }
    .tim-note{
        text-transform: capitalize;
    }

    #buttons .btn,
    #javascriptComponents .btn{
        margin: 0 0px 10px;
    }
    .space-100{
        height: 100px;
        display: block;
        width: 100%;
    }

    .be-social{
        padding-bottom: 20px;
        /*     border-bottom: 1px solid #aaa; */
        margin: 0 auto 40px;
    }
    .txt-white{
        color: #FFFFFF;
    }
    .txt-gray{
        color: #ddd !important;
    }


    .parallax{
        width:100%;
        height:570px;

        display: block;
        background-attachment: fixed;
        background-repeat:no-repeat;
        background-size:cover;
        background-position: center center;

    }

    .logo-container .logo{
        overflow: hidden;
        border-radius: 50%;
        border: 1px solid #333333;
        width: 50px;
        float: left;
    }

    .logo-container .brand{
        font-size: 16px;
        color: #FFFFFF;
        line-height: 18px;
        float: left;
        margin-left: 10px;
        margin-top: 7px;
        width: 70px;
        height: 40px;
        text-align: left;
    }
    .logo-container .brand-material{
        font-size: 18px;
        margin-top: 15px;
        height: 25px;
        width: auto;
    }
    .logo-container .logo img{
        width: 100%;
    }
    .navbar-small .logo-container .brand{
        color: #333333;
    }

    .fixed-section{
        top: 90px;
        max-height: 80vh;
        overflow: scroll;
        position: sticky;
    }

    .fixed-section ul{
        padding: 0;
    }

    .fixed-section ul li{
        list-style: none;
    }
    .fixed-section li a{
        font-size: 14px;
        padding: 2px;
        display: block;
        color: #666666;
    }
    .fixed-section li a.active{
        color: #00bbff;
    }
    .fixed-section.float{
        position: fixed;
        top: 100px;
        width: 200px;
        margin-top: 0;
    }


    .parallax .parallax-image{
        width: 100%;
        overflow: hidden;
        position: absolute;
    }
    .parallax .parallax-image img{
        width: 100%;
    }

    @media (max-width: 768px){
        .parallax .parallax-image{
            width: 100%;
            height: 640px;
            overflow: hidden;
        }
        .parallax .parallax-image img{
            height: 100%;
            width: auto;
        }
    }

    /*.separator{
        content: "Separator";
        color: #FFFFFF;
        display: block;
        width: 100%;
        padding: 20px;
    }
    .separator-line{
        background-color: #EEE;
        height: 1px;
        width: 100%;
        display: block;
    }
    .separator.separator-gray{
        background-color: #EEEEEE;
    }*/
    .social-buttons-demo .btn{
        margin-right: 5px;
        margin-bottom: 7px;
    }

    .img-container{
        width: 100%;
        overflow: hidden;
    }
    .img-container img{
        width: 100%;
    }

    .lightbox img{
        width: 100%;
    }
    .lightbox .modal-content{
        overflow: hidden;
    }
    .lightbox .modal-body{
        padding: 0;
    }
    @media screen and (min-width: 991px){
        .lightbox .modal-dialog{
            width: 960px;
        }
    }
    @media (max-width: 991px){
        .fixed-section.affix{
            position: relative;
            margin-bottom: 100px;
        }
    }
    @media (max-width: 768px){
        .btn, .btn-morphing{
            margin-bottom: 10px;
        }
        .parallax .motto{
            top: 170px;
            margin-top: 0;
            font-size: 60px;
            width: 270px;
        }
    }

    /*       Loading dots  */

    /*      transitions */
    .presentation .front, .presentation .front:after, .presentation .front .btn, .logo-container .logo, .logo-container .brand{
        -webkit-transition: all .2s;
        -moz-transition: all .2s;
        -o-transition: all .2s;
        transition: all .2s;
    }


    #images h4{
        margin-bottom: 30px;
    }
    #javascriptComponents{
        padding-bottom: 0;
    }
    /*      layer animation          */

    .layers-container{
        display: block;
        margin-top: 50px;
        position: relative;
    }
    .layers-container img {
        position: absolute;
        width: 100%;
        height: auto;
        top: 0;
        left: 0;
        text-align: center;
    }

    .animate {
        transition: 1.5s ease-in-out;
        -moz-transition: 1.5s ease-in-out;
        -webkit-transition: 1.5s ease-in-out;
    }

    .navbar-default.navbar-small .logo-container .brand{
        color: #333333;
    }
    .navbar-transparent.navbar-small .logo-container .brand{
        color: #FFFFFF;
    }
    .navbar-default.navbar-small .logo-container .brand{
        color: #333333;
    }

    .sharing-area{
        margin-top: 80px;
    }
    .sharing-area .btn{
        margin: 15px 4px 0;
    }

    .section-thin,
    .section-notifications{
        padding: 0;
    }
    .section-navbars{
        padding-top: 0;
    }
    #navbar .navbar{
        margin-bottom: 20px;
    }

    #navbar .navbar-toggler,
    #menu-dropdown .navbar-toggler{
        pointer-events: none;
    }
    .section-tabs{
        background: #EEEEEE;
    }
    .section-pagination{
        padding-bottom: 0;
    }
    .section-download{
        padding-top: 130px;
    }
    .section-download .description{
        margin-bottom: 60px;
    }
    .section-download h4{
        margin-bottom: 25px;
    }
    .section-examples a{
        text-decoration: none;
    }
    .section-examples a + a{
        margin-top: 30px;
    }
    .section-examples h5{
        margin-top: 30px;
    }
    .components-page .wrapper > .header,
    .tutorial-page .wrapper > .header{
        height: 500px;
        padding-top: 128px;
        background-size: cover;
        background-position: center center;
    }
    .components-page .title,
    .tutorial-page .title{
        color: #FFFFFF;
    }

    .brand .h1-seo{
        font-size: 2.8em;
        text-transform: uppercase;
        font-weight: 300;
    }
    .brand .n-logo{
        max-width: 100px;
        margin-bottom: 40px;
    }
    .invision-logo{
        max-width: 70px;
        top: -2px;
        position: relative;
    }
    .creative-tim-logo{
        max-width: 140px;
        top: -2px;
        position: relative;
    }
    .section-javascript .title{
        margin-bottom: 0;
    }

    .navbar .switch-background{
        display: block;
    }
    .navbar-transparent .switch-background{
        display: none;
    }

    .section-signup .col .btn{
        margin-top: 30px;
    }

    #buttons-row .btn{
        margin-bottom: 10px;
    }

    .section-navbars .navbar-collapse{
        display: none;
    }

    .section-basic{
        padding-top: 0;
    }
    .section-images{
        padding-bottom: 0;
    }

</style>