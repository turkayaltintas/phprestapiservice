<?php include "header.php"; ?>

  <div class="page-section">
    <div class="container">
      <div class="row text-center align-items-center">
        <div class="col-lg-4 py-3">
            <form action="#" class="contact-form py-5 px-lg-5">
                <h2 class="mb-4 font-weight-medium text-secondary">Create</h2>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="email">Product Name</label>
                        <input type="email" id="name" name="name" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="email">Price</label>
                        <input type="email" id="price" name="price" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="subject">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Name</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row form-group mt-4">
                    <div class="col-md-12">
                        <input type="button" value="Create Product" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 py-3">

        </div>  
        <div class="col-lg-4 py-3">

        </div>
      </div>
    </div>

  </div>

<?php include "footer.php"; ?>
