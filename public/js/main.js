const currentLink = location.href;

const linkActive = document.querySelectorAll('.link');

const linkLength = linkActive.length;

for (let i = 0; i < linkLength; i++) {
    if (linkActive[i].href === currentLink) {
        linkActive[i].classList.add('link__active');
    }
}
