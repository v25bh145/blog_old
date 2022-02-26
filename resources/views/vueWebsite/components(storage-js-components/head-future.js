//5-24 v25bh145
Vue.component("head-future", {
    props:['title'],
    template:
    '<div id="header">\
        <div id="self">\
            <img id="self-icon-padding" width="60px" src="https://s1.ax1x.com/2020/05/06/YAey34.jpg" />\
            <p id="self-name">v25bh145</p>\
        </div>\
        <div id="title">\
            <p id="title-text">{{title}}</p>\
        </div>\
    </div>'
})