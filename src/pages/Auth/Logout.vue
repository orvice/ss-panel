<template>

    <div>
        <div ref="container">

        </div>
    </div>

</template>

<script>
    import axios from 'axios'
    import * as types from '../../store/types'
    export default {
        name: 'Logout',
        components: {},
        mounted: function(){
            // @todo
            sessionStorage.removeItem('token');
            window.location.href = '/';
        },
    }
</script>