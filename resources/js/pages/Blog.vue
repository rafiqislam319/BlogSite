<template>
    <h2 class="header-title">All Blog Posts</h2>
    <div class="searchbar">
        <form action="">
            <input type="text" placeholder="Search..." name="search" />

            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <div class="categories">
        <ul>
            <li><a href="">Health</a></li>
            <li><a href="">Entertainment</a></li>
            <li><a href="">Sports</a></li>
            <li><a href="">Nature</a></li>
        </ul>
    </div>
    <section class="cards-blog latest-blog">
        <div class="card-blog-content" v-for="post in posts" :key="post.id">
            <img :src="post.imagePath" alt="" />
            <p>
                {{ post.created_at }}
                <span style="float: right">Written By {{ post.user }}</span>
            </p>
            <h4 style="font-weight: bolder">
                <router-link
                    :to="{
                        name: 'SingleBlog',
                        params: {
                            slug: post.slug,
                        },
                    }"
                    >{{ post.title }}</router-link
                >
            </h4>
        </div>
    </section>
    <!-- pagination -->
    <div class="pagination" id="pagination">
        <a href="">&laquo;</a>
        <a class="active" href="">1</a>
        <a href="">2</a>
        <a href="">3</a>
        <a href="">4</a>
        <a href="">5</a>
        <a href="">&raquo;</a>
    </div>
</template>

<script>
export default {
    emits: ["updateSidebar"],
    data() {
        return {
            posts: [],
        };
    },
    mounted() {
        axios
            .get("/api/posts/all")
            .then((response) => (this.posts = response.data.data))
            .catch((error) => console.log(error));
    },
};
</script>
<style scoped>
.card-blog-content img {
    width: 500px;
    height: 300px;
}
</style>
