@if(count($awards) > 0)
<section class="wrapper bg-light wrapper-border">
    <div class="container py-10 py-md-12">
        <h2 class="display-4 mb-5 text-center titles" id="premios-entregados">Premiación de Sorteos</h2>
        <div class="row gx-md-8 gx-xl-12 gy-10 justify-content-center">
            <div class="col-lg-11">
                <div
                    class="carousel owl-carousel"
                    data-margin="30"
                    data-nav="true"
                    data-dots="true"
                    data-autoplay="false"
                    data-autoplay-timeout="5000"
                    data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "2"}, "1200":{"items": "3"}}'
                >
                    @foreach ($awards as $award)
                        <div class="item">
                            <div class="card card-award mx-auto">
                                <div class="card-body p-0">
                                    <div class="row justify-content-center my-1">
                                        <img src="{{asset("img/rifasjuniorlogo.png")}}" class="w-15" alt="logo">
                                        <p class="text-center m-0">¡PREMIO ENTREGADO!</p>
                                    </div>
                                    <img src="{{asset("img/prizes/".$award->award_img)}}" class="" alt="Premio entragado">
                                    <p class="card-award-label text-center fw-bold">&nbsp;</p>
                                </div>
                            </div>
                            <p class="text-center m-0">{{ $award->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
