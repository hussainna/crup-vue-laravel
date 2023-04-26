<template lang="">
  <div class="all-students">
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            All Students
            <router-link to="/add-student" class="btn btn-primary float-end"
              >Add Student</router-link
            >
          </h4>
        </div>
        <div class="card-body overflow-x-auto">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(students, idx) in this.students" :key="idx">
                <td>{{ idx + 1 }}</td>
                <td>{{ students.Name }}</td>
                <td>{{ students.Course }}</td>
                <td>{{ students.Email }}</td>
                <td>{{ students.Phone }}</td>
                <td>
                  <button
                    @click="confirmAndDeleteStudent(students.id)"
                    class="btn btn-danger btn-sm mb-1 d-block me-md-2 mb-md-0 d-md-inline-block"
                  >
                    Delete
                  </button>
                  <router-link
                    :to="{ path: 'edit-student/' + students.id }"
                    class="btn btn-success btn-sm mb-1 d-block me-md-2 mb-md-0 d-md-inline-block"
                    >Edit</router-link
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "student",
  data() {
    return {
      students: [],
    };
  },
  mounted() {
    this.getStudents();
    // console.log('iam here niggga')
  },
  methods: {
    getStudents() {
      axios.get("http://localhost:8000/api/get-students").then((res) => {
        this.students = res.data.students;
      });
    },
    deleteStudent(id) {
      axios
        .post(`http://localhost:8000/api/delete-students/${id}`)
        .then((res) => {
          alert(res.data.message);
          this.getStudents();
        });
    },
    confirmAndDeleteStudent(id) {
      let yes = window.confirm("Are you sure ?");
      if(yes) {
        this.deleteStudent(id)
      }
    }
  },
};
</script>
<style lang="css">
.all-students .btn {
  border-radius: 0;
}
@media (max-width: 767px) {
  .all-students .container {
    width: auto;
  }
}
</style>
