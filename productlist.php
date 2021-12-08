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
            <ul class="pagination justify-content-center" id="pageListsItem">
                <li hidden class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li hidden class="page-item"><a class="page-link" href="#">1</a></li>
                <li hidden class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li hidden class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item" id="lastPage">

                </li>
            </ul>
        </nav>

    </div>
</div>

<?php include "footer.php"; ?>


<?php
    $ThisPage = 1;
    if(isset($_GET['page'])){
        $ThisPage = $_GET['page'];
    }else{
        $ThisPage = 1;
    }
?>
<script>
    $(document).ready(function () {
        readListProducts();
    });

    function readListProducts() {
        let ProductsList = $("#productlists");
        let lastPage = $("#lastPage");
        let pageListsItem = $("#pageListsItem");
        let token = "<?php echo $_SESSION['token']; ?>";

        $.ajax({
            url: "api/product/read_paging.php",
            type: "GET",
            data:{
                page:"<?php echo $ThisPage;  ?>",
                token:token,
            },
            beforeSend: function (response) {

            },
            success: function (response) {
                $.each(response.records, function (rd, rowData) {
                    ProductsList.append('<div class="col-lg-4 py-3 text-center"><div class="card-blog"><div class="body text-center"><h5 class="post-title"><a href="product-details.php?id='+rowData.id+'">' + rowData.product_name +'</a></h5><div class="post-date">'+rowData.category_name+' <br> <br><a href="product-details.php?id='+rowData.id+'">'+rowData.price+' TL</a></div></div></div></div>');
                });
                $.each(response, function( key, val ) {
                    $.each(val.pages, function( keyy, vall ) {
                        pageListsItem.append('<li class="page-item"><a class="page-link" href="?page=' + vall.page + '">' + vall.page + '</a></li>');
                    });
                });

            },
            error: function (response) {
                console.log(response);
                __Alert('Hata', "Product working...", 'error');
            }
        });
    }
</script>
