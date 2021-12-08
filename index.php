<?php include "header.php"; ?>

<?php include "home.php"; ?>

<?php include "footer.php"; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm" action="#" class="contact-form py-5 px-lg-5">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="subject">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group mt-4">
                        <div class="col-md-12">
                            <input type="submit" value="Login" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
