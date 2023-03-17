<template>
    <table class="border-collapse table-auto w-full text-sm">
        <thead>
        <tr>
            <template v-for="(value, index) in tableData[0]">
                <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left" v-if="omit_columns.includes(index) === false">{{ index }}</th>
            </template>
        </tr>
        </thead>
        <tbody class="bg-white dark:bg-slate-800">
        <tr v-for="(row) in tableData">
            <template v-for="(value, index) in row">
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400" v-if="omit_columns.includes(index) === false">{{ value }}</td>
            </template>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        tableData: {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            omit_columns: ['_id', 'height', 'wikiUrl']
        }
    },
}
</script>
