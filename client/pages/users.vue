<template>
  <div>
    <vue-good-table :columns="columns" :rows="users" />
  </div>
</template>

<script>
import 'vue-good-table/dist/vue-good-table.css'
import { VueGoodTable } from 'vue-good-table'

export default {
  components: {
    VueGoodTable,
  },
  async asyncData({ $axios }) {
    const response = await $axios.get('api/v1/users')
    return { users: await response.data.users }
  },
  computed: {
    columns() {
      return [
        {
          label: 'Id',
          field: 'id',
          type: 'number',
        },
        {
          label: 'Name',
          field: 'name',
        },
        {
          label: 'Email',
          field: 'email',
        },
      ]
    },
  },
}
</script>
