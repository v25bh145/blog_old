//5-24 v25bh145
Vue.component("iframe-future", {
    props:['filepath'],
    template:
    '<iframe v-bind:src="filepath" width="1230px" height="630px" scrolling="auto"></iframe>'
})