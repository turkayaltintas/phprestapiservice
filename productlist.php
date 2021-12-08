<?php include "header.php"; ?>

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <form action="#" class="form-search-blog">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select id="categories" class="custom-select bg-light">
                                <option>All Categories</option>
                                <option value="travel">Travel</option>
                                <option value="lifestyle">LifeStyle</option>
                                <option value="healthy">Healthy</option>
                                <option value="food">Food</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter keyword..">
                    </div>
                </form>
            </div>
            <div class="col-sm-2 text-sm-right">
                <button class="btn btn-secondary">Filter <span class="mai-filter"></span></button>
            </div>
        </div>

        <div class="row my-5" id="productlists">

            <div hidden class="col-lg-4 py-3">
                <div class="card-blog">
                    <div class="body">
                        <h5 class="post-title"><a href="blog-details.html">PRODUCT NAME</a></h5>
                        <div class="post-date">Category <br> <br>
                            <a href="">Price</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <nav aria-label="Page Navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li hidden class="page-item"><a class="page-link" href="#">1</a></li>
                <li hidden class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li hidden class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>

    </div>
</div>

<?php include "footer.php"; ?>


<script>
    $(document).ready(function () {
        readListProducts();
    });

    function readListProducts() {
        let Categorys = $("#productlists");
        let token = "27cffdc4fefa434bc26a3c33d08c883c";

        $.ajax({
            url: "api/product/read_paging.php",
            type: "GET",
            dataType: "json",
            data:{
                page:"1",
                token:token,
            },
            beforeSend: function (response) {
                console.log(response);
            },
            success: function (response) {
                $.each(response.records, function (rd, rowData) {
                    Categorys.append('<div class="col-lg-4 py-3 text-center"><div class="card-blog"><div class="body text-center"><h5 class="post-title"><a href="/">' + rowData.product_name +'</a></h5><div class="post-date">'+rowData.category_name+' <br> <br><a href="">'+rowData.price+' TL</a></div></div></div></div>');
                });

            },
            error: function (response) {
                console.log(response);
                __Alert('Hata', "Category not working...", 'error');
            }
        });
    }
</script>
