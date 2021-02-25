<template>
    <div>
        <button
            class="bg-blue-500 text-white rounded px-3 py-1 ml-3 text-sm"
            @click="followuser"
            v-text="buttonText"
        >
            Follow
        </button>
    </div>
</template>

<script>
export default {
    props: ["userId", "follows"],
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        followuser() {
            axios
                .post("/follow/" + this.userId)
                .then((resoponse) => {
                    this.status = !this.status;
                    console.log(resoponse.data);
                })
                .catch((errors) => {
                    if (errors.response.status == 401) {
                        window.location = "/login";
                    }
                });
        },
    },
    data: function () {
        return {
            status: this.follows,
        };
    },
    computed: {
        buttonText() {
            return this.status ? "Unfollow" : "Follow";
        },
    },
};
</script>
