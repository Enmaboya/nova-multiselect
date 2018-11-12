<template>
    <panel-item :field="field">
        <template slot="value">
            <span class="selected" v-for="value in field.value">{{ value.label + ' ' }}</span>
        </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
