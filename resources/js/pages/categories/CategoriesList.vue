<template>
  <div class="categories-list">
    <h1>Categories List</h1>
    <!-- success message -->
    <div class="success-msg" v-if="success">
      <i class="fa fa-check"></i>
      Deleted successfully
    </div>
    <div class="item" v-for="(category, index) in categories" :key="category.id">
      <span>{{ index + 1 }}</span>
      <p>{{ category.name }}</p>

      <div class="action-buttons">
        <!-- <button class="edit-btn" @click="edit(category.id)">Edit</button> -->
        <router-link :to="{name: 'EditCategories', params:{id: category.id}}" class="edit-btn">Edit</router-link>
        <button class="delete-btn" @click="destroy(category.id)">Delete</button>
      </div>
    </div>
    <div class="index-categories">
      <router-link :to="{ name: 'CreateCategories' }">Create Categories<span>&#8594;</span></router-link>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
    };
  },
  mounted() {
    axios
      .get("/api/categories")
      .then((response) => (this.categories = response.data))
      .catch((error) => console.log(error));
  },
};
</script>

<style scoped>
.categories-list {
  min-height: 100vh;
  background: #fff;
}

.categories-list h1 {
  font-weight: 300;
  padding: 50px 0 30px 0;
  text-align: center;
}

.categories-list .success-msg {
  background: #7ed321;
  color: #fff;
  padding: 10px;
  text-align: center;
}

.categories-list .success-msg i {
  margin-right: 5px;
}

.categories-list .item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 300px;
  margin: 0 auto;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.categories-list .item p {
  margin: 5px 0;
}

.categories-list .action-buttons {
  display: flex;
  gap: 10px;
}

.categories-list .edit-btn {
  background: #3498db;
  color: #fff;
  border: none;
  padding: 5px 10px;
  border-radius: 3px;
  cursor: pointer;
}

.categories-list .edit-btn:hover {
  background: #2980b9;
}

.categories-list .delete-btn {
  background: #f44336;
  color: #fff;
  border: none;
  padding: 5px 10px;
  border-radius: 3px;
  cursor: pointer;
}

.categories-list .delete-btn:hover {
  background: #d32f2f;
}

.categories-list .index-categories {
  text-align: center;
  margin-top: 20px;
}

.categories-list .index-categories span {
  font-size: 22px;
}
</style>

