@php
$count=0;
@endphp
        <div class="holder holder-mt-small" id="holderCollectionGrid">
            <div class="container">
                <div class="title-wrap title-md">
                    <h2 class="h2-style">Available products</h2>
                </div>
                <div class="collection-grid-2 row justify-content-center">
                   @foreach($categories as $category)
                    @if($count < 15)
                    <div class="collection-grid-2-item col-9 col-md-quarter col-lg-3">
                        <a href="{{route('electronic.category',$category->slug)}}" target="_self" class="bnr-wrap collection-grid-2-item-inside">
                            <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 77.778%"><img class="lazyload fade-up" data-src="{{$img_url}}{{$category->img_path}}" data-sizes="auto" alt="{{$category->name}}"></div>
                            <h3 class="collection-grid-2-title pb-15 heading-font">{{$category->name}}</h3>
                        </a>
                    </div>
                    @endif
                    @php
                    $count++;
                    @endphp
                   @endforeach
                    <!-- @include('layouts.products.office_equipment')
                    @include('layouts.products.tv')
                    @include('layouts.products.phones')
                    @include('layouts.products.appliances')
                    @include('layouts.products.photo_video')
                    @include('layouts.products.audio')
                    @include('layouts.products.gaming')
                    @include('layouts.products.air_conditioner')
                    @include('layouts.products.auto_electronics')
                    @include('layouts.products.portable_electronics')
                    @include('layouts.products.health_beauty')
                    @include('layouts.products.lightining') -->

                </div>
                <style>
                #holderCollectionGrid .collection-grid-2-title {
                    font-size: 16px;
                    font-weight: 600;
                    color: #464b5c
                }

                #holderCollectionGrid .collection-grid-2-title:hover {
                    color: #464b5c
                }
                </style>
            </div>
        </div>
        
