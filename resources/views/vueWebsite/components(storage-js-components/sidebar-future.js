//5-24 v25bh145
Vue.component("sidebar-future", {
    template:
    '<div id="side-bar">\
        <div class="mes-box" v-on:click="$emit(`div_click`, `aboutMe`)">\
            <div class="side-mes" id="me">\
                <div class="left-border"></div>\
                <div class="left-cont"></div>\
                <div class="mid-border1"></div>\
                <div class="mid-border2"></div>\
                <div class="mid-cont1"></div>\
                <div class="mid-cont2"></div>\
                <div class="right-border" style="width: 90px;"></div>\
                <div class="right-cont" style="width: 88px;"></div>\
                <img class="mes-icon" src="https://s1.ax1x.com/2020/05/06/YkrLwt.png"/>\
                <img class="mes-text" style="width: 250px;" src="https://s1.ax1x.com/2020/05/06/YkgaPP.png">\
            </div>\
        </div>\
        <div class="mes-box" v-on:click="$emit(`div_click`, `shorts`)">\
            <div class="side-mes" id="short">\
                <div class="left-border"></div>\
                <div class="left-cont"></div>\
                <div class="mid-border1"></div>\
                <div class="mid-border2"></div>\
                <div class="mid-cont1"></div>\
                <div class="mid-cont2"></div>\
                <div class="right-border" style="width: 90px;"></div>\
                <div class="right-cont" style="width: 88px;"></div>\
                <img class="mes-icon" src="https://s1.ax1x.com/2020/05/06/YkcZff.png"/>\
                <img class="mes-text" style="width: 250px;" src="https://s1.ax1x.com/2020/05/06/Ykgw28.png">\
            </div>\
        </div>\
        <div class="mes-box" v-on:click="$emit(`div_click`, `longs`)">\
            <div class="side-mes" id="long">\
                <div class="left-border"></div>\
                <div class="left-cont"></div>\
                <div class="mid-border1"></div>\
                <div class="mid-border2"></div>\
                <div class="mid-cont1"></div>\
                <div class="mid-cont2"></div>\
                <div class="right-border" style="width: 90px;"></div>\
                <div class="right-cont" style="width: 88px;"></div>\
                <img class="mes-icon" src="https://s1.ax1x.com/2020/05/06/YkcEkt.png"/>\
                <img class="mes-text" style="width: 250px;" src="https://s1.ax1x.com/2020/05/06/YkgDKg.png">\
                <p style="color: red">待开发</p>\
            </div>\
        </div>\
        <div class="mes-box" v-on:click="$emit(`div_click`, `tags`)">\
            <div class="side-mes" id="tags">\
                <div class="left-border"></div>\
                <div class="left-cont"></div>\
                <div class="mid-border1"></div>\
                <div class="mid-border2"></div>\
                <div class="mid-cont1"></div>\
                <div class="mid-cont2"></div>\
                <div class="right-border" style="width: 90px;"></div>\
                <div class="right-cont" style="width: 88px;"></div>\
                <img class="mes-icon" src="https://s1.ax1x.com/2020/05/06/YkcGt0.png"/>\
                <img class="mes-text" style="width: 250px;" src="https://s1.ax1x.com/2020/05/06/YkgOG6.png">\
            </div>\
        </div>\
        <hr id="side-hr">\
    </div>'
});