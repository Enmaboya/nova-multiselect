<template>
    <default-field :field="field">
        <template slot="field">
                <multiselect 
                    v-model="value" 
                    :options="field.options" 
                    :multiple="true" 
                    :close-on-select="false" 
                    :clear-on-select="false" 
                    :hide-selected="true"
                    :showNoResults="false"
                    :preserve-search="true" 
                    placeholder="+"
                    label="label"
                    track-by="label" 
                    :preselect-first="true" 
                    selectLabel="Нажмите Enter чтобы выбрать" 
                    deselectLabel="Нажмите Enter чтобы убрать"
                >
                    <template slot="tag" slot-scope="props">
                        <span class="custom__tag">
                            <span>{{ props.option.label }}</span>
                            <span class="custom__remove" @click="props.remove(props.option)"><close class="close">x</close></span>
                        </span>
                    </template>
                </multiselect>
            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
            <label>{{field.option}}</label>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova';
import Multiselect from 'vue-multiselect'

export default {
    data () {
        return {
            value: [],
        }
    },

    mixins: [HandlesValidationErrors, FormField],
    components: {
        Multiselect
    },
    methods: {
        /**
         * Provide a function that fills a passed FormData object with the
         * field's internal value attribute. Here we are forcing there to be a
         * value sent to the server instead of the default behavior of
         * `this.value || ''` to avoid loose-comparison issues if the keys
         * are truthy or falsey
         */
        fill(formData) {
            let value = _.map(this.value, 'value')
            formData.append(this.field.attribute, value)
        },  
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

