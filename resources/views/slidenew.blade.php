
<style>.handles svg path{
    stroke:white!important;
  }
  .dots span{
    background:#fff!important;
    opacity:0.5
  }
  .dots span.active{
    opacity:1
  }
  .h2, h2 {
    font-size: 2rem;
    
}
.reqw img {
    width: 290px;
    border: 1px solid;
    padding: 5px 56px 
px
;
}

.reqw img {
    margin-top: 28px;
}

    .PostSlide{max-width:1300px;margin:40px auto; }
    .PostSlide{max-width:1300px;margin:10px auto 40px;margin-top: 69px;}
    .PostSlide .innerContainer .slider{display:flex;width:1280px;overflow-x:hidden;margin:auto;}
    .PostSlide .innerContainer .slider .slide{display:block;background-size: cover!important;background-position: center center!important;min-width:280px;height:284;margin:0 10px;}
    .PostSlide .innerContainer .slider{position:relative;z-index:2;}
    .PostSlide .innerContainer .handles{display:flex;justify-content:space-between;position:relative;top:-230px;width:103%;cursor:pointer;margin-right:-20px;margin-left:-20px;z-index:4;-webkit-tap-highlight-color:transparent;}
    .PostSlide .dots{display:flex;align-items:center;justify-content:center;gap:10px;position:relative;}
    .PostSlide .dots span{border-radius:10px;background:#CBCBCB;width:6px;height:6px;display:inline-block;cursor:pointer;}
    .PostSlide .slider *{user-drag:none;-webkit-user-drag:none;user-select:none;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;}
    .PostSlide .handles > span{transition:opacity 0.3s;}
    .PostSlide .handles .prev{opacity:0;}
    .PostSlide .handles .next{opacity:1;}
    .PostSlide .handles *{user-select:none;}
    .PostSlide .innerContainer .slider .slide{display:flex!important;flex-direction:row;justify-content:space-between;}
    @media (min-width: 1280px){
        .PostSlide .innerContainer .slider{width:1200px!important;margin:auto;}
    }
    @media (max-width: 1280px){
        .PostSlide .innerContainer .handles{width:calc(100% + 30px)!important;margin-left:-15px!important;margin-right:-15px!important;}
    }
    @media (min-width: 960px) and (max-width: 1280px){
        .PostSlide .innerContainer .slider{width:93%!important;}
    }
    @media (min-width: 960px) and (max-width: 1280px){
        .PostSlide .innerContainer .slider{width:93%!important;}
    }
    @media (min-width: 640px) and (max-width: 960px){
        .PostSlide .innerContainer .slider{width:640px!important;}
    }
    @media (max-width: 640px){
        .PostSlide .innerContainer .slider{width:300px!important;}
    }
    .PostSlide .innerContainer,.PostSlide .slider,.PostSlide .handles,.PostSlide .dots{direction:ltr;}

    .PostSlide .innerContainer .slider .slide>div{display:block;background-size: cover!important;background-position: center center!important;min-width:100%;height:284px;border-radius:8px}</style>



 <div class="PostSlide">
     <div class="common_heading center_heading mb_15">
                            
                            <h2 style="text-align:center;">Our Products </h2>
                        </div>
<div class="reqw">
    <div class="innerContainer active">
        <div class="slider">
                        <div class="slide">
            	  <img src="assets/images/SEGOCORT-6.jpg" alt="" loading="lazy">
          </div>
          
            <div class="slide">
            <img src="assets/images/SEGOCET-M.jpg" alt="" loading="lazy">
          </div>
          
            <div class="slide">
            	 <img src="assets/images/SEGFLAM-P.jpg" alt="" loading="lazy">
          </div>
          
            <div class="slide">
            	  <img src="assets/images/SEGFLAM.jpg" alt="" loading="lazy">
          </div>
          
            
          
            <div class="slide">
            	  <img src="assets/images/SEGOCET-M-KID.jpg" alt="" loading="lazy">
          </div>
          
            
            <div class="slide">
            	  <img src="assets/images/ULTRAGAIN-Q-10.jpg" alt="" loading="lazy">
          </div>
          
            
              
        </div>

        <div class="handles">
                    <span class="prev">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg"><path
                                    d="M15.0001 19.92L8.48009 13.4C7.71009 12.63 7.71009 11.37 8.48009 10.6L15.0001 4.07999"
                                    stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </span>
            <span class="next">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg"><path
                                            d="M8.99991 19.92L15.5199 13.4C16.2899 12.63 16.2899 11.37 15.5199 10.6L8.99991 4.07999"
                                            stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </span>
        </div>
        <div class="dots">
        </div>
    </div>
</div></div>



  <script>var autoplayIntervalInSeconds = 3;


class PostSlider {

    constructor(containerElement,autoplayIntervalInSeconds) {
        this.container = containerElement;
        if (!this.container) {
            throw new Error(`Container not found.`);
        }

        this.slider = this.container.querySelector('.slider');
        this.prevBtn = this.container.querySelector('.handles .prev');
        this.nextBtn = this.container.querySelector('.handles .next');

        this.sLiderWidth = this.slider.clientWidth;
        this.oneSLideWidth = this.container.querySelector('.slide:nth-child(2)').clientWidth;
        console.log(this.oneSLideWidth);
        this.sildesPerPage = Math.trunc(this.sLiderWidth / this.oneSLideWidth);
        this.slideMargin = ((this.sLiderWidth - (this.sildesPerPage * this.oneSLideWidth)) / (this.sildesPerPage * 2)).toFixed(5);
        this.changeSlidesMargins();

        // Assign this.dots before calling bindDotClickHandlers
        this.dots = this.container.querySelectorAll('.dots span');
        this.bindDotClickHandlers();

        this.makeSliderScrollable();
        this.prevBtn.addEventListener('click', () => this.prevSlider());
        this.nextBtn.addEventListener('click', () => this.nextSlider());

        this.createDots();
        this.setActiveDotByScroll();

        this.autoplayInterval = null;
        this.autoplayDelay = autoplayIntervalInSeconds*1000;

        this.startAutoplay()
        this.container.addEventListener('mouseenter', () => this.pauseAutoplay());
        this.container.addEventListener('mouseleave', () => this.startAutoplay());

        return this;
    }
    changeSlidesMargins() {
        const slides = this.container.querySelectorAll('.slide');
        if (this.oneSLideWidth*2 > this.sLiderWidth){
            this.slideMargin = 1;
            this.oneSLideWidth = this.oneSLideWidth + (this.sLiderWidth - this.oneSLideWidth - 2);
            slides.forEach(slide => {
                slide.style.margin = "0 " + this.slideMargin + "px";
                slide.style.minWidth = this.oneSLideWidth + "px";
            });

        }else {
            slides.forEach(slide => {
                slide.style.margin = "0 " + this.slideMargin + "px";
            });
        }
    }


    scrollToPosition(position, smooth =true) {
        console.log('Scrolling to position:', position);
        const currentPosition = this.slider.scrollLeft;
        const newPosition = currentPosition + position;

        this.slider.scrollTo({
            top: 0,
            left: newPosition,
            behavior: smooth ? 'smooth' : 'instant'
        });

        console.log('Current position - New position:', currentPosition - newPosition);

        setTimeout(() => {
            this.snapToNearestSlide();
        }, 300);
    }
    scrollWithDots(pos) {
        this.slider.scrollTo({
            top: 0,
            left: pos,
            behavior: "smooth"
        });
    }

    handleDotClick(index) {
        const position = index * (this.slider.getBoundingClientRect()['width']);
        this.scrollWithDots(position);
    }

    changeActiveDot(i) {
        for (let j = 0; j < this.dots.length; j++) {
            this.dots[j].classList.remove('active');
        }
        this.dots[i].classList.add('active');
    }


    bindDotClickHandlers() {
        for (let i = 0; i < this.dots.length; i++) {
            this.dots[i].addEventListener('click', () => {
                console.log('Dot clicked:', i);
                this.handleDotClick(i);
            });
        }
    }
    snapToNearestSlide(){

        const currentPosition = this.slider.scrollLeft;
        const nearestLeftScroll = Math.round(currentPosition / (this.oneSLideWidth+(this.slideMargin*2))) * (this.oneSLideWidth+(this.slideMargin*2));
        console.log(nearestLeftScroll);
        this.slider.scrollTo({
            left:  nearestLeftScroll,
            behavior: 'smooth'
        });
    }
    makeSliderScrollable() {
        let isDragging = false;
        let startPosition;
        let startScrollPosition;

        this.slider.addEventListener('mousedown', (event) => startDrag(event));
        this.slider.addEventListener('touchstart', (event) => startDrag(event));

        const startDrag = (event) => {
            isDragging = true;
            startPosition = event.clientX || event.touches[0].clientX;
            startScrollPosition = this.slider.scrollLeft;

            document.addEventListener('mousemove', drag);
            document.addEventListener('touchmove', drag);
            document.addEventListener('mouseup', endDrag);
            document.addEventListener('touchend', endDrag);
        };

        const drag = (event) => {
            if (isDragging) {
                const currentX = event.clientX || event.touches[0].clientX;
                const deltaX = currentX - startPosition;
                this.slider.scrollLeft = startScrollPosition - deltaX;
            }
        };

        const endDrag = () => {
            if (isDragging) {
                isDragging = false;
                const currentPosition = this.slider.scrollLeft;
                const nearestLeftScroll = Math.round(currentPosition / (this.oneSLideWidth+(this.slideMargin*2))) * (this.oneSLideWidth+(this.slideMargin*2));
                console.log(nearestLeftScroll);
                this.slider.scrollTo({
                    left:  nearestLeftScroll,
                    behavior: 'smooth'
                });

                document.removeEventListener('mousemove', drag);
                document.removeEventListener('touchmove', drag);
                document.removeEventListener('mouseup', endDrag);
                document.removeEventListener('touchend', endDrag);
            }
        };
    }

    setActiveDotByScroll() {
        this.dots = this.container.querySelectorAll('.dots span');
        this.slider.addEventListener('scroll', () => {
            const scrollLeft = this.slider.scrollLeft;
            const currentIndex = Math.trunc((Math.abs(scrollLeft) + 2) / this.slider.clientWidth);

            console.log('Scroll Left:', scrollLeft);
            console.log('Current Index:', currentIndex);

            for (let i = 0; i < this.dots.length; i++) {
                this.dots[i].classList.remove('active');
            }

            this.dots[currentIndex].classList.add('active');

            this.prevBtn.style.opacity = Math.abs(scrollLeft) < 1 ? '0' : '1'; /*it means there is no element before so it would hide prev button*/
            this.nextBtn.style.opacity = Math.abs(scrollLeft) + 2 >= this.slider.scrollWidth - this.slider.clientWidth ? '0' : '1'; /*it means there is no element after so it would hide next button*/
        });
    }


    nextSlider() {
        const totalWidth = this.slider.scrollWidth;
        const currentScroll = this.slider.scrollLeft;
        const nextScroll = currentScroll + this.oneSLideWidth + (this.slideMargin * 2);

        if (nextScroll + this.slider.clientWidth > totalWidth) {
            // If next slide goes beyond the end, scroll to the beginning
            this.slider.scrollTo({
                left: 0,
                behavior: 'smooth'
            });
        } else {
            this.scrollToPosition(this.oneSLideWidth + (this.slideMargin * 2));
        }
    }

    prevSlider() {
        const currentScroll = this.slider.scrollLeft;
        const prevScroll = currentScroll - (this.oneSLideWidth + (this.slideMargin * 2));

        if (prevScroll < 0) {
            // If previous slide goes before the beginning, scroll to the end
            this.slider.scrollTo({
                left: this.slider.scrollWidth - this.slider.clientWidth,
                behavior: 'smooth'
            });
        } else {
            this.scrollToPosition(-1 * (this.oneSLideWidth + (this.slideMargin * 2)));
        }
    }

    createDots() {
        const dotCount = Math.floor(this.slider.scrollWidth / this.slider.clientWidth);
        const dotsContainer = this.container.querySelector('.dots');
        dotsContainer.innerHTML = '';

        for (let i = 0; i < dotCount; i++) {
            const dot = document.createElement('span');
            dot.addEventListener('click', () => {
                // this.changeActiveDot(i);
                this.handleDotClick(i);
            });

            if (i === 0) {
                dot.classList.add('active');
            }

            dotsContainer.appendChild(dot);
        }
    }

    startAutoplay() {
        this.autoplayInterval = setInterval(() => {
            this.nextSlider();
        }, this.autoplayDelay);
    }

    pauseAutoplay() {
        clearInterval(this.autoplayInterval);
    }
}


window.addEventListener('load',function (){
    var container = document.querySelector('.PostSlide .innerContainer');
    new PostSlider(container,3);
})</script>