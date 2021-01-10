<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index, follow" />

    @yield('meta')

    <!-- Favicon -->
    <link name="favicon" type="image/x-icon" href="" rel="shortcut icon" />

    <title>Macondray Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <link href="assets/css/app.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

</head>
<body>
 @verbatim

    <div id="app" style="display:none">

        <div class="clearfix" style="position: fixed; right: 15px; top: 15px" v-if="isLoading">
            <div class="spinner-border text-light float-end" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div v-if="view == 'Login'">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Sign In</h5>
                                <form class="form-signin">
                                    <div class="form-label-group">
                                        <input type="text" id="inputEmail" class="form-control" placeholder="Username" v-model="userModel.Username" required autofocus />
                                        <label for="inputEmail">Username</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" v-model="userModel.PasswordString" required />
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-lg btn-primary text-uppercase" type="button" v-on:click="postAuthenticate">Sign in</button>
                                        <hr />
                                        <h6 class="text-center">Don't have an account?</h6>
                                        <button class="btn btn-lg btn-danger text-uppercase" type="button" v-on:click="switchView('Register')">Register</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="view == 'Register'">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Register</h5>
                                <form class="form-signin">

                                    <div class="form-label-group">
                                        <input type="text" id="inputEmail" class="form-control" placeholder="Name" v-model="userModel.Name" required autofocus />
                                        <label for="inputEmail">Name</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="text" id="inputEmail" class="form-control" placeholder="Username" v-model="userModel.Username" required autofocus />
                                        <label for="inputEmail">Username</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" v-model="userModel.Email" required autofocus />
                                        <label for="inputEmail">Email address</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" v-model="userModel.PasswordString" required />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-lg btn-danger text-uppercase" type="button" v-on:click="postRegistration">Submit</button>
                                        <hr />
                                        <button class="btn btn-lg btn-outline-primary text-uppercase" type="button" v-on:click="switchView('Login')">Back</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="view == 'Update'">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Update User</h5>
                                <form class="form-signin">

                                    <div class="form-label-group">
                                        <input type="text" id="inputEmail" class="form-control" placeholder="Name" v-model="userModel.Name" required autofocus />
                                        <label for="inputEmail">Name</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="text" id="inputEmail" class="form-control" placeholder="Username" v-model="userModel.Username" required autofocus />
                                        <label for="inputEmail">Username</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" v-model="userModel.Email" required autofocus />
                                        <label for="inputEmail">Email address</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" v-model="userModel.PasswordString" required />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-lg btn-danger text-uppercase" type="button" v-on:click="postUpdate">Submit</button>
                                        <hr />
                                        <button class="btn btn-lg btn-outline-primary text-uppercase" type="button" v-on:click="switchView('Login')">Back</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="view == 'Dashboard'">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-9 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Users</h5>
                                <div style="max-width:100%; overflow-x: auto">

                                    <table class="table table-sm">
                                        <caption>List of {{ dashboardData.length }} user(s)</caption>
                                        <thead>
                                            <td>ID</td>
                                            <td>Name</td>
                                            <td>Username</td>
                                            <td>Email</td>
                                            <td>Created At</td>
                                            <td>Actions</td>
                                        </thead>
                                        <tbody>
                                            <tr v-for="user in dashboardData">
                                                <td>{{ user.id }}</td>
                                                <td>{{ user.name }}</td>
                                                <td>{{ user.username }}</td>
                                                <td>{{ user.email }}</td>
                                                <td>{{ user.created_at | toShortDate }}</td>
                                                <td>
                                                    <a class="px-1" v-on:click="loadUpdateModal(user)">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a class="px-1" v-on:click="postDelete(user.id)">
                                                        <i class="bi bi-trash text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                              

                                <button class="btn btn-primary text-uppercase" type="button" v-on:click="switchView('Register')">Add New User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endverbatim




    <script>

        var app = new Vue({
            el: '#app',
            data: {
                Authorization: null,
                view: 'Login',
                dashboardData: [],
                isLoading: false,
                userModel: {
                    Name: null,
                    Username: null,
                    Email: null,
                    PasswordString: null,
                    Id: null
                }

            },
            created: function () {
                document.getElementById('app').style.display = 'block';

            },
            methods: {
                switchView: function (view) {
                    if (this.Authorization != null & view == 'Login') {
                        this.view = 'Dashboard';
                        this.loadDashboard();
                        return;
                    }

                    if (this.Authorization == null & view == 'Dashboard') {
                        this.view = 'Login';
                        return;
                    }

                    this.view = view;
                },
                loadDashboard: function () {
                    this.isLoading = true;
                    axios
                        .get('http://localhost:8000/users/list', {
                            headers: {
                                'Authorization': this.Authorization
                            }
                        })
                        .then(response => { this.dashboardData = response.data; this.isLoading = false;});
                    
                },
                loadUpdateModal: function (model) {
                    this.userModel.Name = model.name;
                    this.userModel.Username = model.username;
                    this.userModel.Email= model.email;
                    this.userModel.PasswordString = "";
                    this.userModel.Id= model.id;

                    this.switchView('Update');
                },
                postRegistration: function () {
                    this.isLoading = true;
                    axios
                        .post('http://localhost:8000/users', this.userModel)
                        .then(response => { this.switchView('Login'); this.isLoading = false; })
                        .catch(error => {
                            Swal.fire(
                                error.response.data.status,
                                JSON.stringify(error.response.data.errors) ?? "User with this data already exist",
                                'error'
                            );
                            this.isLoading = false;
                        });
                },
                postUpdate: function () {
                    this.isLoading = true;
                    axios
                        .put('http://localhost:8000/users', this.userModel, { headers: {
                                    'Authorization': this.Authorization
                            }})
                        .then(response => { this.switchView('Login'); this.isLoading = false; })
                        .catch(error => {
                            Swal.fire(
                                error.response.data.status,
                                JSON.stringify(error.response.data.errors) ?? "User with this data already exist",
                                'error'
                            );
                            this.isLoading = false;
                        });
                },
                postDelete: function (id) {
                    this.isLoading = true;
                    axios
                        .delete('http://localhost:8000/users', {
                            headers: {
                                    'Authorization': this.Authorization
                            },
                            data: { Id: id }
                               
                            })
                        .then(response => { this.loadDashboard(); this.isLoading = false; })
                        .catch(error => {
                            Swal.fire(
                                error.response.data.status,
                                JSON.stringify(error.response.data.errors),
                                'error'
                            );
                            this.isLoading = false;
                        });
                    
                },
                postAuthenticate: function () {
                    this.isLoading = true;
                    axios
                        .post('http://localhost:8000/users/login', this.userModel)
                        .then(response => {
                                this.Authorization = response.data.token;
                                this.switchView('Dashboard');
                            this.loadDashboard();
                            this.isLoading = false;
                        })
                        .catch(error => {
                            Swal.fire(
                                error.response.data.status,
                                JSON.stringify(error.response.data.errors),
                                'error'
                            );
                            this.isLoading = false;
                        });
                }
            },
            filters: {
                toShortDate: function (value) {
                   if (value) {
                    return moment(String(value)).format('MM/DD/YYYY hh:mm')
                   }
                }
            }
        });

    </script>
</body>
</html>
