<template>
    <div v-if="Object.keys(lottery).length > 0">
        <section class="wrapper bg-light item" id="inicio" v-for="(item, index) in lottery" :key="index">
            <div class="container pt-8 pt-md-14 slide" v-show="index == visible">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-1 position-relative order-lg-2">
                        <div class="shape bg-dot primary rellax w-17 h-19" data-rellax-speed="1" style="top: -1.7rem; left: -1.5rem;"></div>
                        <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0" style="bottom: -1.8rem; right: -0.8rem; width: 85%; height: 90%;"></div>
                        <figure class="rounded"><img class="image-auto" :src="'img/prizes/' + lottery[index].image_lottery" alt="" /></figure>
                    </div>
                    <div class="col-lg-5 mt-lg-n10 text-center text-lg-start" data-group="page-title" data-delay="600">
                        <h1 class="display-1 mb-5">{{lottery[index].name}}</h1>
                        <p class="lead fs-25 lh-sm mb-7 px-md-10 px-lg-0">{{lottery[index].prizes[0].prize}}</p>
                        <div class="d-flex justify-content-center justify-content-lg-start" data-group="page-title-buttons" data-delay="900">
                            <span><a href="/comprar/rifa/1" class="btn btn-lg btn-success rounded-pill me-2">Comprar boletos</a></span>
                            <span><a href="#preguntas" class="btn btn-lg btn-outline-success rounded-pill">Más información</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
      return {
          lottery : {},
        visible : 0,
        slides : 0
      }
  },
  methods: {
      playSlider(){
        if((this.visible + 1) <= (this.slides - 1)){
            this.visible++;
        }else{
            this.visible = 0;
        }

        setTimeout(() => {
            this.playSlider()
        }, 5000);
      }
  },
  beforeMount() {
    axios.get('api/active/lotto').then(request => {
        this.lottery = request.data;
    }).finally(() => {
        Object.keys(this.lottery).forEach(() => {
            this.slides++;
        });

        this.playSlider();
    })
  }

};
</script>

<style>

.slide {
    animation-name: slideAnimation;
    animation-duration: 2s;
}

.image-auto {
    height: 300px!important;
    width: auto;
}

@keyframes slideAnimation {
  from {
    transform: translate(-50px,0);
    opacity: 0.5;
  }
  to {
    transform: translate(0,0);
    opacity: 1;
  }
}
</style>
