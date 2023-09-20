<template>
  <div :class="`text-${field.textAlign}`">
    <Dropdown>
      <DropdownTrigger
        class="inline-flex items-center text-gray-500 cursor-pointer"
        :showArrow="false"
      >
        <span class="font-bold link-default">{{ __('View') }}</span>
      </DropdownTrigger>

      <template #menu>
        <DropdownMenu width="auto">
          <ul v-if="value.length > 0" class="px-4 py-3 space-y-2 max-w-xxs">
            <li
              v-for="option in value"
              class="flex items-center space-x-2 text-sm font-bold leading-tight rounded-full"
              style="border: 1px solid #f1f5f9;border-radius: 5px;padding: 5px 8px;"
            >
              <span :class="classes[option.checked]">
                    <IconBoolean class="flex-none" :value="option.checked" />
                </span>
              <span class="ml-1" v-html="option.label"></span>
            </li>
          </ul>
          <span v-else>{{ this.field.noValueText }}</span>
        </DropdownMenu>
      </template>
    </Dropdown>
  </div>
</template>

<script>
import filter from 'lodash/filter'
import map from 'lodash/map'

export default {
  props: ['resourceName', 'field'],

  data: () => ({
    value: [],
    classes: {
      true: 'text-green-500',
      false: 'text-red-500',
    },
  }),

  created() {
    this.field.value = this.field.value || {}

    this.value = filter(
      map(this.field.options, o => {
        return {
          name: o.name,
          label: o.label,
          checked: this.field.value[o.name] || false,
        }
      }),
      o => {
        if (this.field.hideFalseValues === true && o.checked === false) {
          return false
        } else if (this.field.hideTrueValues === true && o.checked === true) {
          return false
        }

        return true
      }
    )
  },
}
</script>
