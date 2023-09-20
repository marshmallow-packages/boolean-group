<template>
  <DefaultField
    :field="currentField"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <div class="space-y-2">
        <div v-for="option in value" style="border: 1px solid #f1f5f9;border-radius: 5px;padding: 5px 8px;">
            <CheckboxWithLabel
            :key="option.name"
            :name="option.name"
            :checked="option.checked"
            @input="toggle($event, option)"
            :disabled="currentlyIsReadonly"
            >
            <span v-html="option.label"></span>
            </CheckboxWithLabel>
        </div>
      </div>
    </template>
  </DefaultField>
</template>

<script>
import find from 'lodash/find'
import isNil from 'lodash/isNil'
import fromPairs from 'lodash/fromPairs'
import map from 'lodash/map'
import merge from 'lodash/merge'
import { DependentFormField, HandlesValidationErrors } from 'laravel-nova'

export default {
  mixins: [HandlesValidationErrors, DependentFormField],

  data: () => ({
    value: {},
  }),

  methods: {
    /*
     * Set the initial value for the field
     */
    setInitialValue() {
      let values = merge(this.finalPayload, this.currentField.value || {})

      this.value = map(this.currentField.options, o => {
        return {
          name: o.name,
          label: o.label,
          checked: values[o.name] || false,
        }
      })
    },

    /**
     * Provide a function that fills a passed FormData object with the
     * field's internal value attribute.
     */
    fill(formData) {
      this.fillIfVisible(
        formData,
        this.fieldAttribute,
        JSON.stringify(this.finalPayload)
      )
    },

    /**
     * Toggle the option's value.
     */
    toggle(event, option) {
      const firstOption = find(this.value, o => o.name == option.name)
      firstOption.checked = event.target.checked

      if (this.field) {
        this.emitFieldValueChange(
          this.fieldAttribute,
          JSON.stringify(this.finalPayload)
        )
      }
    },

    onSyncedField() {
      this.setInitialValue()
    },
  },

  computed: {
    /**
     * Return the final filtered json object
     */
    finalPayload() {
      return fromPairs(map(this.value, o => [o.name, o.checked]))
    },
  },
}
</script>
