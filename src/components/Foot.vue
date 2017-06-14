<template>
    <div id="footer">
        <div class="uk-section-small">
            <div class="uk-container uk-container-expand uk-text-center uk-position-relative">

                <ul class="uk-subnav tm-subnav uk-flex-inline uk-flex-center uk-margin-remove-bottom" uk-margin>
                    <li>
                        <span>Version <span uikit-version></span></span>
                    </li>
                    <li>
                        <a href="https://github.com/uikit/uikit/stargazers"><span class="uk-margin-small-right"
                                                                                  uk-icon="icon: star"></span><span
                                uikit-stargazers>8100</span> Stargazers</a>
                    </li>
                    <li>
                        <a class="uk-text-lowercase" href="https://twitter.com/getuikit"><span
                                class="uk-margin-small-right" uk-icon="icon: twitter"></span>@getuikit</a>
                    </li>
                    <li>
                        <a href="https://gitter.im/uikit/uikit"><span class="uk-margin-small-right"
                                                                      uk-icon="icon: gitter"></span>Community</a>
                    </li>
                </ul>


            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'foot'
    }
</script>