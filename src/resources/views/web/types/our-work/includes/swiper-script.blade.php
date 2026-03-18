@push("scripts")
    <script type="application/javascript">
        (function () {
            document.addEventListener("DOMContentLoaded", function () {
                const sliderElement = document.getElementById("swiperBlockOurWork-{{ $block->id }}")
                if (sliderElement) { initBlockOurWorkSliders{{ $block->id }}(); }
            })
        })()

        function initBlockOurWorkSliders{{ $block->id }}() {
            let sliderItems = document.getElementsByClassName("cover-slider-our-work-block-item")
            Array.from(sliderItems).forEach(element => {
                let mainSwiperElement = element.querySelector(".main-slider-our-work-block-item")
                let thumbSwiperElement = element.querySelector(".thumb-slider-our-work-block-item")
                let prevBtnElement = element.querySelector(".prev-slider-our-work-block-item")
                let nextBtnElement = element.querySelector(".next-slider-our-work-block-item")

                if (mainSwiperElement) {
                    let thumbSwiper = new Swiper(thumbSwiperElement, {
                        slidesPerView: "auto",
                        spaceBetween: 10,

                        simulateTouch: true,
                        watchOverflow: true,

                        freeMode: true,
                        watchSlidesProgress: true,
                    })

                    let swiper = new Swiper(mainSwiperElement, {
                        loop: true,
                        simulateTouch: true,
                        spaceBetween: 24,
                        thumbs: {
                            swiper: thumbSwiper,
                            slideThumbActiveClass: "opacity-60",
                        },
                        navigation: {
                            nextEl: nextBtnElement,
                            prevEl: prevBtnElement,
                        }
                    })
                }
            })
        }
    </script>
@endpush
