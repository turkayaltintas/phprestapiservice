<?php include "header.php"; ?>

  <div class="page-section">
    <div class="container">
      <div class="row text-center align-items-center">
        <div class="col-lg-4 py-3">
            <form id="createproduct" class="contact-form py-5 px-lg-5">
                <h2 class="mb-4 font-weight-medium text-secondary">Create</h2>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="email">Product Name</label>
                        <input type="text" id="productname" name="productname" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="email">Price</label>
                        <input type="text" id="price" name="price" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="subject">Category</label>
                        <select name="category_id" id="category_id" class="form-control"></select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <input hidden name="token" id="token" value="<?php echo $_SESSION['token']; ?>">
                <div class="row form-group mt-4">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" onclick="createProject();">Create Product</button>
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

<script>
    $(document).ready(function() {
        readListCategory();
    });
    function readListCategory() {
        var Categorys = $("#category_id");
        $.ajax({
            url: "api/category/read.php",
            type: "GET",
            dataType: "json",
            beforeSend: function (response) {
                console.log(response);
            },
            success: function (response) {
                $.each(response.records, function (rd, rowData) {
                    Categorys.append("<option value='" + rowData.id + "'> " + rowData.name +"</option>");
                });
            },
            error: function (response) {
                console.log(response);
                __Alert('Hata', "Category not working...", 'error');
            }
        });
    }

    $("#Type").html('');

</script>
