//5-24 v25bh145
var componentInfo = {
    props:['info'],
    template:
    '<div class="cont-show" v-on:click="$emit(`enter_in`, `qwq`)">\
        <img class="cont-show-icon" v-bind:src="info.imagePath"></img>\
        <div class="cont-show-cont">{{info.title}}</div>\
        <div class="cont-show-brief">{{info.brief}}</div>\
    </div>'
};
Vue.component('content-future',{
    props:['shows', 'page'],
    components:{'content-show': componentInfo},
    template:
    '<div id="cont" >\
        <img id="last" src="./icons/left.png" v-on:click="$emit(`last_page`)"></img>\
        <div class="cont-hr"></div>\
        <div id="cont-bg" >\
            <div id="cont-cont" >\
                <content-show  v-for="show in shows" v-bind:info="show" v-bind:key="show.id" v-on:enter_in="$emit(`enter_in`, show)"></content-show>\
            </div>\
            <div id="cont-inner-hr">\
                <div id="cont-inner-page">{{page}}</div>\
            </div>\
        </div>\
        <div class="cont-hr"></div>\
        <img id="next" src="./icons/right.png" v-on:click="$emit(`next_page`)"></img>\
    </div>'
});