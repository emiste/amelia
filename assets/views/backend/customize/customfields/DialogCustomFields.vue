<template>
  <div>
    <div class="am-dialog-scrollable">

      <!-- Dialog Header -->
      <div class="am-dialog-header">
        <el-row>
          <el-col :span="20">
            <h2>{{ $root.labels.add_custom_field }}</h2>
          </el-col>
          <el-col :span="4" class="align-right">
            <el-button @click="closeDialog" class="am-dialog-close" size="small" icon="el-icon-close"></el-button>
          </el-col>
        </el-row>
      </div>

      <BlockLite/>

      <!-- Custom Fields Selection -->
      <div class="am-custom-field-selection" :class="{'am-lite-container-disabled': $root.isLite}">

        <!-- Text Field, Text Area, Text Content -->
        <el-row :gutter="12">

          <!-- Text Field -->
          <el-col :sm="8">
            <div @click="addCustomField('text')" class="am-custom-field-item">
              <img :src="$root.getUrl + 'public/img/cf-text-field.svg'" class="svg">
              <p>{{ $root.labels.text }}</p>
            </div>
          </el-col>

          <!-- Text Area -->
          <el-col :sm="8">
            <div @click="addCustomField('text-area')" class="am-custom-field-item">
              <img :src="$root.getUrl + 'public/img/cf-text-area.svg'" class="svg">
              <p>{{ $root.labels['text-area'] }}</p>
            </div>
          </el-col>

          <!-- Text Content -->
          <el-col :sm="8">
            <div @click="addCustomField('content')" class="am-custom-field-item">
              <img :src="$root.getUrl + 'public/img/cf-text-content.svg'" class="svg">
              <p>{{ $root.labels.content }}</p>
            </div>
          </el-col>

        </el-row>

        <!-- Selectbox, Checkbox, Radio Buttons -->
        <el-row :gutter="12">

          <!-- Selectbox -->
          <el-col :sm="8">
            <div @click="addCustomField('select')" class="am-custom-field-item">
              <img :src="$root.getUrl + 'public/img/cf-dropdown.svg'" class="svg">
              <p>{{ $root.labels.select }}</p>
            </div>
          </el-col>

          <!-- Checkbox -->
          <el-col :sm="8">
            <div @click="addCustomField('checkbox')" class="am-custom-field-item">
              <img :src="$root.getUrl + 'public/img/cf-checkbox.svg'" class="svg">
              <p>{{ $root.labels.checkbox }}</p>
            </div>
          </el-col>

          <!-- Radio Buttons -->
          <el-col :sm="8">
            <div @click="addCustomField('radio')" class="am-custom-field-item">
              <img :src="$root.getUrl + 'public/img/cf-radio-buttons.svg'" class="svg">
              <p>{{ $root.labels.radio }}</p>
            </div>
          </el-col>

        </el-row>

      </div>

    </div>

  </div>
</template>

<script>
  import imageMixin from '../../../../js/common/mixins/imageMixin'
  import ElRow from 'element-ui/packages/row/src/row'
  import ElCol from 'element-ui/packages/col/src/col'

  export default {
    mixins: [imageMixin],

    data () {
      return {}
    },

    updated () {
      this.inlineSVG()
    },

    methods: {
      closeDialog () {
        this.$emit('closeDialogCustomFields')
      },

      addCustomField: !AMELIA_LITE_VERSION ? function (type) {
        this.$emit('addCustomField', type)
      } : function () {}
    },

    components: {
      ElCol,
      ElRow
    }
  }
</script>