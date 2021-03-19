<template>
    <div>
        <table class="table-auto">
            <thead>
                <tr>
                    <th v-for="field in fields" class="px-4 py-2">{{ fieldDisplayForHeader(field) }}</th>
                </tr>
            </thead>
            <tbody>
                <template v-if="posts.length > 0">
                    <tr v-for="model in posts">
                        <td v-for="field in fields" class="border px-4 py-2">{{ fieldDisplayForTable(model, field) }}</td>
                    </tr>
                </template>

                <template v-else>
                    <div> No Data </div>
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

        methods: {
            fieldDisplayForHeader(field) {
                return field.includes('.') ? field.split('.')[0] : field;
            },
            fieldDisplayForTable(model, field) {
                return field.includes('.') ? model[field.split('.')[0]][field.split('.')[1]] : model[field]
            }
        }
    }
</script>
