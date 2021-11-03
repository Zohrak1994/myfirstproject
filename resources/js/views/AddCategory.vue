<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Add new category</h1>
                    <form action="">
                        <label for="addCategory">Enter the category name</label>
                        <input type="text" id="addCategory">
                        <button>Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>