<template>
  <div class="panel panel-default">

    <div class="panel-heading lhand">
      posted by: {{ qt.username }}
    </div>
    <div class="panel-body text-green">
      {{ qt.content }}
    </div>
    <div class="panel-footer" v-show="showEdit">
      <div v-if="editing">
        <input type="text" v-model="editValue">
        <a  @click="onUpdate">Save</a>
        <a  @click="onCancel">Cancel</a>
      </div>
      <div v-if="!editing">
        <a @click="onEdit">Edit</a>
        <a @click="onDelete">Delete</a>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    props: ['qt'],
    data() {
      return {
        editing: false,
        editValue: this.qt.content
      }
    },
    computed: {
      showEdit: function() {
        if ( this.qt.username != localStorage.getItem('user')){
          return false;
        }
          return true;
      }
    },
    methods: {
      onEdit() {
        this.editing = true;
        this.editValue = this.qt.content;
      },
      onCancel() {
        this.editing = false;
      },
      onDelete() {
        const token = localStorage.getItem('token'); // Get user token
        this.$emit('quoteDeleted', this.qt.id);
        axios.delete('http://localhost:8000/api/quote/' + this.qt.id + '?token=' + token)
          .then(
            response => console.log(response)
          )
          .catch(
            error => console.log(error)
          );
      },
      onUpdate() {
        const token = localStorage.getItem('token'); // Get user token
        this.editing = false;
        this.qt.content = this.editValue;
        axios.put('http://localhost:8000/api/quote/' + this.qt.id + '?token=' + token,
        {content: this.editValue})
          .then(
            response => console.log(response)
          )
          .catch(
            error => console.log(error)
          );
      }
    }
  }
</script>

<style scoped>
  a {
    cursor:pointer;
  }
</style>
