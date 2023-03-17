<template>
    <div class="pb-8">{{ name }}</div>
    <input
        type="text"
        v-model="form.search"
        placeholder="Search..."
        class="placeholder:italic placeholder:text-slate-400 block bg-white border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
    />
    <table-component :tableData="tableData" />
</template>

<script>
import TableComponent from "./components/table.vue";
import ajaxService from "./services/AjaxService.js";

const formData = {
    search: '',
}
export default {
    methods: {
        loadData: async function (search) {
            this.tableData = await ajaxService.getTableData(search);
        }
    },
    components: {
        TableComponent
    },
    data() {
        return {
            name: "Hello World!!!",
            form: formData,
            interval: null
        }
    },
    created() {
        this.loadData();
    },
    watch: {
        form: {
            handler: function(v) {
                clearInterval(this.interval);

                this.interval = setInterval(function () {
                    this.loadData(v.search);
                    clearInterval(this.interval);
                }.bind(this), 1000);
            },
            deep: true,
        }
    },
}
</script>
