<template>
    <div>
        <table class="table-auto">
            <thead>
                <tr>
                    <th v-for="field in fields" class="px-4 py-2">{{ field }}</th>
                </tr>
            </thead>
            <tbody>
                <template v-if="posts.length > 0">
                    <tr v-for="model in posts">
                        <td v-for="field in fields" class="border px-4 py-2">{{ model[field] }}</td>
                    </tr>

                    <template v-else>
                        <div> No Data </div>
                    </template>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['posts'],

        data() {
            return {
                fields: ['title', 'content']
            }
        },
    }
</script>
