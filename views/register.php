<h1>Register Page</h1>

<form action="/register" method="post">
    <div class="mb-3">
        <label for="exampleInputFirstName">First Name</label>
        <input type="text" class="form-control" id="exampleInputFirstName" name="last_name">
    </div>
    <div class="mb-3">
        <label for="exampleInputLastName">Last Name</label>
        <input type="text" class="form-control" id="exampleInputLastName" name="last_name">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <div class="mb-3">
        <label for="exampleInputConfirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputConfirmPassword" name="confirm_password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>