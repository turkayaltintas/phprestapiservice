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
                        <form id="createproduct" class="contact-form">
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
                    </div>
                </div>

                <div class="comment-form-wrap pt-5">
                    <h2 class="mb-5">Edit Product</h2>
                    <form id="createproduct" class="contact-form">
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
                        <div class="row form-group mt-4">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" onclick="createProject();">Create
                                    Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div  hidden class="col-lg-4">
                <div  class="widget">
                    <!-- Widget search -->
                    <div class="widget-box">
                        <form action="#" class="search-widget">
                            <input type="text" class="form-control" placeholder="Enter keyword..">
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </form>
                    </div>

                    <!-- Widget Categories -->
                    <div class="widget-box">
                        <h4 class="widget-title">Category</h4>
                        <div class="divider"></div>

                        <ul class="categories">
                            <li><a href="#">LifeStyle</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Healthy</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Entertainment</a></li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>

<?php include "footer.php"; ?>


<script>
    $(document).ready(function () {
        productDetail();
    });

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
                $("#productname").val(response['name']);
                $("#price").val(response['price']);
                $("#category_id").val(response['category_name']);
                $("#description").val(response['description']);
                $("#productCreateTime").html(response['created']);
                // $.each(response.records, function (rd, rowData) {
                //     Categorys.append("<option value='" + rowData.id + "'> " + rowData.name +"</option>");
                // });
            },
        });
    }
</script>
