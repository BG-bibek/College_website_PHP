const faders = document.querySelectorAll('.fade-in');
sliders = document.querySelectorAll('.slide-in');
const appearOptions = {
    threshold: 0.45,
};
const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return;
        }
        entry.target.classList.toggle('appear');
        appearOnScroll.unobserve(entry.target);
    });

}, appearOptions);


faders.forEach(fader => {
    appearOnScroll.observe(fader);
});

sliders.forEach(slider => {
    appearOnScroll.observe(slider);
});

const header = document.querySelector("header");
const sectionOne = document.querySelector(".home-intro");

const sectionOneOptions = {
    rootMargin: "-200px 0px 0px 0px"
};

const sectionOneObserver = new IntersectionObserver(function(
        entries,
        sectionOneObserver
    ) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                header.classList.add("nav-scrolled");
            } else {
                header.classList.remove("nav-scrolled");
            }
        });
    },
    sectionOneOptions);

sectionOneObserver.observe(sectionOne);