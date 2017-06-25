<template>

    <div>
        <div ref="container">
            <div class="uk-width-1-1">
                <div class="uk-container">
                    <div class="uk-overflow-auto">
                        <h1 class="uk-table uk-table-divider">
                            {{ $t("base.setting") }}
                        </h1>

                        <div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
    import axios from 'axios'
    import rest from '../http/rest'
    export default {
        name: 'Setting',
        components: {
        },
        data () {
            return {
                data: []
            }
        },
        mounted: function () {

        },
    }
</script>