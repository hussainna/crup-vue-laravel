<template lang="">
  <div class="container">
    <div class="card col-md-6 offset-md-3">
      <div class="card-header">
        <h4 class="card-title">
          Add Student
          <router-link to="/" class="btn btn-primary float-end"
            >All Students</router-link
          >
        </h4>
      </div>
      <div class="card-body">
        <form class="add-student">
          <div class="mb-3 form-group">
            <label for="name">Name</label>
            <input
              type="text"
              v-model="model.students.name"
              placeholder="Enter Name"
              class="form-control"
              id="name"
            />
            <span class="error-message" id="nameErrorMsg"></span>
          </div>
          <div class="mb-3 form-group">
            <label for="course">Course</label>
            <input
              type="text"
              placeholder="Enter Course"
              v-model="model.students.course"
              class="form-control"
              id="course"
            />
            <span class="error-message" id="courseErrorMsg"></span>
          </div>
          <div class="mb-3 form-group">
            <label for="email">Email</label>
            <input
              type="text"
              v-model="model.students.email"
              placeholder="Enter Email"
              class="form-control"
              id="email"
            />
            <span class="error-message" id="emailErrorMsg"></span>
          </div>
          <div class="mb-3 form-group">
            <label for="phone">Phone</label>
            <input
              type="text"
              v-model="model.students.phone"
              placeholder="Enter Phone"
              class="form-control"
              id="phone"
            />
            <span class="error-message" id="phoneErrorMsg"></span>
          </div>
          <button @click="SaveStudent" class="btn btn-primary">Insert</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "addStudent",
  data() {
    return {
      model: {
        students: {
          name: "",
          course: "",
          email: "",
          phone: "",
        },
      },
    };
  },
  methods: {
    SaveStudent(e) {
      e.preventDefault();
      let studentInfo = this.model.students;
      if (
        studentInfo.name === "" ||
        studentInfo.course === "" ||
        studentInfo.email === "" ||
        studentInfo.phone === ""
      ) {
        let emptyInfos = Object.keys(studentInfo);
        for (let emptyInfo of emptyInfos) {
          let errorMessage = document.getElementById(`${emptyInfo}ErrorMsg`);
          if (studentInfo[emptyInfo] == "") {
            errorMessage.classList.add("active");
            errorMessage.textContent = "This field is required";
          } else {
            errorMessage.classList.remove("active");
          }
        }
      } else {
        axios
          .post("http://localhost:8000/api/insert-student", this.model.students)
          .then((res) => {
            if (res.data.status === 200) {
              alert(res.data.message);
              window.location.href = "/";
            }
          });
      }
    },
  },
};
</script>
<style lang="css">
.add-student label {
  cursor: pointer;
  user-select: none;
}
.add-student .form-control {
  box-shadow: none;
}
.add-student input,
.add-student .btn {
  border-radius: 0;
}
.add-student .error-message {
  display: none;
}
.add-student .error-message.active {
  display: block;
  color: red;
}
</style>
