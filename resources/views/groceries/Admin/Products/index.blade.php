@extends("layaout.groceries")
@section("main_Content")
<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset('assets/img/bg-header.jpg')}}');">
            <div class="container">
                <h1 class="pt-5">
                    Contact
                </h1>
                <p class="lead">
                    Don't Hesitate to Contact Us.
                </p>
            </div>
        </div>
    </div>
    <section class="pb-0">
        <div class="contact1 mb-5">
            <div class="container">
                <h1>
                    Admin Products
                </h1>
                <p class="lead">
                    Products Administration
                </p>
            </div>
            <section class="pb-0">
                <div class="contact1 mb-5">
                    <div class="container">
                        <div class="col-lg-12">
                            <button id="loadProductsBtn" class="btn btn-primary">Load Products</button>
                            <table class="table" id="tblProducts">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>PRICE</th>
                                        <th>QUANTITY</th>
                                        <th>DESCRIPTION</th>
                                        <th>CATEGORY</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.97915747782!2d107.58270291427688!3d-6.893096195019089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e67b57d420db%3A0x4dd071fcb9157e80!2sBTC+Fashion+Mall!5e0!3m2!1sen!2sid!4v1522964715022" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen></iframe>
    </section>
</div>
@endsection
