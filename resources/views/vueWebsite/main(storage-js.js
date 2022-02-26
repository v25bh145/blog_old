var app = new Vue({
    el: "#app",
    data:{
        title: "欢迎来到这里~",
        filepath: "./example.html",
        isInner: true,
        indexPage: 0,
        isLong: false,
        shows:[],
        allPage: 0
    },
    methods:{
        /* ajax example:
        cli:function(){
            console.log("qwq");
            $.get("http://127.0.0.1:8000/api/tags/view_all/1", function(data, status){
                alert("data: " + data + "status: " + status);
            })
        },
        */
        sidebarClick:function(type){
            console.log(type);
            if(type === "aboutMe"){
                this.isInner = true;
                this.isLong = false;
                this.title = "关于我";

                this.filepath = "./example.html";//need ajax
            }else if(type === "shorts"){
                this.isInner = false;
                this.isLong = false;
                this.title = "文章";
                this.indexPage = 1;

                //need ajax
                this.shows = [
                    {title:"title1", brief:"brief1", imagePath:"./icons/short-show-icon.png", id: 1},
                    {title:"title2", brief:"brief2", imagePath:"./icons/short-show-icon.png", id: 2},
                    {title:"title3", brief:"brief3", imagePath:"./icons/short-show-icon.png", id: 3},
                    {title:"title4", brief:"brief4", imagePath:"./icons/short-show-icon.png", id: 4}
                ];
                this.allPage = 5;
            }else if(type === "longs"){
                this.isInner = false;
                this.isLong = true;
                this.title = "长文";
                this.indexPage = 1;

                //need ajax
                this.shows = [
                    {title:"title1", brief:"brief1", imagePath:"./icons/long-show-icon.png", id: 1},
                    {title:"title2", brief:"brief2", imagePath:"./icons/long-show-icon.png", id: 2},
                    {title:"title3", brief:"brief3", imagePath:"./icons/long-show-icon.png", id: 3},
                    {title:"title4", brief:"brief4", imagePath:"./icons/long-show-icon.png", id: 4}
                ];
                this.allPage = 5;
            }else if(type === "tags"){
                this.isInner = false;
                this.isLong = false;
                this.title = "标签";
                this.indexPage = 1;

                //need ajax
                this.shows = [
                    {title:"title1", brief:"brief1", imagePath:"./icons/tag-show-icon.png", id: 1},
                    {title:"title2", brief:"brief2", imagePath:"./icons/tag-show-icon.png", id: 2},
                    {title:"title3", brief:"brief3", imagePath:"./icons/tag-show-icon.png", id: 3},
                    {title:"title4", brief:"brief4", imagePath:"./icons/tag-show-icon.png", id: 4}
                ];
                this.allPage = 5;
            }
        },

        nextPage: function(){
            console.log("nextPage");
            if(this.indexPage < this.allPage) 
            {
                this.indexPage++;

                //need ajax
                this.shows = [
                        {title:"title1", brief:"brief1", imagePath:"./icons/tag-show-icon.png", id: 1},
                        {title:"title2", brief:"brief2", imagePath:"./icons/tag-show-icon.png", id: 2},
                        {title:"title3", brief:"brief3", imagePath:"./icons/tag-show-icon.png", id: 3},
                        {title:"title4", brief:"brief4", imagePath:"./icons/tag-show-icon.png", id: 4}
                    ];
            }
        },
        lastPage: function(){
            if(this.indexPage > 1) 
            {
                this.indexPage--;

                //need ajax
                this.shows = [
                        {title:"title1", brief:"brief1", imagePath:"./icons/tag-show-icon.png", id: 1},
                        {title:"title2", brief:"brief2", imagePath:"./icons/tag-show-icon.png", id: 2},
                        {title:"title3", brief:"brief3", imagePath:"./icons/tag-show-icon.png", id: 3},
                        {title:"title4", brief:"brief4", imagePath:"./icons/tag-show-icon.png", id: 4}
                    ];
            }
        },

        enterIn: function(show){
            console.log(show);
            

            //imagePath不要毁了哇
            if(show.imagePath === "./icons/tag-show-icon.png"){
                this.isLong = false;
                this.isInner = false;
                
                this.title = "标签: " + show.title + " 查询";
                this.indexPage = 1;

                //ajax
                this.shows=[];
                this.allPage = 5;
                
            }else if(show.imagePath === "./icons/long-show-icon.png"){
                this.isLong = true;
                this.isInner = true;
                
                //ajax
                this.title = "文章~";
                this.filepath = "./example.html";
            }else if(show.imagePath === "./icons/short-show-icon.png"){
                this.isLong = false;
                this.isInner = true;

                //ajax
                this.title = "文章~";
                this.filepath = "./example.html";
            }
        }

    }
});