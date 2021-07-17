<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.comment.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.comment.fields.body')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.body,
                        'is-focused': activeField == 'body'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.comment.fields.body_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.body"
                        @input="updateBody"
                        @focus="focusField('body')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.user_id !== null,
                      'is-focused': activeField == 'user'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.comment.fields.user')
                    }}</label>
                    <v-select
                      name="user"
                      label="name"
                      :key="'user-field'"
                      :value="entry.user_id"
                      :options="lists.user"
                      :reduce="entry => entry.id"
                      @input="updateUser"
                      @search.focus="focusField('user')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.post_id !== null,
                      'is-focused': activeField == 'post'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.comment.fields.post')
                    }}</label>
                    <v-select
                      name="post"
                      label="privacy"
                      :key="'post-field'"
                      :value="entry.post_id"
                      :options="lists.post"
                      :reduce="entry => entry.id"
                      @input="updatePost"
                      @search.focus="focusField('post')"
                      @search.blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('CommentsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('CommentsSingle', [
      'storeData',
      'resetState',
      'setBody',
      'setUser',
      'setPost',
      'fetchCreateData'
    ]),
    updateBody(e) {
      this.setBody(e.target.value)
    },
    updateUser(value) {
      this.setUser(value)
    },
    updatePost(value) {
      this.setPost(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'comments.index' })
          this.$eventHub.$emit('create-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
