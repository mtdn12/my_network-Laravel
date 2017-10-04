var app = new Vue({
    el:"#info",
data: {
    appear:true
},
methods: {
    sethidden(){
        this.appear =false
    }
},
created(){
    setTimeout(()=>{
        this.sethidden();
    }
    , 3000);
}
})
