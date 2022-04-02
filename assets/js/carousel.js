
    /** 
     * 
     * <-- For carousel functions if necessary, otherwise ignore -->
     * 
     * 
    //start of js for carousel-header
    let slidePosition = 0;
    const slides = document.getElementsByClassName('carousel__item');
    const totalSlides = slides.length;
    
    setInterval(function(){
        moveToNextSlide();
    }, 5000);

    document.
        getElementById('carousel__button--next')
        .addEventListener("click", function() {
            moveToNextSlide();
    });
    
    document.
        getElementById('carousel__button--prev')
        .addEventListener("click", function() {
            moveToPrevSlide();
    });

    function updateSlidePosition() {
    for (let slide of slides) {
        slide.classList.remove('carousel__item--visible');
        slide.classList.add('carousel__item--hidden');
    }

        slides[slidePosition].classList.add('carousel__item--visible');
    }

    function moveToNextSlide() {
    if (slidePosition === totalSlides - 1) {
        slidePosition = 0;
    } else {
        slidePosition++;
    }

        updateSlidePosition();
    }

    function moveToPrevSlide() {
    if (slidePosition === 0) {
        slidePosition = totalSlides - 1;
    } else {
        slidePosition--;
    }

        updateSlidePosition();
    }
    //end of carousel-header


    //start of carousel-article-list
    let slidePosition1 = 0;
    const slides1 = document.getElementsByClassName('carousel__upcoming_events');
    const totalSlides1 = slides1.length;

    document.
        getElementById('upcoming_events__button--next')
        .addEventListener("click", function() {
            moveToNextSlide1();
    });
    document.
        getElementById('upcoming_events__button--prev')
        .addEventListener("click", function() {
            moveToPrevSlide1();
    });

    function updateSlidePosition1() {
    for (let slide of slides1) {
        slide.classList.remove('carousel__upcoming_events--visible');
        slide.classList.add('carousel__upcoming_events--hidden');
    }

        slides1[slidePosition1].classList.add('carousel__upcoming_events--visible');
    }

    function moveToNextSlide1() {
    if (slidePosition1 === totalSlides1 - 1) {
        slidePosition1 = 0;
    } else {
        slidePosition1++;
    }

        updateSlidePosition1();
    }

    function moveToPrevSlide1() {
    if (slidePosition1 === 0) {
        slidePosition1 = totalSlides1 - 1;
    } else {
        slidePosition1--;
    }

        updateSlidePosition1();
    }
    //end of carousel-article-list

    //start of carousel-featured-works
    let slidePosition2 = 0;
    const slides2 = document.getElementsByClassName('carousel__featured_works');
    const totalSlides2 = slides2.length;

    
    document.
        getElementById('featured_works__button--next')
        .addEventListener("click", function() {
            moveToNextSlide2();
    });
    document.
        getElementById('featured_works__button--prev')
        .addEventListener("click", function() {
            moveToPrevSlide2();
    });

    function updateSlidePosition2() {
    for (let slide of slides2) {
        slide.classList.remove('carousel__featured_works--visible');
        slide.classList.add('carousel__featured_works--hidden');
    }

        slides2[slidePosition2].classList.add('carousel__featured_works--visible');
    }

    function moveToNextSlide2() {
    if (slidePosition2 === totalSlides2 - 1) {
        slidePosition2 = 0;
    } else {
        slidePosition2++;
    }

        updateSlidePosition2();
    }

    function moveToPrevSlide2() {
    if (slidePosition2 === 0) {
        slidePosition2 = totalSlides2 - 1;
    } else {
        slidePosition2--;
    }

        updateSlidePosition2();
    }
    //end of carousel-featured-works

    //start of carousel-history-facts
    let slidePosition3 = 0;
    const slides3 = document.getElementsByClassName('carousel__item_history');
    const totalSlides3 = slides3.length;
    
    document.
        getElementById('history__button--next')
        .addEventListener("click", function() {
            moveToNextSlide3();
    });
    document.
        getElementById('history__button--prev')
        .addEventListener("click", function() {
            moveToPrevSlide3();
    });

    function updateSlidePosition3() {
    for (let slide of slides3) {
        slide.classList.remove('carousel__item_history--visible');
        slide.classList.add('carousel__item_history--hidden');
    }

        slides3[slidePosition3].classList.add('carousel__item_history--visible');
    }

    function moveToNextSlide3() {
    if (slidePosition3 === totalSlides3 - 1) {
        slidePosition3 = 0;
    } else {
        slidePosition3++;
    }

        updateSlidePosition3();
    }

    function moveToPrevSlide3() {
    if (slidePosition3 === 0) {
        slidePosition3 = totalSlides3 - 1;
    } else {
        slidePosition3--;
    }

        updateSlidePosition3();
    }
    //end of carousel-history-facts

    //start of carousel-categories
    let slidePosition4 = 0;
    const slides4 = document.getElementsByClassName('carousel__categories');
    const totalSlides4 = slides4.length;
    
    document.
        getElementById('categories__button--next')
        .addEventListener("click", function() {
            moveToNextSlide4();
    });
    document.
        getElementById('categories__button--prev')
        .addEventListener("click", function() {
            moveToPrevSlide4();
    });

    function updateSlidePosition4() {
    for (let slide of slides4) {
        slide.classList.remove('carousel__categories--visible');
        slide.classList.add('carousel__categories--hidden');
    }

        slides4[slidePosition4].classList.add('carousel__categories--visible');
    }

    function moveToNextSlide4() {
    if (slidePosition4 === totalSlides4 - 1) {
        slidePosition4 = 0;
    } else {
        slidePosition4++;
    }

        updateSlidePosition4();
    }

    function moveToPrevSlide4() {
    if (slidePosition4 === 0) {
        slidePosition4 = totalSlides4 - 1;
    } else {
        slidePosition4--;
    }

        updateSlidePosition4();
    }
    //end of carousel-categories
    

    //start of carousel-support_local
    let slidePosition5 = 0;
    const slides5 = document.getElementsByClassName('carousel__support_local');
    const totalSlides5 = slides5.length;

    
    document.
        getElementById('support_local__button--next')
        .addEventListener("click", function() {
            moveToNextSlide5();
    });
    document.
        getElementById('support_local__button--prev')
        .addEventListener("click", function() {
            moveToPrevSlide5();
    });

    function updateSlidePosition5() {
    for (let slide of slides5) {
        slide.classList.remove('carousel__support_local--visible');
        slide.classList.add('carousel__support_local--hidden');
    }

        slides5[slidePosition5].classList.add('carousel__support_local--visible');
    }

    function moveToNextSlide5() {
    if (slidePosition5 === totalSlides5 - 1) {
        slidePosition5 = 0;
    } else {
        slidePosition5++;
    }

        updateSlidePosition5();
    }

    function moveToPrevSlide5() {
    if (slidePosition5 === 0) {
        slidePosition5 = totalSlides5 - 1;
    } else {
        slidePosition5--;
    }

        updateSlidePosition5();
    }
    //end of carousel-support_local
    **/

    
    /*For PDF.js
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf.min.js"></script>
    <script>
        let url = "../../assets/pdf/Sample.pdf";
        let pdfDoc = null,
            pageNum = 1,
            pageIsRendering = false,
            pageNumIsPending = null;

        const scale = 1.5,
            canvas = document.querySelector('#pdf-render'),
            ctx = canvas.getContext('2d');

        const renderPage = num => {
            pageIsRendering = true;

            pdfDoc.getPage(num).then(page => {
                const viewport = page.getViewport({scale});
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderCtx = {
                    canvasContext: ctx,
                    viewport
                }

                page.render(renderCtx).promise.then(() => {
                    pageIsRendering = false;

                    if(pageNumIsPending !== null){
                        renderPage(pageNumIsPending);
                        pageNumIsPending = null;
                    }
                });


                document.querySelector('#page-num').textContent = num;
            })
        };

        const queueRenderPage = num => {
            if(pageIsRendering) {
                pageNumIsPending = num;
            } else {
                renderPage(num);
            }
        }

        const showPrevPage = () => {
            if(pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        }

        const showNextPage = () => {
            if(pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        }

        pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
            pdfDoc = pdfDoc_;
            
            document.querySelector('#page-count').textContent = pdfDoc.numPages;
            
            renderPage(pageNum);
        });


        document.querySelector('#prev-page').addEventListener('click', showPrevPage);
        document.querySelector('#next-page').addEventListener('click', showNextPage);

    </script>*/