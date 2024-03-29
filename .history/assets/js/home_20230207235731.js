const $1 = document.querySelector.bind(document)
const $2 = document.querySelectorAll.bind(document)

const tabs_link_active = $2('.tab-link-item')
for(let i=0;i<tabs_link_active.length;i++) {
    tabs_link_active[i].onclick = function(e) {
        const tab_link_active = $1('.tab-link-item.tab-link-active')
        tab_link_active.classList.remove('tab-link-active')
        const tab_content_active = $1('.content-tab.content-tab-block')
        tab_content_active.classList.remove('content-tab-block')
        e.target.classList.add('tab-link-active')
        const attr = e.target.getAttribute('data-title')
        const tab_content = document.getElementById(attr)
        tab_content.classList.add('content-tab-block')
    }
}

    $(document).ready(function() {
        $('.owl-one').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
        $('.owl-two').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            // autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 6
                }
            }
        })
        $('.owl-three').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            // autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            }
        })
    })

