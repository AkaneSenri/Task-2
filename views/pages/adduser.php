<?php 
use App\Services\Page;
?>

<!DOCTYPE html>
<html lang="en">
<?php 
Page::part('head');
?>
<body>
<?php 
Page::part('navbar');
?>
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Add new user</h2>

              <form method="post" action="#">

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Name</label>
                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="John Doe" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Email</label>
                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="johndoe@gmail.com" />
                </div>

                <div class="form-outline mb-4">
                    <select class="my-2 form-control" name="gender">
                        <option value="">Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-outline mb-4">
                    <select class="my-2 form-control" name="status">
                        <option value="">Select status</option>
                        <option value="Male">Active</option>
                        <option value="Female">Inactive</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="button"
                    class="btn btn-dark text-body">Send your data</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0"><a href="/home"
                    class="fw-bold text-body"><u>Back to home page</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
