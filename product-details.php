<?php include "header.php"; ?>

<div class="page-section pt-5">
    <div class="container">
        <nav aria-label="Breadcrumb">
            <ul class="breadcrumb p-0 mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="productlist.php">Product List</a></li>
            </ul>
        </nav>

        <div class="row">

            <div class="col-lg-12">
                <div class="blog-single-wrap">

                    <h1 class="post-title">Product Name</h1>
                    <div class="post-meta">
                        <div class="post-date">
                            <span class="icon">
                              <span class="mai-time-outline"></span>
                            </span>
                            <a href="">Create Date: <i id="productCreateTime"></i></a>
                        </div>
                    </div>
                    <div class="post-content">
                        <form id="detaproduct" class="contact-form">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="email">Product Name</label>
                                    <input disabled type="text" id="productname" name="productname"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="email">Price</label>
                                    <input disabled type="text" id="price" name="price" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="subject">Category</label>
                                    <input disabled type="text" id="category_id" name="category_id"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="description">Description</label>
                                    <textarea disabled name="description" id="description" cols="30" rows="5"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <input hidden name="token" id="token" value="<?php echo $_SESSION['token']; ?>">
                        </form>
                        <div class="row form-group mt-4">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger" onclick="deleteProject('<?php echo $_GET['id']; ?>');">Delete
                                    Product
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="comment-form-wrap pt-5">
                    <h2 class="mb-5">Edit Product</h2>
                    <form id="updateproduct" class="contact-form">
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
                                <textarea name="description" id="description" cols="30" rows="5"
                                          class="form-control"></textarea>
                            </div>
                        </div>
                        <input hidden name="token" id="token" value="<?php echo $_SESSION['token']; ?>">
                        <input hidden name="product_id" id="product_id" value="<?php echo $_GET['id']; ?>">
                        <div class="row form-group mt-4">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" onclick="updateProject();">Update
                                    Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>

<?php include "footer.php"; ?>


<script>

    $(document).ready(function () {
        productDetail();
        readListCategory();
    });

    function deleteProject(product_id) {
        let token = "<?php echo $_SESSION['token'] ?>";
        $.ajax({
            url: "api/product/delete.php",
            type: "DELETE",
            data: {
                id: product_id,
                token: token,
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                // window.location.href = 'productlist.php';
            },
        });
    }

    function productDetail() {
        let token = "<?php echo $_SESSION['token'] ?>";
        $.ajax({
            url: "api/product/read_one.php",
            type: "GET",
            data: {
                id: "<?php echo $_GET['id']; ?>",
                token: token,
            },
            dataType: "json",
            beforeSend: function (response) {
                console.log(response);
            },
            success: function (response) {
                console.log(response);
                $("#detaproduct #productname").val(response['name']);
                $("#detaproduct #price").val(response['price']);
                $("#detaproduct #category_id").val(response['category_name']);
                $("#detaproduct #description").val(response['description']);
                $("#detaproduct #productCreateTime").html(response['created']);

                $("#updateproduct #productname").val(response['name']);
                $("#updateproduct #price").val(response['price']);
                $("#updateproduct #category_id").append("<option selected value='" + response['category_id'] + "'> " + response['category_name'] +"</option>");
                $("#updateproduct #description").val(response['description']);
                // $.each(response.records, function (rd, rowData) {
                //     Categorys.append("<option value='" + rowData.id + "'> " + rowData.name +"</option>");
                // });
            },
        });
    }

    function readListCategory() {
        var Categorys = $("#updateproduct #category_id");
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
</script>
