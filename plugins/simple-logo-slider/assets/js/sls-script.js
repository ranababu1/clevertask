document.addEventListener('DOMContentLoaded', function() {
    const sliders = document.querySelectorAll('.sls-logo-slider');
    
    sliders.forEach(slider => {
        slider.style.setProperty('--sls-speed', slider.dataset.speed);
        slider.style.setProperty('--sls-gap', slider.dataset.gap);
        slider.style.setProperty('--sls-width', slider.dataset.width);
        
        const track = slider.querySelector('.sls-slider-track');
        if (track) {
            const slides = track.querySelectorAll('.sls-slide');
            slides.forEach(slide => {
                track.appendChild(slide.cloneNode(true));
            });
        }
    });
});