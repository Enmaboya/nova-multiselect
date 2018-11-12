<template>
        <!-- <template slot="value">
            <span v-for="value in field.value">{{ value.title.ru + ' ' }}</span>
        </template> -->
        <ul>
            <li v-for="value in field.value">
                <span >"{{value.title.ru}"}</span>
            </li>
         </ul>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
