@extends("layaout.groceries")
@section("main_Content")
<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    The Meat Product Title
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>
            </div>
        </div>
    </div>
    <div class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="slider-zoom">
                        <a href="{{asset('assets/img/')}}/{{$product->image}}" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                            <img alt="Detail Zoom thumbs image" src="{{asset('assets/img/')}}/{{$product->image}}" style="width: 100%;">
                        </a>
                    </div>

                    <div class="slider-thumbnail">
                        <ul class="d-flex flex-wrap p-0 list-unstyled">
                            @foreach ($product as $p)
                            <li>
                                <a href="{{asset('assets/img/')}}/{{$product->image}}" rel="gallerySwitchOnMouseOver: true, popupWin:'assets/img/meats.jpg', useZoom: 'cloudZoom', smallImage: 'assets/img/meats.jpg'" class="cloud-zoom-gallery">
                                    <img itemprop="image" src="{{asset('assets/img/')}}/{{$product->image}}" style="width:135px;">
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
                <div class="col-sm-6">
                    <p>
                        <strong>Overview</strong><br>
                        {{$product->description}}
                    </p>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <strong>Price</strong> (/Pack)<br>
                                <span class="price">{{$product->sale_price}}</span>
                                <span class="old-price">{{$product->purchase_price}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p>
                                <span class="stock available">In Stock: {{$product->quantity}}</span>
                            </p>
                        </div>
                    </div>
                    <p class="mb-1">
                        <strong>Quantity</strong>
                    </p>
                    <div class="row">
                        <div class="col-sm-5">
                            <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="" name="vertical-spin">
                        </div>
                        <div class="col-sm-6"><span class="pt-1 d-inline-block">Pack (250 gram)</span></div>
                    </div>

                    <button class="mt-3 btn btn-primary btn-lg">
                        <i class="fa fa-shopping-basket"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section id="related-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Related Products</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach ($products as $p)
                        <div class="item">
                            <div class="card card-product">
                                <div class="card-ribbon">
                                    <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-default">
                                        Until 2018 <!-- Esto probablemente debería ser dinámico o eliminado si no es relevante -->
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF <!-- Esto también debería ser dinámico basado en la información del producto -->
                                    </span>
                                </div>
                                <img src="{{asset('assets/img/')}}/{{$p->image}}" alt="Card image" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('detail', ['product_id' => $p->id]) }}"> {{$p->name}} </a>
                                </h4>
                                <div class="card-price">
                                    <span class="discount">Rp. {{$p->original_price}}</span>
                                    <span class="reguler">Rp. {{$p->discounted_price}}</span>
                                </div>
                                <a href="" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comienzo de la sección de comentarios -->
<section id="product-comments">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title">Leave a Comment</h2>
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Comment</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Fin de la sección de comentarios -->

</div>
@endsection
