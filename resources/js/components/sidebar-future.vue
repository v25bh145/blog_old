<template>
    <div id="side-bar">
        <div class="mes-box">
            <div class="side-mes" id="me">    
                <div class="left-border"></div>
                <div class="left-cont"></div>
                <div class="mid-border1"></div>
                <div class="mid-border2"></div>
                <div class="mid-cont1"></div>
                <div class="mid-cont2"></div>
                <div class="right-border" style="width: 90px;"></div>
                <div class="right-cont" style="width: 88px;"></div>
                <img class="mes-icon" src="https://s1.ax1x.com/2020/05/06/YkrLwt.png"/>
                <img class="mes-text" style="width: 250px;" src="https://s1.ax1x.com/2020/05/06/YkgaPP.png">
            </div>
        </div>
        <div class="mes-box">
            <div class="side-mes" id="short">
                <div class="left-border"></div>
                <div class="left-cont"></div>
                <div class="mid-border1"></div>
                <div class="mid-border2"></div>
                <div class="mid-cont1"></div>
                <div class="mid-cont2"></div>
                <div class="right-border" style="width: 70px;"></div>
                <div class="right-cont" style="width: 68px;"></div>
                <img class="mes-icon" src="https://s1.ax1x.com/2020/05/06/YkcZff.png"/>
                <img class="mes-text" style="width: 230px;" src="https://s1.ax1x.com/2020/05/06/Ykgw28.png">
            </div>
        </div>
        <div class="mes-box">
            <div class="side-mes" id="long">
                <div class="left-border"></div>
                <div class="left-cont"></div>
                <div class="mid-border1"></div>
                <div class="mid-border2"></div>
                <div class="mid-cont1"></div>
                <div class="mid-cont2"></div>
                <div class="right-border" style="width: 50px;"></div>
                <div class="right-cont" style="width: 48px;"></div>
                <img class="mes-icon" src="https://s1.ax1x.com/2020/05/06/YkcEkt.png"/>
                <img class="mes-text" style="width: 210px;" src="https://s1.ax1x.com/2020/05/06/YkgDKg.png">
            </div>
        </div>
        <div class="mes-box">
            <div class="side-mes" id="tags">
                <div class="left-border"></div>
                <div class="left-cont"></div>
                <div class="mid-border1"></div>
                <div class="mid-border2"></div>
                <div class="mid-cont1"></div>
                <div class="mid-cont2"></div>
                <div class="right-border" style="width: 30px;"></div>
                <div class="right-cont" style="width: 28px;"></div>
                <img class="mes-icon" src="https://s1.ax1x.com/2020/05/06/YkcGt0.png"/>
                <img class="mes-text" style="width: 190px;" src="https://s1.ax1x.com/2020/05/06/YkgOG6.png">
            </div>
        </div>

        <hr id="side-hr">
        <fun></fun>
    </div>
</template>

<script>
import fun from "../components/sidebar-fun-future"
export default{
    components:{
        fun
    }
}
</script>
<style>
    #side-bar{
        position: absolute;
        top: 80px;
        height: 650px;
        width: 355px;
        /*background: url("https://s1.ax1x.com/2020/05/05/YkkSY9.jpg") no-repeat;*/
        /*background: url("https://s1.ax1x.com/2020/05/06/YkBg1J.jpg") no-repeat;*/
        border-radius: 0px 0px 100px 0px;
        border: 10px solid #222;
        border-left: 0px;
    }
    .side-mes{
        position: relative;
    
        left: 0px;
        height: 90px;
        width: 320px;
        transition: 0.3s;
    }
    .side-mes .left-border{
        position: absolute;
        top: 0px;
        left: 0px;
        height: 80px;
        width: 150px;
        background: rgba(91, 119, 131, 0.3);
    }
    .side-mes .left-cont{
        position: absolute;
        top: 2px;
        left: 0px;
        height: 76px;
        width: 150px;
        background: rgba(46, 106, 132, 0.3);
    }
    .side-mes .mid-border1{
        position: absolute;
        top: 0px;
        left: 150px;
        height: 0px;
        width: 0px;
        border-width: 40px 50px 40px 50px;
        border-top-color: transparent;
        border-left-color: rgba(91, 119, 131, 0.3);
        border-right-color: rgba(91, 119, 131, 0.3);
        border-bottom-color: rgba(91, 119, 131, 0.3);
        border-style: solid;
    }
    .side-mes .mid-border2{
        position: absolute;
        top: 10px;
        left: 162.25px;
        height: 0px;
        width: 0px;
        border-width: 30px 37.75px 40px 37.75px;
        border-top-color: rgba(91, 119, 131, 0.3);
        border-left-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-style: solid;
    }
    .side-mes .mid-cont1{
        position: absolute;
        top: 2px;
        left: 150px;
        height: 0px;
        width: 0px;
        border-width: 40px 50px 36px 50px;
        border-top-color: transparent;
        border-left-color: rgba(46, 106, 132, 0.3);
        border-right-color: rgba(46, 106, 132, 0.3);
        border-bottom-color: rgba(46, 106, 132, 0.3);
        border-style: solid;
    }
    .side-mes .mid-cont2{
        position: absolute;
        top: 12px;
        left: 162.25px;
        height: 0px;
        width: 0px;
        border-width: 30px 37.75px 26px 37.75px;
        border-top-color:rgba(46, 106, 132, 0.3);
        border-left-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-style: solid;
    }
    .side-mes .right-border{
        position: absolute;
        top: 0px;
        left: 250px;
        height: 80px;
        width: 50px;
        border-radius: 0px 5px 5px 0px;
        background: rgba(91, 119, 131, 0.3);
    }
    .side-mes .right-cont{
        position: absolute;
        top: 2px;
        left: 250px;
        height: 76px;
        width: 48px;
        background: rgba(46, 106, 132, 0.3);
    }
    #side-hr{
        border-color: black;
    }
</style>