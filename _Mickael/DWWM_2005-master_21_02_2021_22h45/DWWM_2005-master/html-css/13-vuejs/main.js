const MyApp = {
    data() {
        return {
            message: "Mon message",
            name: "Mike",
            age: 18,
            test: true
        }
    },

    mounted() {
        setTimeout(() => {
            this.message = "Salut, tu vas bien ?";
        }, 2000);
    },

    methods: {
        sayHello() {
            this.message = "Hello !"; 
            this.test = true;
        },

        sayGoodBye() {
            this.message = "GoodBye !";
            this.test = false;
        }
    }
}

Vue.createApp(MyApp).mount("#myApp");

if(true) {

}
else if(false)
{

}
else if (false) {

}
else {

}
