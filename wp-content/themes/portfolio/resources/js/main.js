document.querySelectorAll('.project__videos-container').forEach((videoSection) => {
    const videos = videoSection.querySelectorAll('.project__videos-video');
    const prevButton = videoSection.querySelector('.project__videos-carousel__prev');
    const nextButton = videoSection.querySelector('.project__videos-carousel__next');
    let currentVideo = 0;


    function showVideo(index) {
        videos.forEach((video, i) => {
            video.style.display = i === index ? 'block' : 'none';
        })
        console.log(currentVideo);
        console.log(videos.length)
    }

    prevButton.addEventListener('click', () => {
        currentVideo--;
        if (currentVideo < 0) {
            currentVideo = videos.length - 1;
        }
        showVideo(currentVideo);
    })
    nextButton.addEventListener('click', () => {
        currentVideo++;
        if (currentVideo > videos.length - 1) {
            currentVideo = 0;
        }
        showVideo(currentVideo);
    });

});


const navigationContainerElement = document.querySelector('.nav__container');
const menuButton = document.querySelector('.nav__toggle');

menuButton.addEventListener('click', (evt)=>{
    const expandedAttribut = menuButton.getAttribute('aria-expanded');

    if (expandedAttribut==="true"){
        menuButton.setAttribute('aria-expanded', false);
        navigationContainerElement.classList.remove('is-open');
        menuButton.classList.remove('active');
    }else{
        menuButton.setAttribute('aria-expanded', true);
        navigationContainerElement.classList.add('is-open');
        menuButton.classList.add('active');
    }
})