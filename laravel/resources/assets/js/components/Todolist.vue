<template>
  <div class="TodoList">
      <div class="container">

  	     <section class="panel">

              <input type="checkbox" id="mark-all" @click="selectAll" :checked="areAllSelected">
              <input v-model="newTask" @keyup.enter="addTask" placeholder="What do you need to do?" autofocus class="text-input">
              <button @click="clearList">Clear List</button>

  	         </section>

  	          <section class="list">

                <ul class="list-item">
                  <li v-for="task in tasks" :class="{done: isChecked(task)}">

            		<input type="checkbox" class="checkbox" @click="check" v-model="task.checked">
            		<input type="text" v-if="task === editingTask" v-auto-focus class="text-input" @keyup.enter="endEditing(task)" @blur="endEditing(task)" v-model="task.text">
            		<label for="checkbox" v-if="task !== editingTask" @dblclick="editTask(task)">{{ task.text }}</label>
            		<button class="delete" @click="removeTask(task)">X</button>
                        </li>
  	           </ul>

  	          </section>

      </div>

      <div class="credit">
          <p>Use the input field at the bottom to add an item <span style="color: brown"> (press Enter) </span></p>
  	<p>Double click on the text to edit it (press Enter to save)</p>
  	<p>Hover on the item and click "X" to delete it</p>
      </div>
    </div>
</template>

<script>

    export default {
      data() {
        return {
            newTask: "",
            tasks: [
              {
                  text: "This is an example task. Delete or add your own",
                  checked: false
              }
            ],
            editingTask: {
            }
          }
        },

      computed: {
            areAllSelected: function () {
              return this.tasks.every(function(task) {
                return task.checked;
              }) &&  this.tasks.length > 0;
            },
          },

      methods: {

            addTask: function () {
              var task = this.newTask.trim();
              if (task) {
                this.tasks.push({text: task, checked: false});
                this.newTask = "";
              }
            },

            removeTask: function (task) {
              var index = this.tasks.indexOf(task);
              this.tasks.splice(index, 1);
            },

            editTask: function (task) {
              this.editingTask = task;
            },

            endEditing: function (task) {
              this.editingTask = {};
              if (task.text.trim() === ""){
                this.removeTask(task);
              }

            },

            clearList: function () {
              this.tasks = [

              ];
            },

            selectAll: function (task) {
              var targetValue = this.areAllSelected ? false : true;
              for (var i = 0; i < this.tasks.length; i++) {
                this.tasks[i].checked = targetValue;
              }
            },

            check: function (task) {
              task.checked = true;
            },

            isChecked: function (task) {
              return task.checked;
            }
      }
    }
</script>
<style scoped>
/* Relevant resets */

ul, li {
	margin: 0;
	padding: 0;
	border: 0;
}

/* Global Styles */



.container {
	width: 80%;
	margin: 1em auto 3em;
}

.panel, li {
	display: flex;
	align-items: center;
	justify-content: space-between;
	list-style-type: none;
	padding: 2px;
  border-radius: 10px;
	background-color: coral;
}

.text-input {
	border: 1px solid #dedede;
	padding-left: 5px;
	width: 70%;
	height: 30px;
	color: #555;
}


button {
	color: #554;
	background-color: #FFFFFF;
	border: 1px solid #bbb;
  border-radius: 50px;
	outline: 0;
	width: 50px;
	height: 38px;
	cursor: pointer;
	font-size: 10px;
        font-weight: 800;
}

/* Task  area */

.list li {
	background-color: #3465A4;
}

.list li button {
	background-color: transparent;
	border: 1px solid #3465A4;
	color: #ddd;
	visibility: hidden;
	font-size: 20px;
	font-weight: bold;
}

.list li:hover > button {
	visibility: visible;
}

.list label {
	padding-right: 10px;
	display: inline-block;
	width: 70%;
	font-size: 12px;
	line-height: 24px;
	color: #fcfcfc;
	z-index: 2;
	overflow: hidden;
}

.list li.done label {
	color: #d9d9d9;
	text-decoration: line-through;
}

/* Instructions and Credit */

.credit {
	margin: 1em auto 5em;
	text-align: center;
	font-size: 13px;
	line-height: 0.6;
	color: #999;
}

.credit a {
	text-decoration: none;
	color: #999;
}

.credit a:hover {
	text-decoration: underline;
}

.hidden {
	display: none;
}

/* Media Queries */

@media screen and (max-width: 768px) {
	.container {
		width: 90%;
		max-width: 90%;
	}

	.text-input, .list label {
		width: 60%;
		font-size: 14px;
	}

	button {
		width: 50px;
		height: 50px;
	}
}
</style>
