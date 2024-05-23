const { createApp } = Vue

createApp({
    data() {
        return {
            resultsArray: []
        }
    },
    created() {
            axios.get("http://localhost:8888/boolean/php-dischi-json/server.php").then((resp) => {
                    this.resultsArray = resp.data.results;
            });

        }
    }).mount('#app')