<template>
  <div>
    <div class="am-dialog-scrollable">

      <!-- Dialog Header -->
      <div class="am-dialog-header">
        <el-row>
          <el-col :span="20">
            <h2>{{ $root.labels.labels_settings }}</h2>
          </el-col>
          <el-col :span="4" class="align-right">
            <el-button @click="closeDialog" class="am-dialog-close" size="small" icon="el-icon-close"></el-button>
          </el-col>
        </el-row>
      </div>

      <BlockLite/>

      <!-- Form -->
      <el-form :model="settings" ref="settings" label-position="top" @submit.prevent="onSubmit" :class="{'am-lite-container-disabled': $root.isLite}">
        <!-- Employee -->
        <el-form-item :label="$root.labels.label_employee+':'">
          <el-input v-model="settings.employee" placeholder=""></el-input>
        </el-form-item>

        <!-- Employees -->
        <el-form-item :label="$root.labels.label_employees+':'">
          <el-input v-model="settings.employees" placeholder=""></el-input>
        </el-form-item>

        <!-- Service -->
        <el-form-item :label="$root.labels.label_service+':'">
          <el-input v-model="settings.service" placeholder=""></el-input>
        </el-form-item>

        <!-- Services -->
        <el-form-item :label="$root.labels.label_services+':'">
          <el-input v-model="settings.services" placeholder=""></el-input>
        </el-form-item>
      </el-form>
    </div>

    <!-- Dialog Footer -->
    <div class="am-dialog-footer" :class="{'am-lite-container-disabled': $root.isLite}">
      <div class="am-dialog-footer-actions">
        <el-row>
          <el-col :sm="24" class="align-right">
            <el-button type="" @click="closeDialog" class="">{{ $root.labels.cancel }}</el-button>
            <el-button type="primary" @click="onSubmit" class="am-dialog-create">{{ $root.labels.save }}</el-button>
          </el-col>
        </el-row>
      </div>
    </div>
  </div>
</template>

<script>
  import imageMixin from '../../../js/common/mixins/imageMixin'

  export default {

    mixins: [imageMixin],

    props: ['labels'],

    data () {
      return {
        settings: Object.assign({}, this.labels)
      }
    },

    updated () {
      this.inlineSVG()
    },

    mounted () {
      this.inlineSVG()
    },

    methods: {

      closeDialog () {
        this.$emit('closeDialogSettingsLabels')
      },

      onSubmit: !AMELIA_LITE_VERSION ? function () {
        this.$emit('closeDialogSettingsLabels')
        this.$emit('updateSettings', {'labels': this.settings})
      } : function () {
        this.$emit('closeDialogSettingsLabels')
      }
    }
  }
</script>