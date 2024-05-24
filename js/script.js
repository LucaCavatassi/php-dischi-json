const { createApp } = Vue

createApp({
    data() {
        return {
            resultsArray: [],
        }
    },
    created() {
            axios.get("http://localhost:8888/boolean/php-dischi-json/server.php").then((resp) => {
                    this.resultsArray = resp.data.results;
                    // console.log(resp.data.results);
            });

    },
    methods: {
        addToFav(index) {
            const data = {
                action: "liked",
                album_index: index
            };
            axios.post("http://localhost:8888/boolean/php-dischi-json/server.php", data, {
                headers: {
                    "Content-type" : "multipart/form-data",
                },
            }).then((resp) => {
                this.resultsArray = resp.data.results
                console.log(resp.data.results);
            })
        },
    },
}).mount('#app')